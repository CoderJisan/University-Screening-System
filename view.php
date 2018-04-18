<?php	

session_start();
include "connection.php";
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
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("tr:even").css("background-color", "#e8e8e8");
		});
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
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
		<div class="form-group" style="padding-right: 10px;">
			<div class="input-group">
				<span class="input-group-addon">Search</span>
				<input type="text" name="search_text" id="search_text" placeholder="Search by Name/ Area/ Required GPA/ Per Credit Fee/ Qs Ranking/ Private/ Public" class="form-control" />
			</div>
		</div>
		<div id="result"></div>
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
<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetchbyname.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
</html>