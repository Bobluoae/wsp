<div>
	<h1>UPDATE FRIENDS</h1>
	<form method="POST" action="?page=table">
		<input type="hidden" name="update_skickat">
		<input type="hidden" name="id" value="<?=$_POST['id']?>">
		<label>Name</label><br>
		<input type="text" name="name" placeholder="Name?" autocomplete="off" value="<?=$_POST['name']?>"><br>
		<label>Surname</label><br>
		<input type="text" name="surname" placeholder="Surname?" autocomplete="off" value="<?=$_POST['surname']?>"><br>
		<label>Phonenumber</label><br>
		<input type="text" name="phone" placeholder="Phone number?" autocomplete="off" value="<?=$_POST['phone']?>"><br>
		<label>Email</label><br>
		<input type="text" name="email" placeholder="Email?" autocomplete="off" value="<?=$_POST['email']?>"><br>
		<input type="submit" name="Submit"><br>
	</form>
</div>