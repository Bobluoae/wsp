<?php 

$cookie_name = "user";
setcookie($cookie_name, 1, time() + (3600)); // 86400 = 1 day
//setcookie("user", "1", time() + (3600));
//"user" = "1"

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cookies</title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Uppgift 1 </h1>
<?php 

if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Hejsan, välkommen tillbaka!";

  //echo $_COOKIE["user"]

}




 ?>
<br>
<br>
<a href="cookies.php"> Uppgift 1 (Ladda om sidan) </a> <br>
<a href="cookies_n_sessions/session1.php"> Uppgift 2 </a> <br>
<a href="cookies_n_sessions/inlogg.php"> Uppgift 3 </a> <br>
<a href="cookies_n_sessions/inmatning_medel.php"> Uppgift 4 </a> <br>
</body>
</html>