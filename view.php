<?php	

session_start();
include "connection.php";
// $Name = '';
// $Area = '';
// $GPA = '';
// $Fees = '';
if(!isset($_SESSION['use'])){
	header("location: login.php");
}
else{
	$id = "";
	$fname = "";
	$uname = $_SESSION['use'];
	$email = "";
	$phone = "";
	$sgpa = "";
	$hgpa = "";
	$uni = "";
	$fee = "";
	$raw_query="SELECT * FROM users where uname = '$uname' ";
	$raw_result=mysqli_query($conn, $raw_query);
	// $_SESSION['use'] = $id;
	$view_query = "SELECT * FROM university";
	$view_result = mysqli_query($conn, $view_query);
	if($raw_result)
	{
		if(mysqli_num_rows($raw_result))
		{
			while($rows = mysqli_fetch_array($raw_result))
			{
				$id = $rows['id'];
				$fname = $rows['name'];
				$uname = $rows['uname'];
				$email = $rows['email'];
				$phone = $rows['phone'];
				$sgpa = $rows['ssc'];
				$hgpa = $rows['hsc'];
				$uni = $rows['uni'];
				$fee = $rows['fee'];

			}
		}else{
			echo("no data are available");
		}
	} else{
		echo("result error");
	}
	// $uniname = $_POST['Name'];
	// $uniarea = $_POST['Area'];
	// $unigpa = $_POST['GPA'];
	// $unifee = $_POST['Fees'];
	// if (isset($_POST['search'])) {
	// 	# code...
	// 	$uni_results = mysqli_query($conn,"SELECT * FROM university
	// 		WHERE name LIKE %$uni% OR  area LIKE %$area%");
	// 	if(mysql_num_rows($uni_results) > 0){
	// 		echo "6";
	// 		while ($unirow = mysqli_fetch_array($search_results)) {
	// 			$Name = $unirow['name'];
	// 			$Area = $unirow['area'];
	// 			$GPA = $unirow['gpa'];
	// 			$Fees = $unirow['fee'];
	// 		}
	// 	}
	// 	else{
	// 		header("location: view.php");
	// 	}
	// }
	// else{
	// 	header("location: view.php");
	// }

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
				$Name = $row['name'];
				echo $Name;
				// $Area = $row['']
				// echo "Name: ".$Name;
				// echo "string";
				$output.= '<div>'.$Name.'</div>';
			}
		}
		else{
			echo "	<div class='alert alert-danger>
			<strong>No Results Found...</strong>
			</div> ";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
</head>
<body>
	<?php
	include('head.php');
	?>
	<div style="padding-left: 10px;">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Your Full Name</th>
					<th scope="col">Your User Name</th>
					<th scope="col">Your Email id</th>
					<th scope="col">Your Phone number</th>
					<th scope="col">Your SSC GPA</th>
					<th scope="col">Your HSC GPA</th>
					<th scope="col">Preffered University</th>
					<th scope="col">Preffered Fee</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td><?php echo ($fname); ?></td>
					<td><?php echo ($uname); ?></td>
					<td><?php echo ($email); ?></td>
					<td><?php echo ($phone); ?></td>
					<td><?php echo ($sgpa); ?></td>
					<td><?php echo ($hgpa); ?></td>
					<td><?php echo ($uni); ?></td>
					<td><?php echo ($fee); ?></td>
					<?php
					echo "<td><a href=update.php?edit=".$id."><button type='button' class='btn btn-success'>Update</button></a></td>";
					?>
				</tr>
			</tbody>
		</table>
		<form method="post" name="search" action="">
			<div class="row" style="padding-right: 20px;">
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search by..." name="Name">
						<!-- <span class="input-group-btn">
							<button class="btn btn-default" type="button">University Name</button>
						</span> -->
					</div><!-- /input-group -->
				</div><!-- /.col-lg-6 -->
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search by..." name="Area">
						<!-- <span class="input-group-btn">
							<button class="btn btn-default">Area</button>
						</span> -->
					</div><!-- /input-group -->
				</div><!-- /.col-lg-6 -->
			</div>
			<div style="padding-top: 10px; padding-right: 20px;">
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search by..." name="Gpa">
						<!-- <span class="input-group-btn">
							<button class="btn btn-default" type="button">Minimum Gpa to Apply</button>
						</span> -->
					</div><!-- /input-group -->
				</div><!-- /.col-lg-6 -->
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search by..." name="Fees">
						<!-- <span class="input-group-btn">
							<button class="btn btn-default" type="button">Fee Per Credit</button>
						</span> -->
					</div><!-- /input-group -->
				</div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
			<div class="col-sm-offset-2 col-sm-10" style="padding-top: 20px; padding-bottom: 20px; padding-left: 30%;">
				<button type="submit" class="btn btn-default" name="search">Search</button>
			</div>
		</form>
		<!-- <table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">University Name</th>
					<th scope="col">University Location</th>
					<th scope="col">Req. GPA(SSC+HSC/O+A level)</th>
					<th scope="col">University's Per Credit Fee</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="col"></th>
					<td scope="col"><?php  ($Name); ?></td>
					<td scope="col"><?php  ($Area); ?></td>
					<td scope="col"><?php  ($GPA); ?></td>
					<td scope="col"><?php  ($Fees); ?></td>
				</tr>
			</tbody>
		</table> -->
		<!-- <?php
		// print($output);
		?> -->
	</div>
	<div style="padding-left: 10px;">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">University Name</th>
					<th scope="col">University Location</th>
					<th scope="col">Req. GPA(SSC+HSC/O+A level)</th>
					<th scope="col">University's Per Credit Fee</th>
					<th scope="col">Qs Ranking</th>
					<th scope="col">Private/Public</th>

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
					echo "<td>".$view['gpa']."</td>";
					echo "<td>".$view['fee']."</td>";
					echo "<td>".$view['qsrank']."</td>";
					echo "<td>".$view['status']."</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div style="padding-top: 50px;">
		<div class="col-sm-offset-2 col-sm-10" style="padding-left: 30%; padding-bottom: 5%;">
			<a href="logout.php"><button type="submit" class="btn btn-danger" name="out">Log out</button></a>
		</div>
	</div>
	<?php
	include 'footer.php';
	?>
	<?php
	?>
	
</body>
</html>