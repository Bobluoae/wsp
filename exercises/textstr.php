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

	if(!preg_match("/([A-Z])\w+/", $_POST["namn"])) {
		echo "Du behöver en stor bokstav i ditt namn. <br>";
		$fel = true;
	}
	if(!preg_match("/([A-Z])\w+/", $_POST["efternamn"])) {
		echo "Du behöver en stor bokstav i ditt efternamn. <br>";
		$fel = true;
	}
	if(!preg_match("/([@])/", $_POST["email"])) {
		echo "Du behöver ett @ i din email. <br>";
		$fel = true;
	}	

	$namn = $_POST["namn"];
	$efternamn = $_POST["efternamn"];
	$email = $_POST["email"];

} else {

	$namn = "";
	$efternamn = "";
	$email = "";
}
if ($fel == true) {
	echo "Rätta formuläret.";
} else if ($fel == false && isset($_POST["skickat"])){
	echo "Allt är chill.";
}

 ?>


	<h2> Uppgift 1 </h2>
	<form method="POST">
		<input type="hidden" name="skickat">
		<input type="text" name="namn" placeholder="Namn" value="<?=$namn?>"> <!-- Istället för < ? php echo $namn ?> -->
		<input type="text" name="efternamn" placeholder="Efternamn" value="<?=$efternamn?>">
		<input type="text" name="email" placeholder="Email" value="<?=$email?>">
		<input type="submit" name="Skicka">
	</form>


<br>
<a href="textstr.php"> Uppgift 1 (Ladda om sidan) </a> <br>
<a href="textstr/textstr2.php"> Uppgift 2 </a> <br>
<a href="textstr/textstr3.php"> Uppgift 3 </a> <br>
<a href="textstr/textstr4.php"> Uppgift 4 </a> <br>
<a href="textstr/textstr5.php"> Uppgift 5 </a> <br>
<a href="textstr/textstr6.php"> Uppgift 6 </a> <br>
</body>
</html>