<!-- Rutan på ett inlägg -->
<div class="border m-1 p-2">

	<!-- Rutan på namn och användartyp -->
	<div class="border m-1 p-1">
		<?=$reply["username"]?> | <?=$reply["usertype"]?>
		<?php if ($_SESSION["user_id"] == $reply["user_id"]): ?>
			<a class="text-align-right" href="?deletereply=<?=$reply["r_id"]?>&reply=<?=$_GET["reply"]?>">🗑️</a>
		<?php endif ?>
	</div>

	<!-- Utskrift av meddelande -->
	<?=$reply["reply"];?>

	<!-- Ruta för like, dislike och like-dislike ratio och replies -->
	<div class="border m-1">

		<!-- Kalkylerar Like-Dislike Ratio -->
		<?php
			$dislikes = $reply["dislikes"];
			$likes = $reply["likes"];

			$sum = 0;
			$sum = $dislikes + $likes;

			if (!$sum == 0) {
				
			$ratio = $likes / $sum;
			$result = round($ratio, 2) * 100;
		 ?>
		<!-- Utskrift av ratio pie-chart samt knappar för like, dislike och reply -->
		Ratio: 
		<div class="pie animate no-round" style="--p:<?php echo $result; ?>;--c:green;">
			<?php echo '<span style="font-size: 15px">'. $result .'%</span>';?>
		</div>
		<?php }
		echo "Likes: " . $likes . " | Dislikes: " . $dislikes . " ";
		 ?>
		<button class="like" value="<?=$reply["r_id"]?>">Like</button>   
		<button class="dislike" value="<?=$reply["r_id"]?>">Dislike</button>
	</div>
</div>