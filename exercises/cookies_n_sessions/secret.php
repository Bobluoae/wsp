<?php 
session_start();
// 86400 = 1 day

if (isset($_SESSION["isLoggedIn"])) { // Innehåller all html på sidan
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inlogg</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Uppgift 3 Secret </h1>

	<p>Jorden kommer sprängas 2053/05/13 (((Säg inte till nån!!!)))</p>
<?php 

?>
<br>
<a href="../cookies.php"> Uppgift 1 </a> <br>
<a href="session1.php"> Uppgift 2 </a> <br>
<a href="inlogg.php"> Uppgift 3 (Tillbaka till inlogg) </a> <br>

</body>
</html>
<?php 
}

else {
	header("HTTP/1.1 404 Not Found");
}
 ?>