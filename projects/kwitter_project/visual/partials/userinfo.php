 <div class="border-information m-1 mb-4 p-4">
	<?php
	    echo "This is ".$user_info["username"]."'s flow!";
	    echo "<br>Usertype: ".$user_info["usertype"];
	    ?><div style="word-wrap: break-word;"><?php
	    	echo "<br>Description: <br>" . $user_info["bio"];
	    ?></div><?php
	    echo "<br><span class='m-2' style='font-size: 10px;'>Account created at: " . $user_info["created_at"] . "</span>";
	?>
</div>