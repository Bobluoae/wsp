<?php 
if ($_GET["ajax"] == "like_post") {

$payload = json_decode(file_get_contents("php://input"));

if ($payload->isDislike == true) {
	$query = $conn->prepare("UPDATE chat_log SET dislikes = dislikes + 1 WHERE m_id = ?");
} else {
	$query = $conn->prepare("UPDATE chat_log SET likes = likes + 1 WHERE m_id = ?");
}
$query->bindParam('1', $payload->messageId, PDO::PARAM_INT);
$query->execute();

header("Content-Type: application/json");
echo json_encode("Ok!" . $payload->messageId);


}
exit();