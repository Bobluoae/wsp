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
         <button onclick="load()" id="load">Load more (WIP)</button>
   		</div>
    </div>

    <!-- inkludera högerpanel -->
    <?php include "visual/partials/rightpanel.php"; ?>
  </div>
</div>

<?php 
include "js/like_functions.js";
endif ?>