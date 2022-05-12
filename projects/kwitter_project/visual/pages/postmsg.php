<?php 
// Användaren kan bara posta om dom är inloggad
if (isset($_SESSION["user_id"])) { 
?>
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
<?php } ?>