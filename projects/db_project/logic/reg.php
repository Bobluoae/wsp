<?php 
if(isset($_POST["reg_skickat"])){

	if ($_POST["username"] == "" || $_POST["password"] == "" || $_POST['confirm_password'] == "") {
		$error = true;
		$message = "You need to write in all forms";
	}

	$name = $_POST["username"];
	
	$query = $conn->prepare("SELECT * FROM users WHERE username = ?");
	$query->bind_param('s', $name);

	
	$query->execute();
	$result = $query->get_result();


	//hittade en rad i db med användarnamnet
	if (mysqli_num_rows($result)) {
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
		$query->bind_param('sss', $name, $password, $usertype);


		$query->execute();
		$result = $query->get_result();



		if ($query) {
			$_GET["page"] = "welcome";
			
			$query = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
			$query->bind_param('ss', $name, $password);

			
			$query->execute();
			$result = $query->get_result();

			if ($result->num_rows == 1) {
				// output data of each row
		  		while($results = $result->fetch_assoc()) {
		    		$_SESSION["username"] = $results["username"];
		    		$_SESSION["usertype"] = $results["username"];
		    	} 

				$_SESSION["isLoggedIn"] = true;
				$_SESSION["usertype"] = "user";
			} else {
				$error = true;
				$message = "wtf";
			}
		}
	}
}