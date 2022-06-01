 <?php if ($_GET["pagenum"] == 1) { ?>
 <div class="border-information mb-4" style="overflow: hidden;">

		<?php if (strpos($user_info['banner'], ".svg")): ?>
			<div class="mb-3" style="border-bottom: 4px solid navy; height: 200px; overflow: hidden;">
				<img src='<?=htmlentities($user_info['banner'])?>'>
			</div>
		<?php elseif ($user_info['banner'] !== ""): ?>
			<div class="mb-3" style="border-bottom: 4px solid navy; height: 200px; overflow: hidden;">
				<a href="<?=htmlentities($user_info["banner"])?>"><img src='<?=htmlentities($user_info['banner'])?>'></a>
			</div>
		<?php endif ?>
	<div class="m-4">
	<?php
		
	    echo "This is ".$user_info["username"]."'s flow!";
	    echo "<br>Usertype: ".$user_info["usertype"];
	    ?><div style="word-wrap: break-word;"><?php
	    	echo "<br>Description: <br>" . $user_info["bio"];
	    ?></div><?php
	    echo "<br><span class='m-2' style='font-size: 10px;'>Account created at: " . $user_info["created_at"] . "</span>"; 
	?>
	</div>
</div>
<?php }