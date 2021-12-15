<!DOCTYPE html>
<html>
<head>
	<title>Klasser</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Uppgift 2 </h1>

<?php 

class boll {

	public $color;
	public $radius;

	public function __construct($aColor, $aRadius){
		$this->color = $aColor;
		$this->radius = $aRadius;
	}


	public function printProps(){
		echo "Färg: " . $this->color . " <br>Radie: " . $this->radius . " cm<br>"; 
	}
}

$minBoll = new boll("Blå", 3.6);
// $minBoll->color = "Blå";
// $minBoll->radius = 3.6;

$minBoll->printProps();

include "classes_menu.php";	

 ?>




</body>
</html>