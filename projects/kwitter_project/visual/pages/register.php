 <section class="row align-items-end">
	<div class="center">
 		<div class="col-6 dove">
 				<!-- Logga på Kwitter (hittad på google) -->
 			<img src="pics/dove.png" height="400">
 		</div>
		<div class="col-6 loginform">
			<div>
				<h1>
						Register an account
				</h1>
				<?php if (!isset($_SESSION["isLoggedIn"])) {  
					if ($error == true) {
						echo "<strong style = 'color: firebrick; -webkit-text-stroke:0.5px black;'>{$message}!</strong>";
					} ?>
					<form method="POST" onsubmit="submit.disabled = true; return true;">
						<input type="hidden" name="reg_skickat">
							<label>Username</label><br>
						<input type="text" name="username"><br>
							<label>Password</label><br>
						<input type="password" name="password"><br>
							<label>Comfirm password</label><br>
						<input type="password" name="confirm_password"><br>
						<input type="submit" name="register" class="btn btn-success btn-lg m-3" value="Register"><br>
					</form>
					<br><a class="badge badge-info" href="?page=login">Go to Sign in</a>
				<?php } else { ?>
					<h2>Hello, <?=$_SESSION["username"]?>! You should not be here...</h2>
					<br>
					<a href="?page=register">Register an account</a>
				<?php } ?>
			</div>
		</div>
	</div>
 </section>
