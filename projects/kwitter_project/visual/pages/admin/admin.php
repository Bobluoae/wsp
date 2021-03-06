<!-- only admin can see this page -->
<?php if ($_SESSION["usertype"] == "admin"): ?> 
<div class="center container" style="display: flex;">
	<div class="row">
		<div class="col-12">
			<nav> <!-- just refreshes page to fetch users table again -->
				<a class="btn btn-light btn-lg m-3" href="?page=admin">Update Users</a>
			</nav>
		</div>

		<!-- table for users and admins -->
		<table class="table" id="tablebox">
			<tr>
				<th>ID</th>
				<th>USERNAME</th>
				<th>PASSWORD</th>
				<th>USERTYPE</th>
				<th>CREATED</th>
				<th>DEL</th>
				<th>EDIT</th>
			</tr>
			<?php

			$query = $conn->prepare("SELECT * FROM users ORDER BY user_id DESC");
			$query->execute();

			//Print table with the corresponding information
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				echo "<tr>";
				echo "<td>" . $row["user_id"] . "</td>";
				echo "<td>" . $row["username"] . "</td>";
				echo "<td>" . $row["password"] . "</td>";
				echo "<td>" . $row["usertype"] . "</td>";
				echo "<td>" . $row["created_at"] . "</td>";
				echo '<td><a href="?page=admin&deleteuser=' . $row["user_id"] . '">🗑️</a></td>';
				echo '<td><a href="?page=update&updateuser=' . $row["user_id"] . '">🖊️</a></td>';
				echo "</tr>";
			}?>
		</table>
	</div>
</div>
<?php endif ?>