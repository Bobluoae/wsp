<!-- Rutan på ett inlägg -->
<div class="border m-1 p-2 mb-5">

	<!-- Rutan på namn och användartyp -->
	<div class="border m-1 p-1" id="name">
		<a class="badge badge-info"href="?page=theirflow&theirflow=<?=$message["user_id"]?>"><?=$message["username"]?> | <?=$message["usertype"]?></a>
			<?php if ($_SESSION["user_id"] == $message["user_id"] || $_SESSION["usertype"] == "admin"): ?>
				<a class="text-align-right" href="?delete=<?=$message["m_id"]?>">🗑️</a>
			<?php endif ?>
	</div>

	<!-- Utskrift av meddelande -->
	<?=$message["message"];?>

	<!-- Ruta för like, dislike och like-dislike ratio och replies -->
	<div class="border m-1">

		<!-- Kalkylerar Like-Dislike Ratio -->
		<?php

			$likes = getMessageLikes($message["m_id"]);
			$dislikes = getMessageDislikes($message["m_id"]);

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



		 <?php if (isMessageLiked($message["m_id"]) == 1): ?>
		 	<button class="unlike" value="<?=$message["m_id"]?>">Remove like</button>
		 <?php else: ?>
		 	<button class="like" value="<?=$message["m_id"]?>">Like</button>
		 <?php endif ?>

		  <?php if (isMessageLiked($message["m_id"]) == -1): ?>
		 	<button class="unlike" value="<?=$message["m_id"]?>">Remove dislike</button>
		 <?php else: ?>
		 	<button class="dislike" value="<?=$message["m_id"]?>">Dislike</button>
		 <?php endif ?>
		   
		



		<?php if ($_GET["page"] !== "reply"): ?>
			<a href="?page=reply&reply=<?= $message["m_id"]?>"><button>Reply</button></a>
		<?php endif ?>
	</div>
</div>