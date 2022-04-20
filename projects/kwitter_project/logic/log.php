<?php 
if(isset($_POST["inlogg_skickat"])){

	$name = $_POST["username"];
	$pass = sha1($_POST['password']);
	
	$query = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
	// $query->bind_param('ss', $name, $pass);
	$query->bindParam('1', $name, PDO::PARAM_STR);
	$query->bindParam('2', $pass, PDO::PARAM_STR);
	$query->execute();

	if ($query->rowCount() == 1) {
		// output data of each row
  		$results = $query->fetch(PDO::FETCH_ASSOC);
		$_SESSION["username"] = $results["username"];
		$_SESSION["usertype"] = $results["usertype"];

		$_SESSION["isLoggedIn"] = true;
		$_GET["page"] = "flow";
	} else {
		$error = true;
	}
}

if (isset($_POST["utlogg_skickat"])) {

	unset($_SESSION["isLoggedIn"]);
	unset($_SESSION["usertype"]);
}