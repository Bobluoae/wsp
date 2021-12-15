<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1> Uppgift 1 </h1>
<?php
function Tja(){
	echo "Tjaba Tjena Hallå!";
}

echo Tja();


  ?>

<h1> Uppgift 2 </h1>
<?php 

function Tja2(){


	$antal = 5;
	for ($i=0; $i < $antal; $i++) { 
		echo Tja() . " ";
	}
}

Tja2();
 ?>

<h1> Uppgift 3 </h1>
<?php 

function biggestNumber($num1, $num2, $num3){
	
	if ($num1 > $num2 && $num1 > $num3) {
		
		return $num1;
	}
	if ($num2 > $num3) {
		
		return $num2;
	}
	else {
		
		return $num3;
	}
}
	echo "Numbers are: 800, 500, 1000 <br>";
	echo biggestNumber(800,500,1000) . " is the biggest number";
 ?>

<h1> Uppgift 4 </h1>
<?php 


function Medel($arg) {

	$medelvärde = array_sum($arg) / count($arg);
	return $medelvärde;

}

echo "<br>";
echo "medelvärde: " . Medel(array(1,3,5,7,8,9,11,30,59)) . "<br>";

 ?>
<h1> Uppgift 5 </h1>
<?php
$arrayName = array(1,2,3,4,5,6,7,8,9,10);

function func1($arg) {
	$test = 0;
	foreach($arg as $tal) {
		if ($tal % 2 == 0) {
			$arg[$test] = 0;

		}
			$test++;
	}
		return $arg;
}
function printArray($arg) {
	foreach ($arg as $tal) {
		echo $tal . " ";
	}
	return $arg;
}

printArray(func1($arrayName));
 ?>
<h1> Uppgift 6 </h1>
<?php 
$arr = array();
for ($i=0; $i < 50; $i++) { 
	$arr[$i] = rand(0,100);
}


echo "Slumpad Array: ";
printArray($arr);

echo "<br>Sorterad Array: ";
printArray(sortArray($arr));

function sortArray($arg){
	sort($arg);
	return $arg;
}

function arrayMedian($arg){
	
	sort($arg);

	$median = $arg[count($arg) / 2]; 

	return $median;
}

echo "<br> <br>Median: ";

echo arrayMedian($arr);




 ?>

<h1> Uppgift 7 </h1>
<?php 

function medianMedel($arg){

	$medel = Medel($arg);
	$median = arrayMedian($arg);
	
	return array('Medel' => $medel, 'Median' => $median); //Farsans Förslag
	//return "Medel: " . $medel . " Median: " . $median; mitt sätt

}
$resultat = medianMedel($arr);
echo "Använder samma array som tidigare uppgift <br>" . "Medel: " . $resultat['Medel'] . " Median: " . $resultat['Median'];

 ?>

 <h1> Uppgift 8 <br> Slut på tid sorry :/ </h1>
</body>
</html>


