<?php //Användaren kan bara se replies om de är inloggade
if (isset($_SESSION["isLoggedIn"])): ?>
<div class="container bg">
  <div class="row align-items-start">
    <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>

    <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-8 border-main main col-md-8">
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

		</div>
	</div>

    <!-- inkludera högerpanel -->
    <?php include "visual/partials/rightpanel.php"; ?>
  </div>
</div>
<?php 
include "js/like_functions.js";
endif ?>