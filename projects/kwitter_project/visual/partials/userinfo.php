 <div class="border m-4 p-4">
	<?php
    echo "This is ".$user_info["username"]."'s flow!";
    echo "<br>Usertype: ".$user_info["usertype"];
    echo "<br>Bio: <br>" . $user_info["bio"];
    echo "<br><span class='m-2' style='font-size: 10px;'>Account created at: " . $user_info["created_at"] . "</span>";
	?>
</div>