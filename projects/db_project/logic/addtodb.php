<?php
if (isset($_POST["addform_skickat"])) {

		$name = $_POST['name'];
		$surname = $_POST["surname"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];

		$query = $conn->prepare("INSERT INTO friends SET name = ?, surname = ?, phone = ?, email = ?");
		$query->bindParam('1', $name, PDO::PARAM_STR);
		$query->bindParam('2', $surname, PDO::PARAM_STR);
		$query->bindParam('3', $phone, PDO::PARAM_STR);
		$query->bindParam('4', $email, PDO::PARAM_STR);
		$query->execute();


	$_POST["addform_skickat"] = false;
	
}