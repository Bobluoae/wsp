<?php 
function getMessages() {
	global $conn;
	//Hämta alla meddelanden, alla nyaste meddelanden blir först på listan
	$query = $conn->prepare("SELECT * FROM chat_log, users WHERE chat_log.user_id = users.user_id ORDER BY m_id DESC");
	$query->execute();

	return $query->fetchAll(PDO::FETCH_ASSOC);
}
function getOneMessage($id) {
	global $conn;
	//Hämta ett specifikt meddelande
	$query = $conn->prepare("SELECT * FROM chat_log, users WHERE chat_log.user_id = users.user_id AND chat_log.m_id = ?");
	$query->bindParam('1', $id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetch(PDO::FETCH_ASSOC);
}
function getUserPosts($user_id) {
	global $conn;
	//Hämta alla meddelanden av en användare
	$query = $conn->prepare("SELECT * FROM chat_log, users WHERE chat_log.user_id = users.user_id AND chat_log.user_id = ? ORDER BY m_id DESC");
	$query->bindParam('1', $user_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchAll(PDO::FETCH_ASSOC);
}
function getUserInfo($user_id) {
	global $conn;
	//All information om en användare
	$query = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
	$query->bindParam('1', $user_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetch(PDO::FETCH_ASSOC);
}
function getReplies($m_id) {
	global $conn;
	//Hämta alla replies, alla nyaste replies blir först på listan
	$query = $conn->prepare("SELECT * FROM replies, users WHERE m_id = ? AND replies.user_id = users.user_id ORDER BY r_id DESC");
	$query->bindParam('1', $m_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchAll(PDO::FETCH_ASSOC);
}
function getMessageLikes($m_id) {
	global $conn;
	//Hämta alla replies, alla nyaste replies blir först på listan
	$query = $conn->prepare("SELECT COUNT(*) FROM m_likes WHERE `like` = 1 AND m_id = ?;");
	$query->bindParam('1', $m_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchColumn(0);
}
function getMessageDislikes($m_id) {
	global $conn;
	//Hämta alla replies, alla nyaste replies blir först på listan
	$query = $conn->prepare("SELECT COUNT(*) FROM m_likes WHERE `like` = -1 AND m_id = ?;");
	$query->bindParam('1', $m_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchColumn(0);
}
function getReplyLikes($r_id) {
	global $conn;
	//Hämta alla replies, alla nyaste replies blir först på listan
	$query = $conn->prepare("SELECT COUNT(*) FROM r_likes WHERE `like` = 1 AND r_id = ?;");
	$query->bindParam('1', $r_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchColumn(0);
}
function getReplyDislikes($r_id) {
	global $conn;
	//Hämta alla replies, alla nyaste replies blir först på listan
	$query = $conn->prepare("SELECT COUNT(*) FROM r_likes WHERE `like` = -1 AND r_id = ?;");
	$query->bindParam('1', $r_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchColumn(0);
}
function isMessageLiked($m_id){
	global $conn;
	//Hämta alla replies, alla nyaste replies blir först på listan
	$query = $conn->prepare("SELECT * FROM m_likes WHERE m_id = ? AND user_id = ?");
	$query->bindParam('1', $m_id, PDO::PARAM_INT);
	$query->bindParam('2', $_SESSION["user_id"], PDO::PARAM_INT);
	$query->execute();
	if ($query->rowCount() == 1) {
		return $query->fetchColumn(3);
	} else {
		return 0;
	}
}
function isReplyLiked($r_id){
	global $conn;
	//Hämta alla replies, alla nyaste replies blir först på listan
	$query = $conn->prepare("SELECT * FROM r_likes WHERE r_id = ? AND user_id = ?");
	$query->bindParam('1', $r_id, PDO::PARAM_INT);
	$query->bindParam('2', $_SESSION["user_id"], PDO::PARAM_INT);
	$query->execute();
	if ($query->rowCount() == 1) {
		return $query->fetchColumn(3);
	} else {
		return 0;
	}
}