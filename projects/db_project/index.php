<?php 
//DB connection
include "db/dbconn.php";
session_start();

//Login

include "logic/functions.php";
$error = false;
include "logic/login.php";
include "logic/reg.php";

//logic
include "logic/addtodb.php";

//HTML start body and permanent navbar
include "visual/header.php";
include "visual/navbar.php";

//page handling
if ($_GET["page"] == "table") {
	include "visual/pages/table.php";
	include "logic/table.php";
}
if ($_GET["page"] == "login") {
	include "visual/pages/loginpage.php";
}
if ($_GET["page"] == "regpage") {
	include "visual/pages/regpage.php";
}
if ($_GET["page"] == "add") {
	include "visual/pages/addform.php";
}
if ($_GET["page"] == "update") {
	include "visual/pages/update.php";
}

//HTML end body and footer
include "visual/footer.php";