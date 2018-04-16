<?php
session_start();
if(!isset($_SESSION['admin'])){
	header("location: admin.php");
}else{
	$_SESSION['adminview']= true;
	include('connection.php');
	$search_query="SELECT * FROM users";
	$search_result=mysqli_query($conn, $search_query);
	$view_query = "SELECT * FROM university";
	$view_result = mysqli_query($conn, $view_query);
}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin View</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("tr:even").css("background-color", "#e8e8e8");
		});
	</script>
</head>
<body>
	<?php
	include('head.php');
	?>
	<div class="page-header">
		<h1 style="text-align: center;">User's List</h1>
	</div>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Full Name</th>
				<th scope="col">User Name</th>
				<th scope="col">Email</th>
				<th scope="col">Your SSC GPA</th>
				<th scope="col">Your HSC GPA</th>
				<th scope="col">Preffered University</th>
				<th scope="col">Preffered Fee</th>
			</tr>
		</thead>
		<tbody>
			<?php
			 	while ($row = mysqli_fetch_array($search_result)) {
			 		# code...
			 		echo "<tr>";
			 		echo "<td>".$row['id']."</td>";
			 		echo "<td>".$row['name']."</td>";
			 		echo "<td>".$row['uname']."</td>";
			 		echo "<td>".$row['email']."</td>";
			 		echo "<td>".$row['ssc']."</td>";
			 		echo "<td>".$row['hsc']."</td>";
			 		echo "<td>".$row['uni']."</td>";
			 		echo "<td>".$row['fee']."</td>";
			 		echo "<td><a href=delete.php?delete=".$row['id']."><button type='button' class=
			 		'btn btn-danger'>Delete</button></a></td>";
			 		echo "</tr>";
			 	}
			?>
		</tbody>
	</table>
	<div class="page-header">
		<h1 style="text-align: center;">Enlisted University List</h1>
	</div>
	<div style="padding-left: 20px; padding-right: 10px;">
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
					echo "<td><a href=adminUpdate.php?adminup=".$view['id']."><button type='button' class=
			 		'btn btn-success'>Update</button></a></td>";
					echo "<td><a href=adminDelete.php?admindel=".$view['id']."><button type='button' class=
			 		'btn btn-danger'>Delete</button></a></td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="form-group" style="padding-left: 35%; padding-bottom: 5%;">
      <div class="col-sm-offset-2 col-sm-10">
        <a href="logout.php"><button type="submit" class="btn btn-danger" name="submit">Sign out</button></a>
      </div>
    </div>
</body>
</html>
