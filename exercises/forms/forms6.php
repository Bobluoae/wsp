<!DOCTYPE html>
<html>
<head>
	<title>Forms6</title>
</head>
<body>
	<h1> Uppgift 8 </h1>
	<h2> Beräkna Medelvärde </h2>
	<form method="POST">
		<input type="text" name="firstNum" placeholder="Nummer 1">
		<input type="text" name="secondNum" placeholder="Nummer 2">
		<input type="text" name="thirdNum" placeholder="Nummer 3">
		<input type="submit" name="Beräkna">
	</form>
	<?php  

	if (isset($_POST["firstNum"]) && isset($_POST["secondNum"]) && isset($_POST["thirdNum"])){

	$numNum = array($_POST["firstNum"], $_POST["secondNum"], $_POST["thirdNum"]);
	
	?>
	<h2> Du skrev in <?php echo $numNum[0] . " " . $numNum[1] . " " . $numNum[2]  ?></h2> 
	<?php 

	$medelvärde = Medel($numNum); 
	echo "Medelvärdet är: " . $medelvärde;

	
	}
	function Medel($arg) {

		$medelvärde = array_sum($arg) / count($arg);
		return $medelvärde;
	 
	}
	//Eftersom all kod alltid körs när man öppnar sidan, måste man kolla om formulär datat har blivit nått.
	?>
	<br>
	<a href="../forms.php"> TILLBAKA TILL FORMS! </a>
</body>
</html>