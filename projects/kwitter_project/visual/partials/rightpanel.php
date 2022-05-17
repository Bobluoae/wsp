<!-- Dina följda användare -->
<div class="col-2 border col-md-2">
 	<div class="m-1 p-1">
 		<a class="badge badge-info" href="?page=information">Information</a>
 	</div>
 	<div class="m-1 p-1">
 		<?php if ($_SESSION["usertype"] == "admin"): ?>
 			<hr>
 			<a class="badge badge-info" href="?page=admin">Admin Page</a>
 		<?php endif ?>
 	</div>
</div>