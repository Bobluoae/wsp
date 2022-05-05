<div class="border m-1 p-2">
	<div class="border m-1 p-1">
		Username | Usertype
	</div>

<?php 
	
	$id = $_SESSION["user_id"];

	$query = $conn->prepare("SELECT * FROM chat_log WHERE user_id = ?");
	$query->bindParam('1', $id, PDO::PARAM_INT);
	$query->execute();

	if ($query) {
		// output data of each row
  		$results = $query->fetch(PDO::FETCH_ASSOC);
  		$a = $results["message"];
  		foreach ($results as $key => $value) {
  			echo " | " . $value;
  		}
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
	</div>
</div>