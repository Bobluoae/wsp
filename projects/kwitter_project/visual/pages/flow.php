<div class="container bg">
  <div class="row align-items-start border">
    <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>

    <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-8 border col-md-8">
   		<div class="m-1 p-4">
   			<?php
   				foreach ($messages as $message) {
            include "visual/partials/message.php";
          }
   			 ?>
   		</div>
    </div>

    <!-- inkludera högerpanel -->
    <?php include "visual/partials/rightpanel.php"; ?>
  </div>
</div>