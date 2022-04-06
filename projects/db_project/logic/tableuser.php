<div class="center">
	<table class="table" id="tablebox">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>SURNAME</th>
			<th>PHONE</th>
			<th>EMAIL</th>
		</tr>
		<?php
		$query = $conn->prepare("SELECT * FROM friends ORDER BY id DESC");
		$query->execute();

		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row["id"] . "</td>";
			echo "<td>" . $row["name"] . "</td>";
			echo "<td>" . $row["surname"] . "</td>";
			echo "<td>" . $row["phone"] . "</td>";
			echo "<td>" . $row["email"] . "</td>";
			echo "</tr>";
		}?>
	</table>
</div>