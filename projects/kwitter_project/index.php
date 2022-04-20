<?php
include "db/dbconn.php";
session_start();

//Login

// include "logic/functions.php";
$error = false;
include "logic/reg.php";
include "logic/log.php";

if (!isset($_GET["page"])) {
	$_GET["page"] = "";
}

if (!isset($_SESSION["usertype"])) {
	$_SESSION["usertype"] = "";
}


include "visual/header.php";
include "visual/navbar.php";


if ($_GET["page"] == "login") {
	include "visual/pages/login.php";
}
if ($_GET["page"] == "register") {
	include "visual/pages/register.php";
}
if ($_GET["page"] == "flow") {
	include "visual/pages/flow.php";
}

include "visual/footer.php";