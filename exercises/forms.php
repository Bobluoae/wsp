<!DOCTYPE html>
<html>
<head>
	<title>Forms</title>
</head>
<body>

	<h2> Uppgift 1 FORMS POST  </h2>
	<form action="forms/forms2.php" method="POST">
		<input type="text" name="namn" placeholder="Skriv nått ba">
		<input type="submit" name="Skicka">
	</form>

	<h2> Uppgift 2 FORMS GET </h2>
	<form action="forms/forms3.php" method="GET">
		<input type="text" name="namn" placeholder="Skriv nått ba">
		<input type="submit" name="Skicka">
	</form>

	<h2> Uppgift 3 och 4 och 6</h2>
	<form action="forms/forms4.php" method="POST">
		<input type="text" name="firstName" placeholder="Förnamn">
		<input type="text" name="lastName" placeholder="Efternamn">
		<input type="text" name="className" placeholder="Klass">
		<br>
		<h4> Vilka är dina favoriträtter? (Shift eller CTRL för att välja fler) </h4>
		<select name="food[]" multiple="multiple">
			<option value="pannkaka">Pannkaka</option>
			<option value="pizza">Pizza</option>
			<option value="blodpudding">Blodpudding</option>
			<option value="hamburgare">Hamburgare</option>
			<option value="köttbullar">Köttbullar</option>
			<option value="köttfärssås">Köttfärssås</option>
			<option value="fiskpinnar">Fiskpinnar</option>
		</select>
		<br>
		<h4> Vilken är den roligaste kursen? </h4>
		<input type="radio" name="favoritkurs" value="Religionkunskap"> Religionkunskap <br>
		<input type="radio" name="favoritkurs" value="WebbserverProgrammering"> WebbserverProgrammering <br>
		<input type="radio" name="favoritkurs" value="Kemi"> Kemi <br>

		<input type="submit" name="Skicka">
	</form>

	<h2> Uppgift 7 </h2>
	<form action="forms/forms5.php" method="POST">
		<input type="number" name="firstNum" placeholder="Nummer 1">
		<input type="number" name="secondNum" placeholder="Nummer 2">
		<input type="number" name="thirdNum" placeholder="Nummer 3">
		<input type="submit" name="Beräkna">
	</form>

	<h2><a href="forms/forms6.php"> Uppgift 8 </a></h2>

</body>
</html>