<?php 
if(isset($_POST["inlogg_skickat"])){

	// $sql = "SELECT * FROM users WHERE password = '" . sha1($_POST['password']) .
	// 	 "' AND username = '". $_POST["username"] ."'";

	// $query = $conn->query($sql);

	$name = $_POST["username"];
	$pass = sha1($_POST['password']);
	
	$query = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
	$query->bind_param('ss', $name, $pass);

	
	$query->execute();
	$result = $query->get_result();

	if ($result->num_rows == 1) {
		// output data of each row
  		while($results = $result->fetch_assoc()) {
    		$_SESSION["username"] = $results["username"];
    		$_SESSION["usertype"] = $results["usertype"];
    	} 

		$_SESSION["isLoggedIn"] = true;

		if ($_SESSION["usertype"] == "admin") {
			echo $_SESSION["usertype"];
		}
	} else {
		$error = true;
	}
}

if (isset($_POST["utlogg_skickat"])) {

	unset($_SESSION["isLoggedIn"]);
	unset($_SESSION["usertype"]);
}