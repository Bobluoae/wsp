<?php
if (isset($_POST["addform_skickat"])) {

	$sql = "INSERT INTO 
		friends 
			SET
		 name = '" . $_POST['name'] . "',
		 surname = '". $_POST["surname"] ."',
		 phone = '". $_POST["phone"] ."',
		 email = '". $_POST["email"] ."'";

	$query = $conn->query($sql);


}