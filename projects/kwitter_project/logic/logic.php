<?php

$user = getUserInfo();

if (!isset($_GET["reply"])) {
	$_GET["reply"] = false;
}

if (!isset($_GET["page"])) {
	$_GET["page"] = "";
}

if (!isset($_SESSION["usertype"])) {
	$_SESSION["usertype"] = "";
}

if (isset($_SESSION["user_id"])) {

	if (isset($_POST["upload_skickat"])) {
		
		$text = $_POST["textarea"];
		$id = $_SESSION["user_id"];

		$query = $conn->prepare("INSERT INTO chat_log SET message = ?, user_id = ?");
		$query->bindParam('1', $text, PDO::PARAM_STR);
		$query->bindParam('2', $id, PDO::PARAM_INT);
		$query->execute();

		header("Location: ?page=flow");
	}

	if($_GET["page"] == "reply"){
		$message = getOneMessage($_GET["reply"]);
	}

	if($_GET["page"] == "flow"){
		$messages = getMessages();
	}
}