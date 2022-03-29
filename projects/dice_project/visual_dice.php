<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tärningsexempel</title>
	<link rel="stylesheet" type="text/css" href="styledice.css?b=<?php echo rand(1,99999)//Dåligt sätt att lura cachen av webbläsaren ?>">

</head>
<body>
	<div id="content">
	<h1>En tärning</h1>
	<img src="bilder/Dice-PNG-Picture.png" width="38%" style="float: right;">
	

<?php include "inc_dice_class.php";
 

$dice = new DiceCore($_GET["faces"] ?? 6);

if (isset($_GET["number"])) {
	$dice->rollDice($_GET["number"]); // Om värde är satt
}
else {
	$dice->rollDice(6); // Om inget värde är satt
}
?>	
	
	<form method="GET">
		<input type="hidden" name="skickat">
		<label>Hur många gånger vill du kasta?</label> <br>
		<input type="number" name="number" value = "<?php echo $_GET["number"]?? 6 ?>" placeholder="Tal">
		<br>
		<label>Hur många sidor ska tärningen ha?</label> <br>
		<input type="number" name="faces" value = "<?php echo $_GET["faces"]?? 6 ?>" placeholder="Sidor"> <br>
		<input type="submit" name="mata_in" value="Mata in">
	</form>
	<br>
	<a href="visual_dice.php">Reload Page</a>
	<p>Tärningen kastas <?php echo isset($_GET["number"]) ? $_GET["number"] : "6"; ?> gånger, här är resultatet.</p>
	<hr>
<?php  
include "inc_dice_histogram.php";

$histoDice = new Histogram();
echo $histoDice->getHistogram($dice->getRolls(), $dice->getFaces());

?>
	

<br>

	 <p>Här är alla oprocessade nummer :)</p>
<?php $dice->printDice(); ?>
	</div>
</body>
</html>
