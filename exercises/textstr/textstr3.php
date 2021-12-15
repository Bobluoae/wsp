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

	if(!is_numeric($_POST["tal1"]) || !is_numeric($_POST["tal2"])) {
		echo "Du måste använda siffror <br>";
		$fel = true;
	}
	

	$tal1 = $_POST["tal1"];
	$tal2 = $_POST["tal2"];


} else {

	$tal1 = "";
	$tal2 = "";

}
if ($fel == true) {
	echo "Rätta formuläret.";
} else if ($fel == false && isset($_POST["skickat"])){
	echo "Allt är chill. <br>";
	$kvot = $tal1 / $tal2; 

	echo $tal1 . " / " . $tal2 . " = " . number_format($kvot, 2);

}

 ?>


	<h2> Uppgift 3 </h2>
	<form method="POST">
		<input type="hidden" name="skickat">
		<input type="text" name="tal1" placeholder="Första talet" value="<?=$tal1?>"> <!-- Istället för < ? php echo $namn ?> -->
		<input type="text" name="tal2" placeholder="Andra talet" value="<?=$tal2?>">
		<input type="submit" name="Skicka">
	</form>


<br>


<a href="../textstr.php"> Uppgift 1 </a> <br>
<a href="textstr2.php"> Uppgift 2 </a> <br>
<a href="textstr3.php"> Uppgift 3 (ladda om sidan) </a> <br>
<a href="textstr4.php"> Uppgift 4 </a> <br>
<a href="textstr5.php"> Uppgift 5 </a> <br>
<a href="textstr6.php"> Uppgift 6 </a> <br>

</body>
</html>