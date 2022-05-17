<?php 
//Kolla om användaren är inloggad
if (isset($_SESSION["user_id"])) {

	//Hämta data från inloggad användare
	$query = $conn->prepare("SELECT * FROM users WHERE user_id = ".$_SESSION["user_id"]."");
	$query->execute();
	$results = $query->fetch(PDO::FETCH_ASSOC);

 ?>
 <!-- Rutan på ett inlägg -->
<div class="border m-1 p-2">

	<!-- Rutan på namn och användartyp -->
	<div class="border m-1 p-1">
		<?=$results["username"]?> | <?=$results["usertype"]?>
	</div>

	<!-- formulär för inlägg -->
	<form method="post" action="" class="">
		<input type="hidden" name="upload_skickat"> <!-- Skickar en parameter till php -->
		<textarea class="form-control" rows="5" name="textarea" required></textarea>
	<!-- Submit knapp separat från textboxen -->
	<div class="border m-1">
		<input type="submit" name="submit" onclick="this.form.submit();this.disabled = true;" value="Post Your Kwitt!"/>
	</form>	
	</div>
</div>
<?php }