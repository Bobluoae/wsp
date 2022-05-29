<?php //Användaren kan bara se replies om de är inloggade
if (isset($_SESSION["isLoggedIn"])): ?>
<div class="container bg">
  <div class="row align-items-start">
    <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>

 <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-xl-8 col-lg-12 border-main main">

      <!-- meny när sidan blir mindre -->
      <div class="row d-lg-flex d-xl-none" style="min-height: 60px;">

        <div class="col">
          <a class="btn btn-light btn mt-4" href="?page=postmsg">Post</a>
        </div>   
        <div class="col">
          <a class="btn btn-light btn mt-4" href="?page=flow">Flow</a>
        </div>   
        <div class="col">
          <a class="btn btn-light btn mt-4" href="?page=theirflow&theirflow=<?=$_SESSION["user_id"]?>">Your Flow</a>
        </div>   
        <div class="col">
          <a class="btn btn-info btn mt-4" href="?page=login">Your account</a>
        </div>
        <div class="col">
          <a class="btn btn-info btn mt-4" href="?page=information">Information</a>
        </div>
        <div class="col">
          <?php if ($_SESSION["usertype"] == "admin"): ?>
            <a class="btn btn-warning btn mt-4" href="?page=admin">Admin Page</a>
          <?php endif ?>
        </div>
  
      </div>


   		<div class="m-1 p-4">
   			<?php
            	include "visual/partials/message.php";
   			 ?>
   			 <!-- Rutan på ett inlägg -->
			<div class="border-name m-1 p-2">

			<?php if (isset($err)): ?>
			<strong style="color: red; background-color: black; border-radius: 3px;"><?=$err?></strong>
			<?php endif ?>
			<!-- formulär för reply -->
			<form method="post" action="" onsubmit="submit.disabled = true; return true;">
				<input type="hidden" name="reply_skickat"> <!-- Skickar en parameter till php -->
				<textarea class="form-control" rows="5" name="textarea" required><?php if(isset($rep)){echo $rep;}?></textarea>

				<!-- Submit knapp separat från textboxen -->
				<div class="border-information m-1">
					<input type="submit" name="submit" value="Reply to this Kwitt!" class="btn btn-light btn-lg m-1">
				</div>
			</form>	
			</div>

			<?php //Loopa igenom alla svar på ett specifikt inlägg
				foreach ($replies as $reply) {
					include "visual/partials/replies.php";
				}
				 
			?>
		<?php if ($_GET["pagenum"] > 1): ?>
          <a class="btn btn-info" href="?page=reply&reply=<?=$_GET["reply"]?>&pagenum=1">First</a>
          <a class="btn btn-info" href="?page=reply&reply=<?=$_GET["reply"]?>&pagenum=<?=$_GET["pagenum"] - 1?>">Back</a>
        <?php endif ?>

        <?php $page = countReplies($_GET["reply"]) / PERPAGE?>
        <?="Page: " . $_GET["pagenum"] . " / " . ceil($page)?>

        <?php if ((countReplies($_GET["reply"]) / PERPAGE) > $_GET["pagenum"]): ?>
          <a class="btn btn-info" href="?page=reply&reply=<?=$_GET["reply"]?>&pagenum=<?=$_GET["pagenum"] + 1?>">Next</a>
		<?php $last = countReplies($_GET["reply"]) / PERPAGE ?>
          <a class="btn btn-info" href="?page=reply&reply=<?=$_GET["reply"]?>&pagenum=<?=ceil($last)?>">Last</a>
        <?php endif ?>


		</div>
	</div>

    <!-- inkludera högerpanel -->
    <?php include "visual/partials/rightpanel.php"; ?>
  </div>
</div>
<?php endif ?>