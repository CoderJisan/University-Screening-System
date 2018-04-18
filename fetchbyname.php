<?php
include('connection.php');
$output = '';
if(isset($_POST["query"]))
{
	$search = $_POST["query"];
	$query = "
	SELECT * FROM university 
	WHERE name LIKE '%$search%'
	OR area LIKE '%$search%' OR gpa LIKE '%$search' OR fee LIKE '%$search%' OR qsrank LIKE '%$search%' OR status LIKE '%$search%' ";
}
else{}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>#</th>
							<th>University Name</th>
							<th>Address</th>
							<th>GPA</th>
							<th>Fee</th>
							<th>QS RANK</th>
							<th>Private/Public</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["name"].'</td>
				<td>'.$row["area"].'</td>
				<td>'.$row["gpa"].'</td>
				<td>'.$row["fee"].'</td>
				<td>'.$row["qsrank"].'</td>
				<td>'.$row["status"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'No Result Found';
}
?>