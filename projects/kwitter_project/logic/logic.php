<?php

$user = getUserInfo();

//Definera variabler
if (!isset($_GET["reply"])) {
	$_GET["reply"] = false;
}
if (!isset($_GET["page"])) {
	$_GET["page"] = "";
}
if (!isset($_SESSION["usertype"])) {
	$_SESSION["usertype"] = "";
}
//Kan bara ske om man är inloggad
if (isset($_SESSION["user_id"])) {

	//Lägg upp ett inlägg på Kwitter
	if (isset($_POST["upload_skickat"])) {
		
		$text = $_POST["textarea"];
		$id = $_SESSION["user_id"];

		$query = $conn->prepare("INSERT INTO chat_log SET message = ?, user_id = ?");
		$query->bindParam('1', $text, PDO::PARAM_STR);
		$query->bindParam('2', $id, PDO::PARAM_INT);
		$query->execute();

		//Skickar webbläsaren till flow sidan utan återbekräftelse av formuläret.
		header("Location: ?page=flow");
	}

	//Svara på en annan användares inlägg
	if (isset($_POST["reply_skickat"])) {

		$rep = $_POST["textarea"];
		$m_id = $_GET["reply"];
		$user_id = $_SESSION["user_id"];

		$query = $conn->prepare("INSERT INTO replies SET reply = ?, m_id = ?, user_id = ?");
		$query->bindParam('1', $rep, PDO::PARAM_STR);
		$query->bindParam('2', $m_id, PDO::PARAM_INT);
		$query->bindParam('3', $user_id, PDO::PARAM_INT);
		$query->execute();

		//Gå till det specifika inlägget du befinner dig på för att inte få återbekräftelse av formuläret.
		header("Location: ?page=reply&reply={$_GET["reply"]}");
	}

	//Hämta data från ett specifikt inlägg och alla svar på det inlägget
	if($_GET["page"] == "reply"){
		$message = getOneMessage($_GET["reply"]);
		$replies = getReplies($_GET["reply"]);
	}

	//Hämta data för alla inlägg
	if($_GET["page"] == "flow"){
		$messages = getMessages();
	}

	//Delete funktionalitet bara för användaren som postade meddelandet
	if (isset($_GET["delete"])) {
		$messages = getMessages();
		foreach ($messages as $message) {
			if ($_SESSION["user_id"] == $message["user_id"] && $_GET["delete"] == $message["m_id"]) {

				$del = intval($_GET["delete"]);

				$query = $conn->prepare("DELETE FROM chat_log WHERE m_id = ?");
				$query->bindParam('1', $del, PDO::PARAM_INT);
				$query->execute();

				if ($query) {
					header("Location: ?page=flow");
				}
			}
		}
	}

	//Delete funktionalitet bara för användaren som postade reply
	if (isset($_GET["deletereply"])) {

		if ($_SESSION["user_id"]) {

			$del = intval($_GET["deletereply"]);
			$delu = intval($_SESSION["user_id"]);

			$query = $conn->prepare("DELETE FROM replies WHERE r_id = ? AND user_id = ?");
			$query->bindParam('1', $del, PDO::PARAM_INT);
			$query->bindParam('2', $delu, PDO::PARAM_INT);
			$query->execute();

			if ($query) {
				header("Location: ?page=reply&reply={$_GET["reply"]}");
			}
		}

	}



}