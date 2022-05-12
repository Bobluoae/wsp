<?php 
//Ta emot json encodat data från Javascript, dvs message ID på den man har gillat eller ogillat.
if ($_GET["ajax"] == "like_post") {
	//Lägger datat i en payload som kan refereras till
	$payload = json_decode(file_get_contents("php://input"));

	//Updatera datat på "m_likes" i DB
	if ($payload->isDislike == true) {
		$query = $conn->prepare("INSERT INTO m_likes SET `like` = -1, m_id = ?, user_id = ? ON DUPLICATE KEY UPDATE `like` = -1");
	} else {
		$query = $conn->prepare("INSERT INTO m_likes SET `like` = 1, m_id = ?, user_id = ? ON DUPLICATE KEY UPDATE `like` = 1");
	}
	$query->bindParam('1', $payload->messageId, PDO::PARAM_INT);
	$query->bindParam('2', $_SESSION["user_id"], PDO::PARAM_INT);
	$query->execute();

	//Skicka en respons till webbläsaren
	header("Content-Type: application/json");
	echo json_encode("Ok!" . $payload->messageId ." | ". $_SESSION["user_id"]);
	exit();
}

//Ta emot json encodat data från Javascript, dvs message ID på den man har gillat eller ogillat.
if ($_GET["ajax"] == "unlike_post") {
	//Lägger datat i en payload som kan refereras till
	$payload = json_decode(file_get_contents("php://input"));

	//Updatera datat på "m_likes" i DB
	$query = $conn->prepare("DELETE FROM m_likes WHERE m_id = ? AND user_id = ?");
	$query->bindParam('1', $payload->unlikeId, PDO::PARAM_INT);
	$query->bindParam('2', $_SESSION["user_id"], PDO::PARAM_INT);
	$query->execute();

	//Skicka en respons till webbläsaren
	header("Content-Type: application/json");
	echo json_encode("Deleted Message Like!" . $payload->unlikeId ." | ". $_SESSION["user_id"]);
	exit();
}

//Ta emot json encodat data från Javascript, dvs message ID på den man har gillat eller ogillat.
if ($_GET["ajax"] == "unlike_reply") {
	//Lägger datat i en payload som kan refereras till
	$payload = json_decode(file_get_contents("php://input"));

	//Updatera datat på "m_likes" i DB
	$query = $conn->prepare("DELETE FROM r_likes WHERE r_id = ? AND user_id = ?");
	$query->bindParam('1', $payload->r_unlikeId, PDO::PARAM_INT);
	$query->bindParam('2', $_SESSION["user_id"], PDO::PARAM_INT);
	$query->execute();

	//Skicka en respons till webbläsaren
	header("Content-Type: application/json");
	echo json_encode("Deleted Reply Like!" . $payload->r_unlikeId ." | ". $_SESSION["user_id"]);
	exit();
}

//Ta emot json encodat data från Javascript, dvs message ID på den man har gillat eller ogillat.
if ($_GET["ajax"] == "like_reply") {
	//Lägger datat i en payload som kan refereras till
	$payload = json_decode(file_get_contents("php://input"));

		//Updatera datat på "r_likes" i DB
	if ($payload->isDislike == true) {
		$query = $conn->prepare("INSERT INTO r_likes SET `like` = -1, r_id = ?, user_id = ? ON DUPLICATE KEY UPDATE `like` = -1");
	} else {
		$query = $conn->prepare("INSERT INTO r_likes SET `like` = 1, r_id = ?, user_id = ? ON DUPLICATE KEY UPDATE `like` = 1");
	}
	$query->bindParam('1', $payload->replyId, PDO::PARAM_INT);
	$query->bindParam('2', $_SESSION["user_id"], PDO::PARAM_INT);
	$query->execute();

	//Skicka en respons till webbläsaren
	header("Content-Type: application/json");
	echo json_encode("Ok!" . $payload->replyId ." | ". $_SESSION["user_id"]);
	exit();
}
