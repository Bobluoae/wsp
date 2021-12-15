<!DOCTYPE html>
<html lang="sv">
<head>
	<title>Grunder</title>
	<meta charset="utf-8">
</head>
<body>

	<h3>Uppgift 1</h3>
	<?php 
	$f = 50;
	echo $f, " Fahrenheit <br>";
	$c = 5/9*($f-32);
	echo $c, " Celsius <br>";
	?>

	<h3>Uppgift 2</h3>
	<?php
	$text1 = "Kalle ";
	$enamn = "Anka ";
	$tal = 16;
	$road = "Ankvägen ";
	echo "<p>". $text1 . $enamn . $road . $tal . "</p>"
	?>

	<h3>Uppgift 3</h3>

	<?php
	$a = 0;
	echo "<p>For Loop</p>";
    for ($i = 0; $i <= 100;$i++)
    {
        $a = $a+$i;
        echo $a . " ";
    }
    echo "<p>While Loop</p>";
    $sum = 0;
    $j = 0;
    while ($j <= 100)
    {
    	$sum = $sum + $j;
    	echo $sum . " ";
         $j++;
    }

	?>

	<h3>Uppgift 4</h3> <!--========================================//-->

	<?php
$Celsius = array();
$Fahrenheit = array();

for ($c=-20; $c <= 40; $c+=10) { 
	
	echo $c, " = ", $c*1.8+32, "  |  ";
	
	
	$Celsius[] = $c; // eller: array_push($Celsius, $c);
	$Fahrenheit[] = $c*1.8+32;
}


echo "<br>";


for ($i=0; $i < count($Celsius); $i++) { 
	echo $Celsius[$i], " = ";
	echo $Fahrenheit[$i], "   |  ";
}

echo "<br>";

print_r($Celsius); echo "<br>";
print_r($Fahrenheit);

echo "<br>";

var_dump($Celsius); echo "<br>";
var_dump($Fahrenheit);
	?>


	<h3>Uppgift 5</h3>

	<?php

	//Detta: (1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	//Ska bli: (1, 2, 4, 8, 16, 32, 64, 128, 256, 512)
	$acc = 1;
	for ($i = 0; $i < 10; $i++){
		$boxes[$i] = $acc;
		$acc = $acc * 2;
	}
	foreach($boxes as $key => $value) {
    echo $key . " => ". $value."<br>";
	}
	echo "medelvärde: " . (array_sum($boxes) / count($boxes)) . "\n";
	?> 


	<h3>Uppgift 6</h3> 
	<?php

	
	function IsPrime($n){ //Funktion som hittar primtal

		if ($n == 1) {  // Om talet n inte är ett primtal, return false
			return false;
		}
		if ($n == 2) { // Om talet n är ett primtal, return true
			return true;
		}
		$x = sqrt($n); // Roten ur talet n lägg det i x Detta är optimering av koden så att man inte behöver köra loopen en milion gånger om n = 1'000'000
		$x = floor($x); // Runda ned talet x till ett heltal
		for ($i = 2; $i <= $x; ++$i) { // Loopar till talet x 
			if ($n % $i == 0) {// kollar om modulus är 0, i så fall break; Du har då första av 2 steg att hitta ett primtal.
				break;
			}
		}
		if ($x == $i - 1) { // Om x = position - 1 return true;
			return true;
		}
		return false; // Else return false;

	}
	$antal = 0; // Håll koll hur många primtal det är
	for ($i=2; $i <= 100; $i++) { // Loopar utskrivning av primtal.
		if (IsPrime($i)) {
			echo $i . "  ";
			$antal++;
		}
	}
	echo "det är " . $antal ." primtal upp till 100."

	?>

	<h3>Uppgift 7</h3>
	<?php 

	$i = 2; $antal = 0;
	do {
		if (IsPrime($i)) {
			echo $i . "  ";
			$antal++;

		}
		$i++;
	} while ($antal <= 100);


	 ?>

</body>
</html>