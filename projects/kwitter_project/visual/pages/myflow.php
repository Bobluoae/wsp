<?php // Användaren kan bara se Myflow om dom är inloggad
if (isset($_SESSION["isLoggedIn"])): ?>
<div class="container bg">
  <div class="row align-items-start border">

     <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>


    <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-8 border col-md-8">
   		<div class="m-1 p-4">
        <div class="border m-4 p-4">
          <?php
            echo "This is ".$_SESSION["username"]."'s flow!";
            echo "<br>Usertype: ".$_SESSION["usertype"];
          ?>
        </div>
   			<?php 
          //Loopa genom alla meddelanden från användaren
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

<?php include "js/like_functions.js";
endif ?>