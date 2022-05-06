<!-- Rutan på ett inlägg -->
<div class="border m-1 p-2 mb-5">

	<!-- Rutan på namn och användartyp -->
	<div class="border m-1 p-1">
		<?=$message["username"]?> | <?=$message["usertype"]?>
	</div>

	<!-- Utskrift av meddelande -->
	<?=$message["message"];?>

	<!-- Ruta för like, dislike och like-dislike ratio och replies -->
	<div class="border m-1">

		<!-- Kalkylerar Like-Dislike Ratio -->
		<?php

			$dislikes = $message["dislikes"];
			$likes = $message["likes"];

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

		<button class="like" value="<?=$message["m_id"]?>">Like</button>   
		<button class="dislike" value="<?=$message["m_id"]?>">Dislike</button>
		<?php if ($_GET["page"] !== "reply"): ?>
			<a href="?page=reply&reply=<?= $message["m_id"]?>"><button>Reply</button></a>
		<?php endif ?>
	</div>
</div>