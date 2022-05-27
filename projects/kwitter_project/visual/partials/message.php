<!-- Rutan på ett inlägg -->
<div class="border-main m-1 p-2 mb-5">

	<!-- Rutan på namn och användartyp -->
	<div class="border-name m-1 p-1" id="name">

		<?php if ($message["usertype"] == "admin"): ?>
			<span style="float: left">🚨</span>
		<?php else: ?>
			<span style="float: left">🧍‍</span>
		<?php endif ?>

		<a class="badge badge-info"href="?page=theirflow&theirflow=<?=$message["user_id"]?>"><?=$message["username"]?> | <?=$message["usertype"]?></a>
			<?php if ($_SESSION["user_id"] == $message["user_id"] || $_SESSION["usertype"] == "admin"): ?>
				<a class="text-align-right" href="?delete=<?=$message["m_id"]?>">🗑️</a>
			<?php endif ?>
	</div>

	<!-- Utskrift av meddelande -->
	<div style="word-wrap: break-word;">
		<?=htmlentities($message["message"]);?> 
	</div>
	<span class="" style="font-size: 10px;">Created at: <?=$message["m_created_at"]?></span>

	<!-- Ruta för like, dislike och like-dislike ratio och replies -->
	<div class="border-information m-1">

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
		<div class="pie animate no-round" style="--p:<?php echo $result; ?>;--c:limegreen;">
			<?php echo '<span style="font-size: 15px">'. $result .'%</span>';?>
		</div>
		<?php }
		echo '👍 <span id="m_like_'.$message["m_id"].'">' . $likes . '</span> | 👎 <span id="m_dislike_'.$message["m_id"].'">' . $dislikes . '</span>';
		 ?>


		 <!-- Knappar för Like och ta bort like -->
		<button 
			style="display: <?php echo isMessageLiked($message["m_id"]) == 1 || isMessageLiked($message["m_id"]) == -1 ? "none" : "inline" ?>;"
			class="like btn btn-light btn-sm"
			value="<?=$message["m_id"]?>">
			Like
		</button>

		<button 
			style="display: <?php echo isMessageLiked($message["m_id"]) == 1 ? "inline" : "none" ?>;" 
			class="unlike_like btn btn-danger btn-sm" 
			value="<?=$message["m_id"]?>">
			Remove like
		</button>
		

		
		<!-- Knappar för Dislike och ta bort dislike -->
		<button 
			style="display: <?php echo isMessageLiked($message["m_id"]) == -1 || isMessageLiked($message["m_id"]) == 1 ? "none" : "inline" ?>;"
			class="dislike btn btn-light btn-sm" 
			value="<?=$message["m_id"]?>">
			Dislike
		</button>
	
		<button 
			style="display: <?php echo isMessageLiked($message["m_id"]) == -1 ? "inline" : "none" ?>;"
			class="unlike_dislike btn btn-danger btn-sm" 
			value="<?=$message["m_id"]?>">
			Remove dislike
		</button>
		
   
		 <!-- Reply knapp ska bara synas på flow / myflow / theirflow -->
		<?php if ($_GET["page"] !== "reply"): ?>
			<a class="btn btn-light btn-sm" href="?page=reply&reply=<?=$message["m_id"]?>">Reply</a>
		<?php endif ?>
		Replies: <?php $count = countReplies($message["m_id"]); 
		echo $count;
		?>
	</div>
</div>