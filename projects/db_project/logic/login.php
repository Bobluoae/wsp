<?php 
if(isset($_POST["inlogg_skickat"])){

	$sql = "SELECT * FROM users WHERE password = '" . sha1($_POST['password']) .
		 "' AND username = '". $_POST["username"] ."'";

	$query = $conn->query($sql);

	if ($query->num_rows == 1) {
		// output data of each row
  		while($results = $query->fetch_assoc()) {
    		$_SESSION["username"] = $results["username"];
    	} 

		$_SESSION["isLoggedIn"] = true;
	} else {
		$error = true;
	}
}

if (isset($_POST["utlogg_skickat"])) {

	unset($_SESSION["isLoggedIn"]);
}