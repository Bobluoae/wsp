<?php //Användaren kan bara se andras flow om de är inloggade
if (isset($_SESSION["isLoggedIn"])): ?>
<div class="container bg">
  <div class="row align-items-start">
    <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>

    <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-8 border-main main col-md-8">
   		<div class="m-1 p-4">

        <?php
        include "visual/partials/userinfo.php";
        //Loopa genom alla meddelanden i DB
   				foreach ($messages as $message) {
            include "visual/partials/message.php";
          }
   			 ?>

        <?php if ($_GET["pagenum"] > 1): ?>
          <a class="btn btn-info" href="?page=theirflow&theirflow=<?=$_GET["theirflow"]?>&pagenum=1">First</a>
          <a class="btn btn-info" href="?page=theirflow&theirflow=<?=$_GET["theirflow"]?>&pagenum=<?=$_GET["pagenum"] - 1?>">Back</a>
        <?php endif ?>

        <?php $page = countTheirMessages($_GET["theirflow"]) / PERPAGE?>
        <?="Page: " . $_GET["pagenum"] . " / " . ceil($page)?>

        <?php if ((countTheirMessages($_GET["theirflow"]) / PERPAGE) > $_GET["pagenum"]): ?>
          <a class="btn btn-info" href="?page=theirflow&theirflow=<?=$_GET["theirflow"]?>&pagenum=<?=$_GET["pagenum"] + 1?>">Next</a>
          <?php $last = countTheirMessages($_GET["theirflow"]) / PERPAGE ?>
          <a class="btn btn-info" href="?page=theirflow&theirflow=<?=$_GET["theirflow"]?>&pagenum=<?=ceil($last)?>">Last</a>
        <?php endif ?>
   		</div>
    </div>
    <!-- inkludera högerpanel -->
    <?php include "visual/partials/rightpanel.php"; ?>
  </div>
</div>
<?php endif ?>