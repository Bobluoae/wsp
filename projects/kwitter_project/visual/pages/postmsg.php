<?php // Användaren kan bara lägga upp inlägg om dom är inloggad
if (isset($_SESSION["isLoggedIn"])): ?>
<div class="container bg">
  <div class="row align-items-start border">
    <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>

    <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-8 border col-md-8">
      <div class="m-1 p-4">
        <?php 
          //posta meddelande form
          include "logic/upload_post.php";
         ?>
      </div>
    </div>
   		
     <!-- inkludera högerpanel -->
    <?php include "visual/partials/rightpanel.php"; ?>
  </div>
</div>
<?php endif ?>