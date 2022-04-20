 <section>
	<div>
		<div id="center">
			<div>
				<h1>
						Register an account
				</h1>
				<?php if (!isset($_SESSION["isLoggedIn"])) {  
					if ($error == true) {
						echo "<strong style='color: red;'>{$message}!</strong>";
					} ?>
					<form method="POST">
						<input type="hidden" name="reg_skickat">
							<label>Username</label><br>
						<input type="text" name="username"><br>
							<label>Password</label><br>
						<input type="password" name="password"><br>
							<label>Comfirm password</label><br>
						<input type="password" name="confirm_password"><br>
						<input type="submit" name="register" value="Registrera"><br>
					</form>
					<br><a href="?page=login">Go to Sign in</a>
				<?php } else { ?>
					<h2>Hello, <?=$_SESSION["username"]?>! You should not be here...</h2>
					<br>
					<a href="?page=register">Register an account</a>
				<?php } ?>
			</div>
		</div>
	</div>
 </section>
