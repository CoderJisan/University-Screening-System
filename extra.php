<?php	

session_start();
if(!isset($_SESSION['use'])){
	header("location: login.php");
}
else{
	include "connection.php";
	$fname = "";
	$uname = $_SESSION['use'];
	$email = "";
	$phone = "";
	$sgpa = "";
	$hgpa = "";
	$uni = "";
	$fee = "";
	$search_query="SELECT * FROM users where uname = '$uname' ";
	$search_result=mysqli_query($conn, $search_query);
	if($search_result)
	{
		if(mysqli_num_rows($search_result))
		{
			while($rows = mysqli_fetch_array($search_result))
			{
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
			</tr>
		</tbody>
	</table>
	<div>
      <div class="col-sm-offset-2 col-sm-10" style="padding-left: 25%;">
        <button type="submit" class="btn btn-default" name="submit"><a href="logout.php">Log out</a></button>
      </div>
    </div>
</body>
</html>