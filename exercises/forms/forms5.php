<!DOCTYPE html>
<html>
<head>
	<title>Forms2</title>
</head>
<body>
	<?php  
	$numNum = array($_POST["firstNum"], $_POST["secondNum"], $_POST["thirdNum"]);
	
	?>

	<h1> Uppgift 7 </h1>
	<h2> Du skrev in <?php echo $numNum[0] . " " . $numNum[1] . " " . $numNum[2]  ?></h2> 
	<?php 

	$medelvärde = Medel($numNum); 
	echo "Medelvärdet är: " . $medelvärde;

	function Medel($arg) {

		$medelvärde = array_sum($arg) / count($arg);
		return $medelvärde;
	 
	}

	?>
	<br>
	<br>
	<br>
	<a href="../forms.php"> TILLBAKA TILL FORMS! </a>
</body>
</html>