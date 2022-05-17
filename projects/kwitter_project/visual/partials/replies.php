<!-- Rutan på ett inlägg -->
<div class="border m-1 p-2">

	<!-- Rutan på namn och användartyp -->
	<div class="border m-1 p-1" id="name">
		<a class="badge badge-info" href="?page=theirflow&theirflow=<?=$reply["user_id"]?>"><?=$reply["username"]?> | <?=$reply["usertype"]?></a>
		<?php if ($_SESSION["user_id"] == $reply["user_id"] || $_SESSION["usertype"] == "admin"): ?>
			<a class="text-align-right" href="?deletereply=<?=$reply["r_id"]?>&reply=<?=$_GET["reply"]?>">🗑️</a>
		<?php endif ?>
	</div>

	<!-- Utskrift av meddelande -->
	<?=htmlentities($reply["reply"]);?>

	<!-- Ruta för like, dislike och like-dislike ratio och replies -->
	<div class="border m-1">

		<!-- Kalkylerar Like-Dislike Ratio -->
		<?php
			$likes = getReplyLikes($reply["r_id"]);
			$dislikes = getReplyDislikes($reply["r_id"]);

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
		echo 'Likes: <span id="r_like_'.$reply["r_id"].'">' . $likes . '</span> | Dislikes: <span id="r_dislike_'.$reply["r_id"].'">' . $dislikes . '</span>';
		 ?>


		 		 <!-- Knappar för Like och ta bort like -->
		<button 
			style="display: <?php echo isReplyLiked($reply["r_id"]) == 1 || isReplyLiked($reply["r_id"]) == -1 ? "none" : "inline" ?>;"
			class="r_like"
			value="<?=$reply["r_id"]?>">
			Like
		</button>

		<button 
			style="display: <?php echo isReplyLiked($reply["r_id"]) == 1 ? "inline" : "none" ?>;" 
			class="r_unlike_like" 
			value="<?=$reply["r_id"]?>">
			Remove like
		</button>
		

		
		<!-- Knappar för Dislike och ta bort dislike -->
		<button 
			style="display: <?php echo isReplyLiked($reply["r_id"]) == -1 || isReplyLiked($reply["r_id"]) == 1 ? "none" : "inline" ?>;"
			class="r_dislike" 
			value="<?=$reply["r_id"]?>">
			Dislike
		</button>
	
		<button 
			style="display: <?php echo isReplyLiked($reply["r_id"]) == -1 ? "inline" : "none" ?>;"
			class="r_unlike_dislike" 
			value="<?=$reply["r_id"]?>">
			Remove dislike
		</button>


	</div>
</div>