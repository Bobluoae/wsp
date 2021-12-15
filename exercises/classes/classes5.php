<!DOCTYPE html>
<html>
<head>
	<title>Klasser</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Uppgift 5 </h1>
	<h4>Redan gjort sen uppgift 3 (exakt samma kod)</h4>
<?php 

class Boll {
	public $name;
	private $color;
	private $radius;

	public function __construct($aName, $aColor, $aRadius){
		$this->name = $aName;
		$this->color = $aColor;
		$this->radius = $aRadius;
	}

	

	public function printProps(){
		echo "<br>Namn: " . $this->name . "<br>Färg: " . $this->color . " <br>Radie: " . $this->radius . " cm<br>"; 
	}
}

class BouncyBall extends Boll{
	
	private $bounciness = 7;

	public function getBounce(){
		return $this->bounciness;
	}
	
}
class CanonBall extends Boll{
	
	private $destructability = 10;

	public function getDestructionValue(){
		return $this->destructability;
	}

}

$bouncyBoll = new BouncyBall("Studsboll","Mixed", 2);
$bouncyBoll->printProps();
echo "Studsighet: " . $bouncyBoll->getBounce() . " <br>";

$canonBoll = new CanonBall("Kanonkula", "Svart", 12);
$canonBoll->printProps();
echo "Förstörelseförmåga: " . $canonBoll->getDestructionValue() . " ";

include "classes_menu.php";	

 ?>




</body>
</html>