<!DOCTYPE html>
<html>
<head>
	<title>Klasser</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Uppgift 3 </h1>

<?php 

class boll {

	private $color;
	private $radius;

	public function __construct($aColor, $aRadius){
		$this->color = $aColor;
		$this->radius = $aRadius;
	}

	public function setRadius($aRadius){
		$this->radius = $aRadius;
	}
	public function setColor($aColor){
		$this->color = $aColor;
	}

	public function printProps(){
		echo "Färg: " . $this->color . " <br>Radie: " . $this->radius . " cm<br>"; 
	}
}

$minBoll = new boll("Blå", 3.6); $minBoll->printProps();
echo "<br> Sedan blir bollen: <br><br>";
//För att ändra radien måste man använda en setter funktion/metod.
$minBoll->setRadius(4);
$minBoll->setColor("Röd");

$minBoll->printProps();

include "classes_menu.php";	

 ?>




</body>
</html>