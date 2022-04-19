<div>
	<h1>UPDATE USERS</h1>
	<form method="POST" action="?page=adminusertable">
		<input type="hidden" name="update_skickatu">
		<input type="hidden" name="user_id" value="<?=$_POST['user_id']?>">
		<label>Username</label><br>
		<input type="text" name="username" placeholder="Username?" autocomplete="off" value="<?=$_POST['username']?>"><br>
		<label>Password</label><br>
		<input type="text" name="password" placeholder="Password?" autocomplete="off" value="<?=$_POST['password']?>"><br>
		<label>Usertype</label><br>
		<input type="text" name="usertype" placeholder="Usertype?" autocomplete="off" value="<?=$_POST['usertype']?>"><br>
		<input type="submit" name="Submit"><br>
	</form>
</div>