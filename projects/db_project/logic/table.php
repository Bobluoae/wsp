<div class="center">
	<table class="table" id="tablebox">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>SURNAME</th>
			<th>PHONE</th>
			<th>EMAIL</th>
			<th>DEL</th>
			<th>EDIT</th>
		</tr>
		<?php
		$query = mysqli_query($conn, "SELECT * FROM friends");
		while($row = mysqli_fetch_assoc($query)) {
			echo "<tr>";
			echo "<td>" . $row["id"] . "</td>";
			echo "<td>" . $row["name"] . "</td>";
			echo "<td>" . $row["surname"] . "</td>";
			echo "<td>" . $row["phone"] . "</td>";
			echo "<td>" . $row["email"] . "</td>";
			echo '<td><a href="?page=table&delete=' . $row["id"] . '">🗑️</a></td>';
			echo '<td><a href="?page=update&update=' . $row["id"] . '">🖊️</a></td>';
			echo "</tr>";
		}?>
	</table>
</div>