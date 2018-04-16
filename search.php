<?php

	// $Name = '';
	// $Area = '';
	// $Fee = '';
	// $QsRanking = '';
	if (isset($_POST['search'])) {
			# code...
		$uni = $_POST['uni'];
		$area = $_POST['area'];
		$gpa = $_POST['gpa'];
		$fee = $_POST['fees'];
		$search_results = mysqli_query($conn,"SELECT * FROM university
			WHERE name LIKE '%$uni%' OR  area LIKE '%$area%' ");
		// if ($search_results) {
		// 	# code...
		// 	echo "sting";
		// }
		// else{
		// 	echo "car";
		// }
		if(mysql_num_rows($search_results) > 0){
			echo "6";
			while ($row = mysqli_fetch_array($search_results)) {
				// $Name = $row['name'];
				// $Area = $row['']
				// echo "Name: ".$Name;
				// echo "string";
			}
		}
		else{
			echo "	<div class='alert alert-danger>
			<strong>No Results Found...</strong>
			</div> ";
		}
	}
?>