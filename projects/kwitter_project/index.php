<?php
include "db/dbconn.php";
session_start();

//Login


$error = false;
include "logic/reg.php";
include "logic/log.php";

include "logic/functions.php";
include "logic/logic.php";


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
// if ($_GET["page"] == "myflow") {
// 	include "visual/pages/myflow.php";
// }
if ($_GET["page"] == "postmsg") {
	include "visual/pages/postmsg.php";
}
if ($_GET["page"] == "reply") {
	include "visual/pages/reply.php";
}

include "visual/footer.php";