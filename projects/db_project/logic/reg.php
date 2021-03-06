<?php 
if(isset($_POST["reg_skickat"])){

	if ($_POST["username"] == "" || $_POST["password"] == "" || $_POST['confirm_password'] == "") {
		$error = true;
		$message = "You need to write in all forms";
	}

	$name = $_POST["username"];
	
	$query = $conn->prepare("SELECT * FROM users WHERE username = ?");
	$query->bindParam('1', $name, PDO::PARAM_STR);
	$query->execute();

	//hittade en rad i db med användarnamnet
	if ($query->rowCount() == 1) {
		$error = true;
		$message = "This username is already taken";
	}

	if (strlen($_POST['password']) <= 4) {
		$error = true;
		$message = "You need at least 5 characters in your password";
	}

	if (strlen($_POST['username']) <= 2) {
		$error = true;
		$message = "You need at least 3 characters in your username";
	}

	if ($_POST['password'] !== $_POST['confirm_password']) {
		$error = true;
		$message = "The confirmation password does not match";
	}

	if ($error == false) {

		$password = sha1($_POST['password']);
		$usertype = "user";

		$query = $conn->prepare("INSERT INTO users SET username = ?, password = ?, usertype = ?");
		$query->bindParam('1', $name, PDO::PARAM_STR);
		$query->bindParam('2', $password, PDO::PARAM_STR);
		$query->bindParam('3', $usertype, PDO::PARAM_STR);
		$query->execute();

		if ($query) {
			$_GET["page"] = "welcome";
			
			$_POST["inlogg_skickat"] = true;

		}else {
			$error = true;
			$message = "wtf";
		}
	}
}