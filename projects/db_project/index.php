<?php 
//DB connection
include "db/dbconn.php";
session_start();

//Login

include "logic/functions.php";
$error = false;
include "logic/reg.php";
include "logic/login.php";


//logic
include "logic/addtodb.php";

//HTML start body and permanent navbar
include "visual/header.php";

if (!isset($_SESSION["usertype"])) {
	$_SESSION["usertype"] = "";
}
if ($_SESSION["usertype"] == "user") {
	include "visual/navbar.php";
}

//page handling ADMIN

if ($_SESSION["usertype"] == "admin") {

	include "visual/adminnav.php";

	if ($_GET["page"] == "tableadmin") {
		include "visual/pages/table.php";
		include "logic/table.php";
	}
	if ($_GET["page"] == "regpage") {
		include "visual/pages/regpage.php";
	}
	if ($_GET["page"] == "addadmin") {
		include "visual/pages/addform.php";
	}
	if ($_GET["page"] == "update") {
		include "visual/pages/update.php";
	}
}
if ($_SESSION["usertype"] == "user") {

	if ($_GET["page"] == "tableuser") {
		include "visual/pages/table.php";
		include "logic/tableuser.php";
	}
	if ($_GET["page"] == "regpage") {
		include "visual/pages/regpage.php";
	}
}


if ($_GET["page"] == "login"){
	include "visual/pages/loginpage.php";
} 
if ($_GET["page"] == ""){
	include "visual/pages/loginpage.php";
} 
if ($_GET["page"] == "regpage") {
	include "visual/pages/regpage.php";
}
if ($_GET["page"] == "welcome") {
	include "visual/pages/welcome.php";
}


//HTML end body and footer
include "visual/footer.php";