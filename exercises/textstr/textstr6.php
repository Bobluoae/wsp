<!DOCTYPE html>
<html>
<head>
	<title>TextSträngar</title>
	<meta charset="utf-8">
</head>
<body>

<?php 

$letter = "";
$translated = "";
$konsonanter = "bcdfghjklmnpqrstvwxz"; 

//$fel = false;

if(isset($_POST["skickat"])){

	if(strlen($_POST["story"]) == 0) {
		echo "Du måste skriva något!. <br>";
		//$fel = true;
	}
	
	for ($i=0; $i < strlen($_POST["story"]); $i++) {  // Loopa genom varje bokstav i storyn
	
		$letter = substr($_POST["story"], $i, 1);     // Lägg nuvarande bokstav i $letter

		for ($j=0; $j < strlen($konsonanter); $j++) { // Loopa genom varje konsonant
			// Jämför nuvarande bokstav med nuvarande konsonant  
			if (strtoupper($letter) == strtoupper(substr($konsonanter, $j, 1))) { 
				
				$letter = $letter . "o" . $letter;    // Översätt
			}
		}

		$translated = $translated . $letter; // Lägg in översättningen


	}
	
	$story = $_POST["story"];

	echo "<h4> Original </h4>" . $story;
	echo "<h4> Översatt </h4>" . $translated;

} else {

	$story = "";

}
// if ($fel == true) {
// 	echo "";
// } else if ($fel == false && isset($_POST["skickat"])){
// 	echo "Allt är chill.";
// }

 ?>


	<h2> Uppgift 6 </h2>
	<form method="POST">
		<input type="hidden" name="skickat">
		<!-- <input type="text" name="story" placeholder="Översätt här" value="<?=$story?>">  Istället för < ? php echo $namn ?> -->

		<textarea name="story" placeholder="Skriv här" rows="12" cols="100"><?=$story?></textarea> <br>

		<input type="submit" name="Skicka">
	</form>

	
<br>



<a href="../textstr.php"> Uppgift 1 </a> <br>
<a href="textstr2.php"> Uppgift 2 </a> <br>
<a href="textstr3.php"> Uppgift 3 </a> <br>
<a href="textstr4.php"> Uppgift 4 </a> <br>
<a href="textstr5.php"> Uppgift 5 </a> <br>
<a href="textstr6.php"> Uppgift 6 (Ladda om sidan) </a> <br>


</body>
</html>