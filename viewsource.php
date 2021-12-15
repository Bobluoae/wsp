<?php

include("incl/config.php");

$title = "WESWEB01: Källkod";
$pageId = "viewsource";
// page specific $pageStyle is designed inside source.php

// Include code from source.php to display sourcecode-viewer
$sourceBasedir=dirname(__FILE__);
$sourceNoEcho=true;
include("source.php");
$pageStyle=$sourceStyle; // $sourceStyle variable is declared and "filled" inside source.php
// -------------------------------------------------------------

include("incl/header.php");
?>


<!-- main content  -->
<div id="content">
 <?php echo "$sourceBody"; ?>
</div>
<script type="text/javascript" src="js/viewsource.js"></script>

<?php
include("incl/footer.php");
?>