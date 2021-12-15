<!DOCTYPE html>
<html>
<head>
	<title>Forms4</title>
</head>
<body>
	<h1> Uppgift 3 och 4 och 6 </h1>
	<?php 

	echo "Hej, {$_POST['firstName']} {$_POST['lastName']} i klass {$_POST['className']}! ";

	if (isset($_POST["food"])) {
		printFavorätt($_POST["food"]);
	}

	function printFavorätt($matArray){

		if (count($matArray) == 1) {
			echo "Din favoriträtt är {$matArray[0]}. ";
		}
		
		if (count($matArray) > 1){
			echo "Dina favoriträtter är ";

			//echo implode(", ", $matArray) . ". "; Farsans Förslag för att fixa formateringen

			foreach ($matArray as $value) {
				echo "{$value}, ";
			}
		}
		
	}

	if (isset($_POST["favoritkurs"])){
		echo "Din favoritkurs är {$_POST['favoritkurs']}!";
	}	

	 ?>
	<br>
	<br>
	<a href="../forms.php"> TILLBAKA TILL FORMS! </a>

</body>
</html>