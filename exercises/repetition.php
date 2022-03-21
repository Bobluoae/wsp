<!DOCTYPE html>
<html>
<head>
	<title>Repetition</title>
</head>
<body>
		<h1>Uppgift 1</h1>
<?php 
include "repetition/rep.php";
session_start();


$a = [1,2,3,4,5,6,7,8,9,10];

var_dump($a);

$a = array_map(function ($val){
	return $val * 2;
}, $a);
 		
 echo "<br> Efter dubbling: <br>";
 var_dump($a);
 echo "<br> Medelvärde av dubbling: " . Medel($a);

?>
<h1>Uppgift 2</h1>
<?php 

echo "Av talen 500, 300 och 200 är det minsta talet: ".findmin(500,300,200);

function findmin($arg1, $arg2, $arg3) {
	
	$minimum = min($arg1, $arg2, $arg3);

	return $minimum;
}?>

<h1>Uppgift 3</h1>
<?php 

 ?>


<form action="repetition.php" method="POST">
		<input type="number" name="num" placeholder="Hur många vill du slumpa?">
		<input type="submit" name="Beräkna">
</form>

<?php 
$arr = [1,2,3,4,5,6,7,8,9,10];

if (!isset($_POST["num"])) {
	$_POST["num"] = 2;
}
if ($_POST["num"] <= 1 || $_POST["num"] > 10) {
	$_POST["num"] = 2;
}

$randarr = [];
$randarr = array_rand($arr, $_POST["num"]);

foreach ($randarr as $value) {
	echo $value . "<br>";
}
echo "Detta är medelvärdet av random number från 1 - 10 beroende på hur många du satte in: " . Medel($randarr);

 ?>
<h1>Uppgift 4</h1>
	<form action="" method="POST">
		<input type="text" name="namn" placeholder="Förnamn">
		<br>
		<h4> Vilka är dina favoriträtter? (Shift eller CTRL för att välja fler) </h4>
		<select name="food[]" multiple="multiple">
			<option value="pannkaka">Pannkaka</option>
			<option value="pizza">Pizza</option>
			<option value="blodpudding">Blodpudding</option>
		</select>
		<br>
		<input type="submit" name="Skicka">
	</form>


<?php 
	
	if (!isset($_POST["namn"])) {
		$_POST["namn"] = "namn";
	}
	if ($_POST["namn"]=="") {
		$_POST["namn"] = "namn";
	}
	echo "Hej, {$_POST['namn']}, du gillar ";

	if (isset($_POST["food"])) {
		printFavorätt($_POST["food"]);
	}
 ?>
<h1>Uppgift 5</h1>

yttligare en textruta som dyker upp första gången man kommer in på sidan.
I textrutan ska man skriva sitt namn. Utöka också utskrifterna så att de börjar med “Hej NAMN!”.

Skriv en sida som innehåller ett formulär med 1 textruta och en “testa” knapp.
Slumpa ut ett tal som sparas i en variabel.
Du ska nu gissa talet genom att skriva in det i textrutan och klicka på knappen.
Programmet ska då svara om du gissade rätt och hur många försök det tog.
Annars skriver den ut “Fel, du har gissat ANTAL gånger”.
<br><br>

<?php include "repetition/rep2.php" ?>
<form method="POST">
	<label>Gissa på ett tal mellan 1 - 10 <br></label>
	<input type="number" name="n" placeholder="Gissa här" autocomplete="off">
	<input type="submit" name="Testa">
</form>
<?php 
$ar = [1,2,3,4,5,6,7,8,9,10];

$rn = array_rand($ar, 1);


if (!isset($_SESSION["count"])) {
	$_SESSION["count"] = 0;
}
if (!isset($_POST["n"])) {
	$_POST["n"] = 0;
}
if ($rn == $_POST["n"]) {
	echo "Du har gissat rätt! Svaret var: " . $rn . "! Du har gissat: ". $_SESSION["count"] . "gånger.";
	$_SESSION["count"] = 0;

} else if ($rn !== $_POST["n"]) {
	$_SESSION["count"] = $_SESSION["count"] + 1;
	echo "Försök igen! Du har gissat " . $_SESSION["count"];
}


 ?>


</body>
</html>