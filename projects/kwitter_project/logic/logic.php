<?php
//Definera variabler
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

		//HTML entities blir borttagna för att förhindra injections
		htmlentities($rep);

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
	//Hämta data för alla dina inlägg
	if($_GET["page"] == "myflow"){
		$messages = getUserPosts($_SESSION["user_id"]);
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





}