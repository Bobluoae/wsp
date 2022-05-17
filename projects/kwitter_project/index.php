<?php
include "db/dbconn.php";
session_start();

//Login
$error = false;
include "logic/reg.php";
include "logic/log.php";

//Logik
include "logic/functions.php";
include "logic/logic.php";

//Logik bara för administratörer
if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "admin") {
	include "logic/admin/adminlogic.php";
}

if (isset($_GET["ajax"])){
	include "logic/ajax.php";
}

//Alltid synliga html filer
include "visual/header.php";
include "visual/navbar.php";

//Sido-hanterare
if ($_GET["page"] == "login") {
	include "visual/pages/login.php";
}
if ($_GET["page"] == "register") {
	include "visual/pages/register.php";
}
if ($_GET["page"] == "flow") {
	include "visual/pages/flow.php";
}
if ($_GET["page"] == "theirflow") {
	include "visual/pages/theirflow.php";
}
if ($_GET["page"] == "myflow") {
	include "visual/pages/myflow.php";
}
if ($_GET["page"] == "postmsg") {
	include "visual/pages/postmsg.php";
}
if ($_GET["page"] == "reply") {
	include "visual/pages/reply.php";
}
if ($_GET["page"] == "information") {
	include "visual/pages/information.php";
}
if ($_GET["page"] == "admin" && $_SESSION["usertype"] == "admin") {
	include "visual/pages/admin/admin.php";
}
if ($_GET["page"] == "update" && $_SESSION["usertype"] == "admin") {
	include "visual/pages/admin/updateform.php";
}

//Alltid synlig footer
include "visual/footer.php";