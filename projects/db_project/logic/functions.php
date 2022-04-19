<?php 
//Define get
if (!isset($_GET["page"])) {
	$_GET["page"] = "";
}
//Delete id of row from DB when clicked
if (isset($_GET["delete"])) {

	$del = intval($_GET["delete"]);

	$query = $conn->prepare("DELETE FROM friends WHERE id = ?");
	$query->bindParam('1', $del, PDO::PARAM_INT);
	$query->execute();

	$_GET["page"] = "tableadmin";
}
if (isset($_GET["deleteu"])) {

	$del = intval($_GET["deleteu"]);

	$query = $conn->prepare("DELETE FROM users WHERE user_id = ?");
	$query->bindParam('1', $del, PDO::PARAM_INT);
	$query->execute();

	$_GET["page"] = "adminusertable";
}
//Read clicked id and insert into form via post
if (isset($_GET["update"])) {

	$id = intval($_GET["update"]);
	$query = $conn->prepare("SELECT * FROM friends WHERE id = ?");
	$query->bindParam('1', $id, PDO::PARAM_STR);
	$query->execute();

	$_POST = $query->fetch(PDO::FETCH_ASSOC);
}
if (isset($_GET["updateu"])) {

	$id = intval($_GET["updateu"]);
	$query = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
	$query->bindParam('1', $id, PDO::PARAM_STR);
	$query->execute();

	$_POST = $query->fetch(PDO::FETCH_ASSOC);
}
//update 'friends' when clicked
if (isset($_POST["update_skickat"])) {

	$name = $_POST['name'];
	$surname = $_POST["surname"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$id = $_POST["id"];

	$query = $conn->prepare("UPDATE friends SET name = ?, surname = ?, phone = ?, email = ? WHERE id = ?");
	$query->bindParam('1', $name, PDO::PARAM_STR);
	$query->bindParam('2', $surname, PDO::PARAM_STR);
	$query->bindParam('3', $phone, PDO::PARAM_STR);
	$query->bindParam('4', $email, PDO::PARAM_STR);
	$query->bindParam('5', $id, PDO::PARAM_INT);
	$query->execute();


	$_GET["page"] = "tableadmin";
}
if (isset($_POST["update_skickatu"])) {

	$name = $_POST["username"];
	$password = sha1($_POST["password"]); 
	$usertype = $_POST["usertype"];
	$id = $_POST["user_id"];

	$query = $conn->prepare("UPDATE users SET username = ?, password = ?, usertype = ? WHERE user_id = ?");
	$query->bindParam('1', $name, PDO::PARAM_STR);
	$query->bindParam('2', $password, PDO::PARAM_STR);
	$query->bindParam('3', $usertype, PDO::PARAM_STR);
	$query->bindParam('4', $id, PDO::PARAM_INT);
	$query->execute();


	$_GET["page"] = "adminusertable";
}