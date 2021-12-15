<!DOCTYPE html>
<html>
<head>
	<title>Klasser</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Uppgift 7 </h1>
	
<?php 

class Boll {
	public $name;
	protected $color;
	protected $radius;
	protected static $antalBollar = 0;

	public function __construct($aName, $aColor, $aRadius){
		$this->setName($aName);
		$this->setColor($aColor);
		$this->setRadius($aRadius);
		self::$antalBollar++;
	}

	private function setRadius($aRadius){
		$this->radius = $aRadius;
	}
	private function setColor($aColor){
		$this->color = $aColor;
	}
	private function setName($aName){
		$this->name = $aName;
	}
	public static function getAntalBollar(){
		return self::$antalBollar;
	}
}

class BouncyBall extends Boll{
	
	private $bounciness = 7;

	public function getBounce(){
		return $this->bounciness;
	}
	public function printProps(){
		echo "<br>Namn: " . $this->name . "<br>Färg: " . $this->color . " <br>Radie: " . $this->radius . " cm<br>"; 
		echo "Studsighet: " . $this->getBounce() . " <br>";
	}
	
}
class CanonBall extends Boll{
	
	private $destructability = 10;

	public function getDestructionValue(){
		return $this->destructability;
	}
	public function printProps(){
		echo "<br>Namn: " . $this->name . "<br>Färg: " . $this->color . " <br>Radie: " . $this->radius . " cm<br>";
		echo "Förstörelseförmåga: " . $this->getDestructionValue() . " <br>"; 
	}

}

$balls = array(
	new BouncyBall("Studsboll","Mixed", 2),
	new CanonBall("Kanonkula", "Svart", 12)
);

foreach ($balls as $ball) {
	$ball->printProps();
}
echo "<br>Antal bollar: " . Boll::getAntalBollar();
include "classes_menu.php";	

 ?>




</body>
</html>