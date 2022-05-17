 <section>
 	<div class="row align-items-start">
 		<div class="col-6">
 			<!-- Logga på Kwitter (hittad på google) -->
 			<img src="pics/dove.png" height="400">
 		</div>
		<div class="col-3 sm-1 loginform" id="center">
			<?php if (!isset($_SESSION["isLoggedIn"])) {  
				//Error hanterare
				if ($error == true) {
					echo '<strong style = "color: red">This account does not exist! Try again...</strong>';
				} ?>
				<h1>
					Sign in
				</h1>
				<!-- Inloggningsformulär -->
				<form method="POST">
					<input type="hidden" name="inlogg_skickat" value="1">
						<label>Username</label><br>
					<input type="text" name="username"><br>
						<label>Password</label><br>
					<input type="password" name="password"><br>
					<input type="submit" name="logga_in" value="Logga in"><br>
				</form>
				<br>
				<a class="badge badge-info" href="?page=register">Register an account</a>
			<?php } else { ?>
				<!-- När man är inloggad ser man det här bara -->
				<h1>
					You are signed in!
				</h1>
				<h2>Hello, <?=$_SESSION["username"]?>!</h2>
				<br>
				<form method="POST" onsubmit="submit.disabled = true; return true;">
					<input type="hidden" name="delete_user_skickat">
					<input type="submit" name="delete_user" value="Delete your account" class="btn btn-danger btn-lg m-3" style="float: left;">
				</form>
				<br><br><br>
				<form method="POST" onsubmit="submit.disabled = true; return true;">
					<label class="badge badge-info m-2" style="float: left;">Your description</label><br>
					<input type="hidden" name="bio_skickat">
					<?php 
						$user_info = getUserInfo($_SESSION["user_id"]);
					 ?>
					<textarea class="form-control m-3" style="max-width: 300px;" rows="5" name="textarea" placeholder="Type your bio here!" required><?=$user_info["bio"]?></textarea>
					<input type="submit" name="submit" value="Update your bio!" class="btn btn-info btn-lg m-3" style="float: left;">
				</form>
				<br><br><br>
				<form method="POST" onsubmit="submit.disabled = true; return true;">
					<input type="hidden" name="utlogg_skickat">
					<input type="submit" name="logga_ut" value="Sign out" class="btn btn-light btn-lg m-3" style="float: left;">
				</form>
				<br><br><br>
				<a href="?page=flow"><button class="btn btn-light btn-lg m-3" style="float: left;">Back to Kwitter!</button></a>
			<?php } ?>
		</div>
		<div class="col-3">
 			
 		</div>
	</div>
 </section>