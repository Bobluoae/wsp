<?php 
//Ta emot json encodat data från Javascript, dvs message eller reply ID på den man har gillat eller ogillat samt unlikeat.
//Like/Dislike message/Kwitt
if ($_GET["ajax"] == "like_post") {
	//Lägger datat i en payload som kan refereras till
	$payload = json_decode(file_get_contents("php://input"));

	//Updatera datat på "m_likes" i DB, den gör -1 för en dislike och +1 för en like i en separat tabell
	if ($payload->isDislike == true) {
		$query = $conn->prepare("INSERT INTO m_likes SET `like` = -1, m_id = ?, user_id = ? ON DUPLICATE KEY UPDATE `like` = -1");
	} else {
		$query = $conn->prepare("INSERT INTO m_likes SET `like` = 1, m_id = ?, user_id = ? ON DUPLICATE KEY UPDATE `like` = 1");
	}
	$query->bindParam('1', $payload->messageId, PDO::PARAM_INT);
	$query->bindParam('2', $_SESSION["user_id"], PDO::PARAM_INT);
	$query->execute();

	header("Content-Type: application/json");
	
	if ($query->rowCount()) {
		if ($payload->isDislike == true){ //Skicka en respons till webbläsaren
			echo json_encode(["action" => "dislike_post", "dislike_post" => $payload->messageId]);
		} else { //Skicka en respons till webbläsaren
			echo json_encode(["action" => "like_post", "like_post" => $payload->messageId]);
		}
	} else { //Skicka en respons till webbläsaren
		echo json_encode("no_change");
	}
	
	
	exit();
}

//Likea eller dislikea ett reply på en kwitt
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

	header("Content-Type: application/json");
	
	if ($query->rowCount()) {
		if ($payload->isDislike == true){ //Skicka en respons till webbläsaren
			echo json_encode(["action" => "dislike_reply", "dislike_reply" => $payload->replyId]);
		} else {  //Skicka en respons till webbläsaren
			echo json_encode(["action" => "like_reply", "like_reply" => $payload->replyId]);
		}
	} else {//Skicka en respons till webbläsaren
		echo json_encode("no_change");
	}
	
	exit();
}

//unlikea alltså ta bort din like eller dislike från ett message/Kwitt
if ($_GET["ajax"] == "unlike_post") {
	//Lägger datat i en payload som kan refereras till
	$payload = json_decode(file_get_contents("php://input"));

	//Updatera datat på "m_likes" i DB
	$query = $conn->prepare("DELETE FROM m_likes WHERE m_id = ? AND user_id = ?");
	$query->bindParam('1', $payload->unlikeId, PDO::PARAM_INT);
	$query->bindParam('2', $_SESSION["user_id"], PDO::PARAM_INT);
	$query->execute();

	header("Content-Type: application/json");

	if ($query->rowCount()) { //Skicka en respons till webbläsaren
		echo json_encode(["action" => "unlike_post", "unlike_post" => $payload->unlikeId]); 
	}
	else { //Skicka en respons till webbläsaren
		echo json_encode("no_change");
	}

	exit();
}

//Ta bort Like/Dislike på Reply på en kwitt
if ($_GET["ajax"] == "unlike_reply") {
	//Lägger datat i en payload som kan refereras till
	$payload = json_decode(file_get_contents("php://input"));

	//Updatera datat på "r_likes" i DB
	$query = $conn->prepare("DELETE FROM r_likes WHERE r_id = ? AND user_id = ?");
	$query->bindParam('1', $payload->r_unlikeId, PDO::PARAM_INT);
	$query->bindParam('2', $_SESSION["user_id"], PDO::PARAM_INT);
	$query->execute();

	header("Content-Type: application/json");

	if ($query->rowCount()) { //Skicka en respons till webbläsaren
		echo json_encode(["action" => "unlike_reply", "unlike_reply" => $payload->r_unlikeId]);
	}
	else { //Skicka en respons till webbläsaren
		echo json_encode("no_change");
	}

	
	exit();
}



// TESTING
if ($_GET["ajax"] == "loadMessages") {
	
	$num + $payload->load;
	getMessages($num);

	//Skicka en respons till webbläsaren
	header("Content-Type: application/json");

	if ($query->rowCount()) { //Skicka en respons till webbläsaren
		echo json_encode(["action" => "load", "load" => $payload->load]);
	}
	else { //Skicka en respons till webbläsaren
		echo json_encode("no_change");
	}
	exit();
}