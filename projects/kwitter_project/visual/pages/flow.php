<?php // Användaren kan bara se Flow om dom är inloggad
if (isset($_SESSION["isLoggedIn"])): ?>
<div class="container bg">
  <div class="row align-items-start">
    <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>

    <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-8 border-main main">
   		<div id="messages" class="m-1 p-4">
   			<?php
        //Loopa genom alla meddelanden i DB
          $i = 0;
   				foreach ($messages as $message) {
            include "visual/partials/message.php";
            $i++;
          }
   			 ?>
   		</div>
      <button onclick="load()">Load more (WIP)</button>
      <input type="hidden" name="offset" id="offset" value="<?=$i?>">
    </div>

    <!-- inkludera högerpanel -->
    <?php include "visual/partials/rightpanel.php"; ?>
  </div>
</div>
<?php endif ?>