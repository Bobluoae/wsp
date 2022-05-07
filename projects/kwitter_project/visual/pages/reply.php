<div class="container bg">
  <div class="row align-items-start border">
    <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>

    <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-8 border col-md-8">
   		<div class="m-1 p-4">
   			<?php
            	include "visual/partials/message.php";
   			 ?>
   			 <!-- Rutan på ett inlägg -->
			<div class="border m-1 p-2">

			<!-- formulär för reply -->
			<form method="post" action="" class="">
				<input type="hidden" name="reply_skickat"> <!-- Skickar en parameter till php -->
				<textarea class="form-control" rows="5" name="textarea"></textarea>

				<!-- Submit knapp separat från textboxen -->
				<div class="border m-1">
					<input type="submit" name="submit" value="Reply to this Kwitt!">
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

