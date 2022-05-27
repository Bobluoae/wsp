<?php // Användaren kan bara se Flow om dom är inloggad
if (isset($_SESSION["isLoggedIn"])): ?>
<div class="container bg">
  <div class="row align-items-start">
    <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>

    <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-8 border-main main">
   		<div class="m-1 p-4">
   			<?php
        //Loopa genom alla meddelanden i DB
   				foreach ($messages as $message) {
            include "visual/partials/message.php";
          }
   			 ?>
        <?php if ($_GET["pagenum"] > 1): ?>
          <a class="btn btn-info" href="?page=flow&pagenum=1">First</a>
          <a class="btn btn-info" href="?page=flow&pagenum=<?=$_GET["pagenum"] - 1?>">Back</a>
        <?php endif ?>

        <?php $page = countMessages() / PERPAGE?>
        <?="Page: " . $_GET["pagenum"] . " / " . ceil($page)?>

        <?php if ((countMessages() / PERPAGE) > $_GET["pagenum"]): ?>
          <a class="btn btn-info" href="?page=flow&pagenum=<?=$_GET["pagenum"] + 1?>">Next</a>
          <?php $last = countMessages() / PERPAGE ?>
          <a class="btn btn-info" href="?page=flow&pagenum=<?=ceil($last)?>">Last</a>
        <?php endif ?>
   		</div>
    </div>
    <!-- inkludera högerpanel -->
    <?php include "visual/partials/rightpanel.php"; ?>
  </div>
</div>

<?php endif ?>