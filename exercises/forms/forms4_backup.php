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

		if (count($_POST["food"]) == 1) {
			echo "Din favoriträtt är {$_POST['food'][0]}. ";
		}
		
		if (count($_POST["food"]) > 1){
			echo "Dina favoriträtter är ";

			//echo implode(", ", $_POST["food"]) . ". "; Farsans Förslag för att fixa formateringen

			foreach ($_POST["food"] as $value) {
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