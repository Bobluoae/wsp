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
function getUserInfo(){
	global $conn;
	//All information om en användare
	if (isset($_SESSION["user_id"])) {
		$query = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
		$query->bindParam('1', $_SESSION["user_id"], PDO::PARAM_INT);
		$query->execute();

		return $query->fetch(PDO::FETCH_ASSOC);
	} else {
		return false;
	}
}
function getReplies($m_id) {
	global $conn;
	//Hämta alla replies, alla nyaste replies blir först på listan
	$query = $conn->prepare("SELECT * FROM replies, users WHERE m_id = ? AND replies.user_id = users.user_id ORDER BY r_id DESC");
	$query->bindParam('1', $m_id, PDO::PARAM_INT);
	$query->execute();

	return $query->fetchAll(PDO::FETCH_ASSOC);
}