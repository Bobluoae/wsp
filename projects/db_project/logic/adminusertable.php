<div class="center">
	<table class="table" id="tablebox">
		<tr>
			<th>ID</th>
			<th>USERNAME</th>
			<th>PASSWORD</th>
			<th>USERTYPE</th>
			<th>DEL</th>
			<th>EDIT</th>
		</tr>
		<?php

		// $query = mysqli_query($conn, "SELECT * FROM friends ORDER BY id DESC");

		$query = $conn->prepare("SELECT * FROM users ORDER BY user_id DESC");
		$query->execute();

		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row["user_id"] . "</td>";
			echo "<td>" . $row["username"] . "</td>";
			echo "<td>" . $row["password"] . "</td>";
			echo "<td>" . $row["usertype"] . "</td>";
			echo '<td><a href="?page=adduser&deleteu=' . $row["user_id"] . '">🗑️</a></td>';
			echo '<td><a href="?page=updateu&updateu=' . $row["user_id"] . '">🖊️</a></td>';
			echo "</tr>";
		}?>
	</table>
</div>