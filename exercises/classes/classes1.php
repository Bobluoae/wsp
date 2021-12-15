<!DOCTYPE html>
<html>
<head>
	<title>Klasser</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Uppgift 1 </h1>

<?php 

class boll {

	public $color;
	public $radius;

	public function printProps(){
		echo "Färg: " . $this->color . " <br>Radie: " . $this->radius . " cm<br>"; 
	}
}

$minBoll = new boll;
$minBoll->color = "Blå";
$minBoll->radius = 3.6;

$minBoll->printProps();

include "classes_menu.php";

 ?>



</body>
</html>