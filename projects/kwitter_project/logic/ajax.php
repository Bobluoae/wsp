<?php 
//Ta emot json encodat data från Javascript, dvs message ID på den man har gillat eller ogillat.
if ($_GET["ajax"] == "like_post") {
//Lägger datat i en payload som kan refereras till
$payload = json_decode(file_get_contents("php://input"));

// Updatera datat på "likes" eller "dislikes" i DB
if ($payload->isDislike == true) {
	$query = $conn->prepare("UPDATE chat_log SET dislikes = dislikes + 1 WHERE m_id = ?");
} else {
	$query = $conn->prepare("UPDATE chat_log SET likes = likes + 1 WHERE m_id = ?");
}
$query->bindParam('1', $payload->messageId, PDO::PARAM_INT);
$query->execute();

//Skicka en respons till webbläsaren
header("Content-Type: application/json");
echo json_encode("Ok!" . $payload->messageId);
}
exit();