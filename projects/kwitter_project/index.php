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
//Alltid synlig footer
include "visual/footer.php";