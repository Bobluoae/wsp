<?php 
//Få alla meddelanden på hemsidan.
function getMessages($offset = 0) {
	global $conn;
	//Hämta alla meddelanden, alla nyaste meddelanden blir först på listan
	$query = $conn->prepare("SELECT * FROM chat_log, users WHERE chat_log.user_id = users.user_id ORDER BY m_id DESC LIMIT " . PERPAGE . " OFFSET ". $offset);
	$query->execute();

	return $query->fetchAll(PDO::FETCH_ASSOC);
}

//Hämta ett meddelande
function getOneMessage($id) {
	global $conn;
	//Hämta ett specifikt meddelande med message ID
	$query = $conn->prepare("SELECT * FROM chat_log, users WHERE chat_log.user_id = users.user_id AND chat_log.m_id = ?");
	$query->bindParam('1', $id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetch(PDO::FETCH_ASSOC);
}

//Hämta alla meddelanden från en specifik användare
function getUserPosts($user_id) {
	global $conn;
	//Hämta alla meddelanden av en användare
	$query = $conn->prepare("SELECT * FROM chat_log, users WHERE chat_log.user_id = users.user_id AND chat_log.user_id = ? ORDER BY m_id DESC");
	$query->bindParam('1', $user_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchAll(PDO::FETCH_ASSOC);
}

//Hämta all information om en användare / Bara för admin
function getUserInfo($user_id) {
	global $conn;
	//All information om en användare
	$query = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
	$query->bindParam('1', $user_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetch(PDO::FETCH_ASSOC);
}

//Hämta alla svar på ett specifikt meddelande
function getReplies($m_id) {
	global $conn;
	//Hämta alla replies, alla nyaste replies blir först på listan
	$query = $conn->prepare("SELECT * FROM replies, users WHERE m_id = ? AND replies.user_id = users.user_id ORDER BY r_id DESC");
	$query->bindParam('1', $m_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchAll(PDO::FETCH_ASSOC);
}

//Hämta alla likes från ett specifikt meddelande
function getMessageLikes($m_id) {
	global $conn;
	//Hämta alla likes
	$query = $conn->prepare("SELECT COUNT(*) FROM m_likes WHERE `like` = 1 AND m_id = ?;");
	$query->bindParam('1', $m_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchColumn(0);
}

//Hämta alla dislikes från ett specifikt meddelande
function getMessageDislikes($m_id) {
	global $conn;
	//Hämta alla dislikes
	$query = $conn->prepare("SELECT COUNT(*) FROM m_likes WHERE `like` = -1 AND m_id = ?;");
	$query->bindParam('1', $m_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchColumn(0);
}

//Hämta alla likes från ett specifkt svar/reply
function getReplyLikes($r_id) {
	global $conn;
	//Hämta alla likes
	$query = $conn->prepare("SELECT COUNT(*) FROM r_likes WHERE `like` = 1 AND r_id = ?;");
	$query->bindParam('1', $r_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchColumn(0);
}

//Hämta alla dislikes från ett specifkt svar/reply
function getReplyDislikes($r_id) {
	global $conn;
	//Hämta alla dislikes
	$query = $conn->prepare("SELECT COUNT(*) FROM r_likes WHERE `like` = -1 AND r_id = ?;");
	$query->bindParam('1', $r_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchColumn(0);
}

//Kolla om ett specifikt meddelande redan är likeat för användaren
function isMessageLiked($m_id){
	global $conn;
	//Hämta data från m_likes tabellen för användaren
	$query = $conn->prepare("SELECT * FROM m_likes WHERE m_id = ? AND user_id = ?");
	$query->bindParam('1', $m_id, PDO::PARAM_INT);
	$query->bindParam('2', $_SESSION["user_id"], PDO::PARAM_INT);
	$query->execute();

	//Kolla om meddelandet hade blivit likeat
	if ($query->rowCount() == 1) {
		return $query->fetchColumn(3);
	} else {
		return 0;
	}
}

//Kolla om ett specifikt svar/reply redan är likeat för användaren
function isReplyLiked($r_id){
	global $conn;
	//Hämta data från r_likes tabellen för användaren
	$query = $conn->prepare("SELECT * FROM r_likes WHERE r_id = ? AND user_id = ?");
	$query->bindParam('1', $r_id, PDO::PARAM_INT);
	$query->bindParam('2', $_SESSION["user_id"], PDO::PARAM_INT);
	$query->execute();

	//Kolla om svaret/reply hade blivit likeat
	if ($query->rowCount() == 1) {
		return $query->fetchColumn(3);
	} else {
		return 0;
	}
}

//Räkna alla replies på ett meddelande
function countReplies($m_id){
	global $conn;
	
	$query = $conn->prepare("SELECT * FROM replies WHERE m_id = ?");
	$query->bindParam('1', $m_id, PDO::PARAM_INT);
	$query->execute();

	//Räkna alla replies
	$count = $query->fetchAll(PDO::FETCH_ASSOC);
	return count($count);
}