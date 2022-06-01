<!-- Rutan på ett inlägg -->
<div class="border-message m-1 p-2">

	<!-- Rutan på namn och användartyp -->
	<div class="border-name m-1 p-1" id="name">
		<?php if ($reply["usertype"] == "admin"): ?>
			<span style="float: left">🚨</span>
		<?php else: ?>
			<span style="float: left">🧍‍</span>
		<?php endif ?>
		<a class="badge badge-info" href="?page=theirflow&theirflow=<?=$reply["user_id"]?>"><?=$reply["username"]?> | <?=$reply["usertype"]?></a>
		<?php if ($_SESSION["user_id"] == $reply["user_id"] || $_SESSION["usertype"] == "admin"): ?>
			<a class="text-align-right" href="?deletereply=<?=$reply["r_id"]?>&reply=<?=$_GET["reply"]?>" onclick="return confirm('Are you sure you want to delete?')">🗑️</a>
		<?php endif ?>
	</div>

	<!-- Utskrift av meddelande -->
	<div style="word-wrap: break-word;">
		<?=$reply["reply"]?>
		<?php if (strpos($reply['image'], ".svg")): ?>
			<br>
			<img src='<?=htmlentities($reply['image'])?>' style="max-width: 300px; max-height: 300px;">
		<?php elseif ($reply['image'] !== ""): ?>
			<br>
			<a href="<?=htmlentities($reply["image"])?>"><img src='<?=htmlentities($reply['image'])?>' style="max-width: 300px; max-height: 300px;"></a>
		<?php endif ?>
	</div>
	<span class="m-2" style="font-size: 10px;">Created at: <?=$reply["r_created_at"]?></span>
	<!-- Ruta för like, dislike och like-dislike ratio och replies -->
	<div class="border-information m-1">

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
		<div class="pie animate no-round" style="--p:<?php echo $result; ?>;--c:limegreen;">
			<?php echo '<span style="font-size: 15px">'. $result .'%</span>';?>
		</div>
		<?php }
		echo '👍 <span id="r_like_'.$reply["r_id"].'">' . $likes . '</span> | 👎 <span id="r_dislike_'.$reply["r_id"].'">' . $dislikes . '</span>';
		 ?>


		 		 <!-- Knappar för Like och ta bort like -->
		<button 
			style="display: <?php echo isReplyLiked($reply["r_id"]) == 1 || isReplyLiked($reply["r_id"]) == -1 ? "none" : "inline" ?>;"
			class="r_like btn btn-light btn-sm"
			value="<?=$reply["r_id"]?>"
			onclick="merp();">
			Like
		</button>

		<button 
			style="display: <?php echo isReplyLiked($reply["r_id"]) == 1 ? "inline" : "none" ?>;" 
			class="r_unlike_like btn btn-danger btn-sm" 
			value="<?=$reply["r_id"]?>"
			onclick="merp();">
			Remove like
		</button>
		

		
		<!-- Knappar för Dislike och ta bort dislike -->
		<button 
			style="display: <?php echo isReplyLiked($reply["r_id"]) == -1 || isReplyLiked($reply["r_id"]) == 1 ? "none" : "inline" ?>;"
			class="r_dislike btn btn-light btn-sm" 
			value="<?=$reply["r_id"]?>"
			onclick="merp();">
			Dislike
		</button>
	
		<button 
			style="display: <?php echo isReplyLiked($reply["r_id"]) == -1 ? "inline" : "none" ?>;"
			class="r_unlike_dislike btn btn-danger btn-sm" 
			value="<?=$reply["r_id"]?>"
			onclick="merp();">
			Remove dislike
		</button>


	</div>
</div>