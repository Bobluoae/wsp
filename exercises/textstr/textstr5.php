<!DOCTYPE html>
<html>
<head>
	<title>TextSträngar</title>
	<meta charset="utf-8">
</head>
<body>

<?php 




$fel = false;

if(isset($_POST["skickat"])){

	if(strpos($_POST["username"], "php") === false) {
		echo "Du måste ha php i ditt användarnamn. <br>";
		$fel = true;
	}
	if(strlen($_POST["password"]) < 6) {
		echo "Du behöver minst 6 tecken i ditt lösenord. <br>";
		$fel = true;
	}

	if(!preg_match("/[0-9]/", $_POST["password"])){
		echo "Du måste ha minst en siffra i ditt lösenord. <br>";
		$fel = true;
	}
	if(!preg_match("/[A-Z]/", $_POST["password"])){
		echo "Du måste ha minst en stor bokstav i ditt lösenord. <br>";
		$fel = true;
	}

	
	$username = $_POST["username"];
	$password = $_POST["password"];


} else {

	$username = "";
	$password = "";

}
if ($fel == true) {
	echo "Rätta formuläret.";
} else if ($fel == false && isset($_POST["skickat"])){
	echo "Allt är chill.";
}

 ?>


	<h2> Uppgift 5 </h2>
	<form method="POST">
		<input type="hidden" name="skickat">
		<input type="text" name="username" placeholder="Användarnamn" value="<?=$username?>"> <!-- Istället för < ? php echo $namn ?> -->
		<input type="text" name="password" placeholder="Lösenord" value="<?=$password?>">
		<input type="submit" name="Skicka">
	</form>


<br>



<a href="../textstr.php"> Uppgift 1 </a> <br>
<a href="textstr2.php"> Uppgift 2 </a> <br>
<a href="textstr3.php"> Uppgift 3 </a> <br>
<a href="textstr4.php"> Uppgift 4 </a> <br>
<a href="textstr5.php"> Uppgift 5 (Ladda om sidan) </a> <br>
<a href="textstr6.php"> Uppgift 6 </a> <br>
</body>
</html>