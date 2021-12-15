<?php 
session_start();
// 86400 = 1 day

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sessions</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Uppgift 2 </h1>
<?php 

if(!isset($_SESSION['start'])) {
  echo "Session is not set!";
} else {
  echo "Session is set!<br>";
  echo "Hejsan, Välkommen tillbaka!";
}

if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 3600)) {
    session_unset(); 
}

$_SESSION['start'] = time();

 ?>
<br>
<br>
<a href="../cookies.php"> Uppgift 1 </a> <br>
<a href="session1.php"> Uppgift 2 (Ladda om sidan) </a> <br>
<a href="inlogg.php"> Uppgift 3 </a> <br>
<a href="inmatning_medel.php"> Uppgift 4 </a> <br>

</body>
</html>