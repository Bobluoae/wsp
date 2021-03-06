<?php
//Kolla om användaren är inloggad
if (isset($_SESSION["user_id"])) {

	//Hämta data från inloggad användare
	$query = $conn->prepare("SELECT * FROM users WHERE user_id = ".$_SESSION["user_id"]."");
	$query->execute();
	$results = $query->fetch(PDO::FETCH_ASSOC);

 ?>
 <!-- Rutan på ett inlägg -->
<div class="border-message m-1 p-2">

	<!-- Rutan på namn och användartyp -->
	<div class="border-name m-1 p-1">
		<?=$results["username"]?> | <?=$results["usertype"]?>
	</div>
	<!-- formulär för inlägg -->
	<?php if (isset($err)): ?>
	<strong style="color: red; background-color: black; border-radius: 3px;"><?=$err?></strong>
	<?php endif ?>

	<form method="post" action="" onsubmit="submit.disabled = true; return true;">
		<input type="hidden" name="upload_skickat"> <!-- Skickar en parameter till php -->
		<textarea class="form-control" rows="5" name="textarea" required><?php if(isset($text)){echo $text;}?></textarea><br>
		<input type="text" name="img" placeholder="Paste your image link here!">
	<!-- Submit knapp separat från textboxen -->
	<div class="border-information m-1">
		<input type="submit" name="submit" value="Post Your Kwitt!" class="btn btn-light btn-lg m-1">
	</form>	
	</div>
</div>
<?php }