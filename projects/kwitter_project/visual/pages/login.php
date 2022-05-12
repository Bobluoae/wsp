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
				<form method="POST">
					<input type="hidden" name="utlogg_skickat">
					<input type="submit" name="logga_ut" value="Logga ut">
				</form>
				<a class="badge badge-info" href="?page=flow">Back to Kwitter!</a>
			<?php } ?>
		</div>
		<div class="col-3">
 			
 		</div>
	</div>
 </section>