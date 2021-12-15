<!DOCTYPE html>
<html>
<head>
	<title>TextSträngar</title>
	<meta charset="utf-8">
</head>
<body>

<?php 


// \b[\w.!#$%&’*+\/=?^`{|}~-]+@[\w-]+(?:\.[\w-]+)*\b


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
	
	if(strlen($_POST["email"]) < 6) {
		echo "Du behöver minst 6 tecken i din email. <br>";
		$fel = true;
	}

	if(!preg_match("/^\w+.*\@\w+.*\w{2,}$/", $_POST["email"])){ // preg_match gemför regex med sträng (email)
		echo "Du måste använda en riktig email. <br>";
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


	<h2> Uppgift 4 </h2>
	<form method="POST">
		<input type="hidden" name="skickat">
		<input type="text" name="namn" placeholder="Namn" value="<?=$namn?>"> <!-- Istället för < ? php echo $namn ?> -->
		<input type="text" name="efternamn" placeholder="Efternamn" value="<?=$efternamn?>">
		<input type="text" name="email" placeholder="Email" value="<?=$email?>">
		<input type="submit" name="Skicka">
	</form>


<br>
<a href="../textstr.php"> Uppgift 1 </a> <br>
<a href="textstr2.php"> Uppgift 2 </a> <br>
<a href="textstr3.php"> Uppgift 3 </a> <br>
<a href="textstr4.php"> Uppgift 4 (Ladda om sidan) </a> <br>
<a href="textstr5.php"> Uppgift 5 </a> <br>
<a href="textstr6.php"> Uppgift 6 </a> <br>

</body>
</html>