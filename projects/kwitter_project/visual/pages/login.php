 <section class="row align-items-end">
 	<div class="center">
 		<div class="col-6 dove" style="max-width: 500px;">
 				<!-- Logga på Kwitter (hittad på google) -->
 			<img src="pics/dove.png" height="400">
 		</div>
		<div class="col-3 loginform">
			<div>
			<?php if (!isset($_SESSION["isLoggedIn"])) {  
				//Error hanterare
				if ($error == true) {
					echo '<strong style = "color: firebrick; -webkit-text-stroke:0.5px black;">This account does not exist! Try again...</strong>';
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
					<input class="btn btn-light btn-lg m-3" type="submit" name="logga_in" value="Sign in"><br>
				</form>
				<br>
				<a class="badge badge-info" href="?page=register">Register an account</a>
			<?php } else { ?>
				<!-- När man är inloggad ser man det här -->
				<br>
				<h1>
					You are signed in!
				</h1>
				<h2 style="word-wrap: break-word;">Hello, <?=$_SESSION["username"]?>!</h2>
				<br>

				<!-- ta bort användare -->
				<form method="POST" onsubmit="submit.disabled = true; return true;">
					<input type="hidden" name="delete_user_skickat">
					<input type="submit" name="delete_user" value="Delete your account" class="btn btn-danger btn-lg m-3" style="width: 80%;">
				</form>
				

				<!-- uppdatera din beskrivning -->

				<?php if (isset($err)): ?>
					<strong style="color: red; background-color: black; border-radius: 3px;"><?=$err?></strong>
				<?php endif ?>

				<form method="POST" onsubmit="submit.disabled = true; return true;">
					<label class="badge badge-info m-2" style="float: left; font-size: 22px!important;">Your description</label><br>
					<input type="hidden" name="bio_skickat">
					<?php 
						$user_info = getUserInfo($_SESSION["user_id"]);
					 ?>
					<textarea class="form-control m-4" style="width: 85%; border: solid black 3px;" rows="5" name="textarea" placeholder="Type your bio here!" required><?php if(isset($bio)){echo $bio;}else{echo $user_info["bio"];}?></textarea>
					<input type="text" name="banner" class="m-3" placeholder="Image link for banner here!" style="width: 80%;">
					<input type="submit" name="submit" value="Update your bio!" class="btn btn-info btn-lg m-3" style="width: 80%;">
				</form>
				

				<!-- logga ut -->
				<form method="POST" onsubmit="submit.disabled = true; return true;">
					<input type="hidden" name="utlogg_skickat">
					<input type="submit" name="logga_ut" value="Sign out" class="btn btn-light btn-lg m-3" style="width: 80%;">
				</form>
				

				<!-- länk tillbaka till kwitter -->
				<a class="btn btn-light btn-lg m-3" style="width: 80%;" href="?page=flow">Back to Kwitter!</a>
			<?php } ?>
			</div>
			<div class="col-3">
 			
 			</div>
 		</div>
	</div>
 </section>