<?php
//Definera variabler
if (!isset($_SESSION["time"])) {
	$_SESSION["time"] = time();
}
if (!isset($_GET["reply"])) {
	$_GET["reply"] = false;
}
if (!isset($_GET["theirflow"])) {
	$_GET["theirflow"] = false;
}
if (!isset($_GET["page"])) {
	$_GET["page"] = "login";
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

		//HTML entities blir borttagna för att förhindra injections
		htmlentities($text);

		$time = time() - $_SESSION["time"];

		if ($time > 10) {

			$query = $conn->prepare("INSERT INTO chat_log SET message = ?, user_id = ?, m_created_at = NOW()");
			$query->bindParam('1', $text, PDO::PARAM_STR);
			$query->bindParam('2', $id, PDO::PARAM_INT);
			$query->execute();

			$time = 0;
			unset($_SESSION["time"]);

			//Skickar webbläsaren till flow sidan utan återbekräftelse av formuläret.
			header("Location: ?page=flow");
		} else {
			$err = "You have to wait at least 10 seconds before sending another message!";
		}
	}

	//Svara på en annan användares inlägg
	if (isset($_POST["reply_skickat"])) {

		$rep = $_POST["textarea"];
		$m_id = $_GET["reply"];
		$user_id = $_SESSION["user_id"];

		//HTML entities blir borttagna för att förhindra injections
		htmlentities($rep);

		$time = time() - $_SESSION["time"];

		if ($time > 10) {

			$query = $conn->prepare("INSERT INTO replies SET reply = ?, m_id = ?, user_id = ?, r_created_at = NOW()");
			$query->bindParam('1', $rep, PDO::PARAM_STR);
			$query->bindParam('2', $m_id, PDO::PARAM_INT);
			$query->bindParam('3', $user_id, PDO::PARAM_INT);
			$query->execute();

			$time = 0;
			unset($_SESSION["time"]);

		//Gå till det specifika inlägget du befinner dig på för att inte få återbekräftelse av formuläret.
		header("Location: ?page=reply&reply={$_GET["reply"]}");
		} else {
			$err = "You have to wait at least 10 seconds before sending another reply!";
		}
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

	//Hämta data för en användares inlägg
	if ($_GET["theirflow"] && $_GET["page"] == "theirflow") {
		$messages = getUserPosts($_GET["theirflow"]);
		$user_info = getUserInfo($_GET["theirflow"]);

		// header("Location: ?page=theirflow&theirflow={$_GET["thierflow"]}");	
	}

	//Delete funktionalitet bara för användaren som postade meddelandet
	if (isset($_GET["delete"])) {

		//Först måste du ta bort alla replies sedan kan du deleta meddelandet (Kan göras i DB med en typ av cascading key(svårt at förklara))

		$del = intval($_GET["delete"]);
		$delu = intval($_SESSION["user_id"]);

		$query = $conn->prepare("DELETE FROM replies WHERE m_id = ?");
		$query->bindParam('1', $del, PDO::PARAM_INT);
		$query->execute();

		$query = $conn->prepare("DELETE FROM chat_log WHERE m_id = ? AND user_id = ?");
		$query->bindParam('1', $del, PDO::PARAM_INT);
		$query->bindParam('2', $delu, PDO::PARAM_INT);
		$query->execute();

		//Förhindra återsendning av delete med header
		header("Location: ?page=flow");
	}

	//Delete funktionalitet bara för användaren som postade reply
	if (isset($_GET["deletereply"])) {

		$del = intval($_GET["deletereply"]);
		$delu = intval($_SESSION["user_id"]);

		$query = $conn->prepare("DELETE FROM replies WHERE r_id = ? AND user_id = ?");
		$query->bindParam('1', $del, PDO::PARAM_INT);
		$query->bindParam('2', $delu, PDO::PARAM_INT);
		$query->execute();

		//Förhindra återsendning av delete med header
		header("Location: ?page=reply&reply={$_GET["reply"]}");
	}

	if (isset($_POST["bio_skickat"])) {

		$bio = $_POST["textarea"];
		$user_id = $_SESSION["user_id"];

		//HTML entities blir borttagna för att förhindra injections
		$bio = htmlentities($bio);

		$query = $conn->prepare("UPDATE users SET bio = ? WHERE user_id = ?");
		$query->bindParam('1', $bio, PDO::PARAM_STR);
		$query->bindParam('2', $user_id, PDO::PARAM_INT);
		$query->execute();

		header('Location: ?page=theirflow&theirflow=' . $_SESSION["user_id"]);
	}
}