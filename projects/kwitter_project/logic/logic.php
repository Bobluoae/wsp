<?php
//Definera variabler
if (!isset($_SESSION["time"])) {
	$_SESSION["time"] = time();
}
if (!isset($_SESSION["timem"])) {
	$_SESSION["timem"] = time();
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
if (!isset($_GET["pagenum"])) {
	$_GET["pagenum"] = 1;
}
//Kan bara ske om man är inloggad
if (isset($_SESSION["user_id"])) {

	//Lägg upp ett inlägg på Kwitter
	if (isset($_POST["upload_skickat"])) {

		$text = $_POST["textarea"];
		$img = $_POST["img"];
		$id = $_SESSION["user_id"];

		//HTML entities blir borttagna för att förhindra injections
		$text = htmlentities($text);
		$img = htmlentities($img);

		if (strlen($text) <= 1000 && strlen($img) <= 1000) { //number of characters less than 1000
			
			$timem = time() - $_SESSION["timem"];

			if ($timem > 10) {

				$query = $conn->prepare("INSERT INTO chat_log SET message = ?, image = ?, user_id = ?, m_created_at = NOW()");
				$query->bindParam('1', $text, PDO::PARAM_STR);
				$query->bindParam('2', $img, PDO::PARAM_STR);
				$query->bindParam('3', $id, PDO::PARAM_INT);
				$query->execute();

				$timem = 0;
				unset($_SESSION["timem"]);

				//Skickar webbläsaren till flow sidan utan återbekräftelse av formuläret.
				header("Location: ?page=flow");
				exit();
			} else {
				$err = "You have to wait at least 10 seconds before sending another message!";
			}
		} else {
			$err = "You're not allowed to write over 1000 characters.";
		}
	}

	//Svara på en annan användares inlägg
	if (isset($_POST["reply_skickat"])) {

		$rep = $_POST["textarea"];
		$img = $_POST["r_img"];
		$m_id = $_GET["reply"];
		$user_id = $_SESSION["user_id"];

		//HTML entities blir borttagna för att förhindra injections
		$rep = htmlentities($rep);
		$img = htmlentities($img);

		if (strlen($rep) <= 1000 && strlen($img) <= 1000) { //number of characters less than 1000

			$timer = time() - $_SESSION["time"];

			if ($timer > 10) {

				$query = $conn->prepare("INSERT INTO replies SET reply = ?, image = ?, m_id = ?, user_id = ?, r_created_at = NOW()");
				$query->bindParam('1', $rep, PDO::PARAM_STR);
				$query->bindParam('2', $img, PDO::PARAM_STR);
				$query->bindParam('3', $m_id, PDO::PARAM_INT);
				$query->bindParam('4', $user_id, PDO::PARAM_INT);
				$query->execute();

				$timer = 0;
				unset($_SESSION["time"]);

			//Gå till det specifika inlägget du befinner dig på för att inte få återbekräftelse av formuläret.
			header("Location: ?page=reply&reply={$_GET["reply"]}");
			exit();
			} else {//Error message definition
				$err = "You have to wait at least 10 seconds before sending another reply!";
			}
		} else {
			$err = "You're not allowed to write over 1000 characters.";
		}
	}

	//Hämta data från ett specifikt inlägg och alla svar på det inlägget
	if($_GET["page"] == "reply"){

		//Skicka in offset till databas select för sidonumrering
		$offset = $_GET["pagenum"] * PERPAGE - PERPAGE;

		$message = getOneMessage($_GET["reply"]);
		$replies = getReplies($_GET["reply"], $offset);
	}

	//Hämta data för alla inlägg
	if($_GET["page"] == "flow"){

		//Skicka in offset till databas select för sidonumrering
		$offset = $_GET["pagenum"] * PERPAGE - PERPAGE;

		$messages = getMessages($offset);
	}

	//Hämta data för en användares inlägg
	if ($_GET["theirflow"] && $_GET["page"] == "theirflow") {

		//Skicka in offset till databas select för sidonumrering
		$offset = $_GET["pagenum"] * PERPAGE - PERPAGE;

		$messages = getUserPosts($_GET["theirflow"], $offset);
		$user_info = getUserInfo($_GET["theirflow"]);

		// header("Location: ?page=theirflow&theirflow={$_GET["thierflow"]}");	
	}

	//Delete funktionalitet bara för användaren som postade meddelandet
	if (isset($_GET["delete"])) {

		$msg = getOneMessage($_GET["delete"]);

		//Kontrollera att man får radera
		if ($_SESSION["usertype"] == "admin" || $_SESSION["user_id"] == $msg["user_id"]) {

			//Först måste du ta bort alla replies sedan kan du deleta meddelandet (Kan göras i DB med en typ av cascading key(svårt at förklara))
			$del = intval($_GET["delete"]);

			$query = $conn->prepare("DELETE FROM chat_log WHERE m_id = ?");
			$query->bindParam('1', $del, PDO::PARAM_INT);
			$query->execute();

			//Förhindra återsendning av delete med header
			header("Location: ?page=flow");
			exit();
		}
	}

	//Delete funktionalitet bara för användaren som postade reply
	if (isset($_GET["deletereply"])) {

		$r_id = $_GET["deletereply"];

		$query = $conn->prepare("SELECT user_id FROM replies WHERE r_id = ?");
		$query->bindParam('1', $r_id, PDO::PARAM_INT);
		$query->execute();
		$rep = $query->fetch(PDO::FETCH_ASSOC);

		//Kontrollera att man får radera
		if ($_SESSION["usertype"] == "admin" || $_SESSION["user_id"] == $rep["user_id"]) {

			$del = intval($_GET["deletereply"]);
			

			$query = $conn->prepare("DELETE FROM replies WHERE r_id = ?");
			$query->bindParam('1', $del, PDO::PARAM_INT);
			$query->execute();

			//Förhindra återsendning av delete med header
			header("Location: ?page=reply&reply={$_GET["reply"]}");
			exit();
		}
	}

	if (isset($_POST["bio_skickat"])) {

		$bio = $_POST["textarea"];
		$banner = $_POST["banner"];
		$user_id = $_SESSION["user_id"];

		//HTML entities blir borttagna för att förhindra injections
		$bio = htmlentities($bio);
		$banner = htmlentities($banner);

		if (strlen($bio) <= 1000 && strlen($banner) <= 1000) { //number of characters less than 1000

			$query = $conn->prepare("UPDATE users SET bio = ?, banner = ? WHERE user_id = ?");
			$query->bindParam('1', $bio, PDO::PARAM_STR);
			$query->bindParam('2', $banner, PDO::PARAM_STR);
			$query->bindParam('3', $user_id, PDO::PARAM_INT);
			$query->execute();

			header('Location: ?page=theirflow&theirflow=' . $_SESSION["user_id"]);
			exit();
		} else {
			$err = "You're not allowed to write over 1000 characters.";
		}
	}
}