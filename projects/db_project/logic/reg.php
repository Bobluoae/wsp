<?php 
if(isset($_POST["reg_skickat"])){

	if ($_POST["username"] == "" || $_POST["password"] == "" || $_POST['confirm_password'] == "") {
		$error = true;
		$message = "You need to write in all forms";
	}

	// SQL som tittar om användarnamnet redan finns
	$sql = "SELECT username FROM users WHERE username = '". $_POST["username"] ."'";
	$query = $conn->query($sql);


	//hittade en rad i db med användarnamnet
	if (mysqli_num_rows($query)) {
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
		$sql = "INSERT INTO users SET password = '" . sha1($_POST['password']) .
			 "', username = '". $_POST["username"] .
			 "', usertype = '". "user" . "'";

		$query = $conn->query($sql);


		if ($query) {
			$_GET["page"] = "welcome";

			$sql = "SELECT * FROM users WHERE password = '" . sha1($_POST['password']) .
				 "' AND username = '". $_POST["username"] ."'";

			$query = $conn->query($sql);

			if ($query->num_rows == 1) {
				// output data of each row
		  		while($results = $query->fetch_assoc()) {
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