<?php // Användaren kan bara lägga upp inlägg om dom är inloggad
if (isset($_SESSION["isLoggedIn"])): ?>
<div class="container bg">
  <div class="row align-items-start">
    <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>

    <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-8 border-main main col-md-8" style="min-height:800px;">
      <div class="m-1 p-4">
        <?php 
          //posta meddelande form
          include "visual/partials/upload_post.php";
         ?>
      </div>
    </div>
   		
     <!-- inkludera högerpanel -->
    <?php include "visual/partials/rightpanel.php"; ?>
  </div>
</div>
<?php endif ?>