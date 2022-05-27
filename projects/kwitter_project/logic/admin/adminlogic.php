<?php 
//Only do logic if the user is an admin and is on the right page
if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "admin" && $_GET["page"] == "admin") {
	
	//Deleting a user from the admin table
	if (isset($_GET["deleteuser"])) {

		$del = intval($_GET["deleteuser"]);

		$query = $conn->prepare("DELETE FROM users WHERE user_id = ?");
		$query->bindParam('1', $del, PDO::PARAM_INT);
		$query->execute();

		$_GET["page"] = "admin";
	}
}
if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "admin") {

	//Admin wants to uppdate some information about a user (username, password and usertype)
	if (isset($_GET["updateuser"])) {

		$id = intval($_GET["updateuser"]);

		$query = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
		$query->bindParam('1', $id, PDO::PARAM_STR);
		$query->execute();

		$_POST = $query->fetch(PDO::FETCH_ASSOC);
	}

	//Admin has uppdated some information about a user (username, password and usertype)
	if (isset($_POST["update_skickat"])) {

		$name = $_POST["username"];
		$password = sha1($_POST["password"]); 
		$usertype = $_POST["usertype"];
		$id = $_POST["user_id"];

		$name = htmlentities($name);

		$query = $conn->prepare("UPDATE users SET username = ?, password = ?, usertype = ? WHERE user_id = ?");
		$query->bindParam('1', $name, PDO::PARAM_STR);
		$query->bindParam('2', $password, PDO::PARAM_STR);
		$query->bindParam('3', $usertype, PDO::PARAM_STR);
		$query->bindParam('4', $id, PDO::PARAM_INT);
		$query->execute();


		$_GET["page"] = "admin";
	}
}

