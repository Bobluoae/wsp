<?php 
include "db/dbconn.php";

//logic
include "logic/functions.php";

if (!isset($_GET["page"])) {
	$_GET["page"] = "";
}

//HTML start body and permanent navbar
include "visual/header.php";
include "visual/navbar.php";



//page handling
if ($_GET["page"] == "table") {
	include "visual/pages/table.php";
	include "logic/table.php";
}
if ($_GET["page"] == "add") {
	include "visual/pages/addform.php";
	include "logic/addtodb.php";
}
if ($_GET["page"] == "delete") {
	include "visual/pages/delete.php";
}


//HTML end body and footer
include "visual/footer.php";