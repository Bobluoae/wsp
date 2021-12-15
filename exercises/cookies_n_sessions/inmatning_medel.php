<?php 
	session_start();
	$Medel = 0;
	function Medel($arg) {

		$medelvärde = array_sum($arg) / count($arg);
		return $medelvärde;
	}

	if (!isset($_SESSION["lager"])) {
		$_SESSION["lager"] = array();
	}



	if (isset($_POST["skickat"])) {
		if (is_numeric($_POST["number"])) {
				$_SESSION["lager"][] = $_POST["number"];

				$Medel = Medel($_SESSION["lager"]);
			}	
	}


	if (isset($_POST["reset"])) {
		$_SESSION["lager"] = array();
	}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Medelvärde</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Uppgift 4 </h1>


	<form method="POST">

		<input type="hidden" name="skickat">
		<label>Mata in tal</label>
		<input type="text" name="number">
		<input type="submit" name="mata_in" value="Mata in">

	</form>
	<form method="POST">
		<input type="submit" name="reset" value="Reset">
	</form>		
<!-- Skapa en sida med en textruta och en knapp. I textrutan ska man skriva 1 tal i taget. Varje gång du trycker på knappen ska medelvärdet av alla inmatade tal samt alla inmatade tal skrivas ut. -->
	<?php 

	 foreach ($_SESSION["lager"] as $value) {
			echo $value . " | ";
	}

	echo "<br>Medelvärde: " . $Medel . "<br><br>";


	 ?>

	<br>
	<a href="../cookies.php"> Uppgift 1 </a> <br>
	<a href="session1.php"> Uppgift 2 </a> <br>
	<a href="inlogg.php"> Uppgift 3 </a> <br>
	<a href="inmatning_medel.php"> Uppgift 4 (Ladda om sidan) </a> <br>
</body>
</html>