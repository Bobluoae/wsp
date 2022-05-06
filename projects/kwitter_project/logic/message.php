<?php 
	
	$id = $_SESSION["user_id"];

	$query = $conn->prepare("SELECT * FROM chat_log, users/*WHERE user_id = ?*/");
	// $query->bindParam('1', $id, PDO::PARAM_INT);
	$query->execute();
	$results = $query->fetch(PDO::FETCH_ASSOC);

	$q = $conn->prepare("SELECT COUNT(*) FROM chat_log"); 
	$q->execute();



	$num = $q->fetchColumn();
	for ($i=0; $i < $num; $i++) { 

?>
<div class="border m-1 p-2">
	<div class="border m-1 p-1">
		<?=$results["username"]?> | <?=$results["usertype"]?>
	</div>


<?php

	if ($num){
		echo $results["message"]/*[$i]*/;
	}

 ?>


	<div class="border m-1">
		<?php
			$dislikes = 5;
			$likes = 10;
			$sum = 0;
			$sum = $dislikes + $likes;
			$ratio = $likes / $sum;
			$result = round($ratio, 2) * 100;
		 ?>
		Ratio: 
		<div class="pie animate no-round" style="--p:<?php echo $result; ?>;--c:green;">
			<?php echo '<span style="font-size: 15px">'. $result .'%</span>';?>
		</div>
	<button>Like</button>   
	<button>Dislike</button>
	<button>Reply</button>	
	</div>
</div>

<?php } ?>