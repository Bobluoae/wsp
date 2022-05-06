<!-- Rutan på ett inlägg -->
<div class="border m-1 p-2">

	<!-- Rutan på namn och användartyp -->
	<div class="border m-1 p-1">
		<?=$reply["username"]?> | <?=$reply["usertype"]?>
	</div>

	<!-- Utskrift av meddelande -->
	<?=$reply["reply"];?>

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
		<button id="like">Like</button>   
		<button id="dislike">Dislike</button>
	</div>
</div>