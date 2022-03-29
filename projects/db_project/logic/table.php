	<table id="tablebox">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>SURNAME</th>
			<th>PHONE</th>
			<th>EMAIL</th>
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
			echo "</tr>";
		}?>
	</table>