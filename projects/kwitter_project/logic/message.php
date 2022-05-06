<?php
//Kolla om användare är inloggad
if (isset($_SESSION["user_id"])) {
	
	//Hämta alla meddelanden
	$query = $conn->prepare("SELECT * FROM chat_log, users WHERE chat_log.user_id = users.user_id");
	$query->execute();

	//Loopa igenom alla meddelanden i DB och skriv ut html
	while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
?>

<!-- Rutan på ett inlägg -->
<div class="border m-1 p-2">

	<!-- Rutan på namn och användartyp -->
	<div class="border m-1 p-1">
		<?=$results["username"]?> | <?=$results["usertype"]?>
	</div>

	<!-- Utskrift av meddelande -->
	<?=$results["message"];?>

	<!-- Ruta för like, dislike och like-dislike ratio och replies -->
	<div class="border m-1">

		<!-- Kalkylerar Like-Dislike Ratio -->
		<?php
			$dislikes = 5;
			$likes = 10;
			$sum = 0;
			$sum = $dislikes + $likes;
			$ratio = $likes / $sum;
			$result = round($ratio, 2) * 100;
		 ?>
		<!-- Utskrift av ratio pie-chart samt knappar för like, dislike och reply -->
		Ratio: 
		<div class="pie animate no-round" style="--p:<?php echo $result; ?>;--c:green;">
			<?php echo '<span style="font-size: 15px">'. $result .'%</span>';?>
		</div>
		<button>Like</button>   
		<button>Dislike</button>
		<button>Reply</button>	
	</div>
</div>
<?php }}