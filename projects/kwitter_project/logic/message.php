<div class="border m-1 p-2">
	<div class="border m-1 p-1">
		Username | Usertype
	</div>

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

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