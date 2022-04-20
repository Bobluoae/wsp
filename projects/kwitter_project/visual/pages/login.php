 <section>
	<div id="center">
		<?php if (!isset($_SESSION["isLoggedIn"])) {  
			if ($error == true) {
				echo '<strong style = "color: red">This account does not exist! Try again...</strong>';
			} ?>
			<h1>
				Sign in
			</h1>
			<form method="POST">
				<input type="hidden" name="inlogg_skickat" value="1">
					<label>Username</label><br>
				<input type="text" name="username"><br>
					<label>Password</label><br>
				<input type="password" name="password"><br>
				<input type="submit" name="logga_in" value="Logga in"><br>
			</form>
			<br>
			<a href="?page=register">Register an account</a>
		<?php } else { ?>
			<h1>
				You are signed in!
			</h1>
			<h2>Hello, <?=$_SESSION["username"]?>!</h2>
			<form method="POST">
				<input type="hidden" name="utlogg_skickat">
				<input type="submit" name="logga_ut" value="Logga ut">
			</form>
		<?php } ?>
	</div>
 </section>