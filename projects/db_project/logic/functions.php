<?php 
//Define get
if (!isset($_GET["page"])) {
	$_GET["page"] = "";
}
//Delete id of row from DB when clicked
if (isset($_GET["delete"])) {
	$sql = "DELETE FROM friends WHERE id = " . intval($_GET["delete"]);
	$query = mysqli_query($conn, $sql);
	$_GET["page"] = "tableadmin";
}
//Read clicked id and insert into form via post
if (isset($_GET["update"])) {
	$sql = "SELECT * FROM friends WHERE id = " . intval($_GET["update"]);

	$result = mysqli_query($conn, $sql);
	$_POST=mysqli_fetch_array($result, MYSQLI_ASSOC);
}
//update 'friends' when clicked
if (isset($_POST["update_skickat"])) {
	$sql =  "UPDATE friends SET 
			name = '".$_POST['name']."',
			surname = '".$_POST['surname']."',
			phone = '".$_POST['phone']."',
			email = '".$_POST['email']."' WHERE id = ". $_POST['id'];
	$query = mysqli_query($conn, $sql);
	$_GET["page"] = "tableadmin";
}