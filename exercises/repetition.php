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

<?php
if (!isset($_SESSION['name']) && isset($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
} elseif (!isset($_SESSION['randomNumber'])) {
    $_SESSION['messages'] = [];
    $_SESSION['randomNumber'] = rand(1, 10);
} else {
    if (isset($_POST['guess'])) {
        if ($_SESSION['randomNumber'] == $_POST['guess']) {
            $_SESSION['messages'][] = "du gissade rätt på ".count($_SESSION['messages'])." försök. Svaret var: " . $_SESSION['randomNumber'];
            session_destroy();
        } else {
            $_SESSION['messages'][] = $_POST['guess']." är fel.";
        }
    }
}

?>

<?php if (!isset($_SESSION['name'])) : ?>
    <form method="POST">
        <label>Ange ditt namn<br></label>
        <input id="name" type="name" name="name" placeholder="Namn" autocomplete="off">
        <input type="submit">
    </form>
<?php else : ?>
    <form method="POST">
        <label>Hej <?=$_SESSION['name']?>, Gissa på ett tal mellan 1 - 10 <br></label>
        <input id="number" type="number" name="guess" placeholder="Gissa här" autocomplete="off">
        <input type="submit">
    </form>
<?php endif ?>
<script>
    document.getElementById('number').focus();
</script>
<?php
foreach ($_SESSION['messages'] as $message) {
    echo $message . "<br>";
}


 ?>

<h1>Uppgift 6</h1>

<?php 

class Person {

	public $name = "";
	private $adress = "";
	private $email = "";


	public function __construct ($namn="namn", $address="address", $epost="epost"){
		$this->name = $namn;
		$this->adress = $address;
		$this->email = $epost;
	}

	public function getPerson(){
		return "namn: ".$this->name . "<br> address: ". $this->adress ."<br> epost:  ". $this->email;
	}
	public function setPerson($namn, $address, $epost){
		$this->name = $namn;
		$this->adress = $address;
		$this->email = $epost;
	}
}

$person = new Person("Erik", "Kungsgatan 35", "kallgrenerik@gmail.com");

echo $person->getPerson();

$person->setPerson("Olle", "Fladdergatan 53", "olleegay@hotmail.com");

echo "<br>===================================<br>" . $person->getPerson();

 ?>

</body>
</html>