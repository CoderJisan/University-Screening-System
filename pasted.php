<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<div>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">University Name</th>
					<th scope="col">University Location</th>
					<th scope="col">University's Per Credit Fee</th>
					<th scope="col">Qs Ranking</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($view = mysqli_fetch_array($view_result)) {
			 		# code...
	echo "<tr>";
	echo "<td>".$view['id']."</td>";
	echo "<td>".$view['name']."</td>";
	echo "<td>".$view['area']."</td>";
	echo "<td>".$view['fee']."</td>";
	echo "<td>".$view['qsrank']."</td>";
	echo "</tr>";
}
?>
			</tbody>
		</table>
	</div>
</body>
</html>