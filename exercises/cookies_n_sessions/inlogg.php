<?php 
session_start();
// 86400 = 1 day
	$error = false;

if(isset($_POST["inlogg_skickat"])){

	if ($_POST["username"] == "Agent46" && $_POST["password"] == "ThisIsNotAPassword") {
		
		$_SESSION["isLoggedIn"] = true;
	} else {
		$error = true;
	}
}
if (isset($_POST["utlogg_skickat"])) {

	unset($_SESSION["isLoggedIn"]);
	//Eller;
	//session_destroy();
	//header("location: http://localhost:8080/exercises/cookies_n_sessions/inlogg.php");
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Inlogg</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Uppgift 3 Inlogg </h1>

<p>Användarnamn: Agent46<br>Lösenord: ThisIsNotAPassword<br>Tips: Copy Paste</p>

<br>

<?php  
if ($error == true) {
	echo '<strong style = "color: red">Fel inloggning!</strong>';
}
?>

<?php if (isset($_SESSION["isLoggedIn"])) {
?>

<a href="secret.php">This is not a link</a><br><br>

<form method="POST">
	<input type="hidden" name="utlogg_skickat">
	<input type="submit" name="logga_ut" value="Logga ut">
</form>

<?php
} ?>



<?php if (!isset($_SESSION["isLoggedIn"])) {
?>

<form method="POST">
	<input type="hidden" name="inlogg_skickat">
	<label>Användarnamn</label><br>
	<input type="text" name="username"><br>
	<label>Lösenord</label><br>
	<input type="password" name="password"><br>
	<input type="submit" name="logga_in" value="Logga in"><br>
</form>

<?php
} ?>

<br>
<a href="../cookies.php"> Uppgift 1 </a> <br>
<a href="session1.php"> Uppgift 2 </a> <br>
<a href="inlogg.php"> Uppgift 3 (Ladda om sidan) </a> <br>
<a href="inmatning_medel.php"> Uppgift 4 </a> <br>
</body>
</html>