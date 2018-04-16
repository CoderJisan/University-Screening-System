<?php

session_start();
if (isset($_SESSION['admin'])) {
 	# code...
	header("location: admin.php");
}else{
	include_once('connection.php');
	if (isset($_POST['submit'])) { 
		// include_once('connection.php');
		$name = $_POST['adminname'];
		// $name = mysqli_real_escape_string($_POST['adminname']);
		$pass = $_POST['pass'];
		$result = ("select * FROM admin WHERE name = '$name' and pass = '$pass' ") or die();
		$search_result=mysqli_query($conn, $result);
		if ($search_result->num_rows > 0) {
    		# code...
			$_SESSION['admin']= $name;
			header("location: adminview.php");
		}
		else{
			// $_SESSION['errMsg']="Invalid ID or Password;Try Again";
			header('Location: admin.php');
		}
	}
}
mysqli_close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<?php
	include('head.php');
	?>
	<h3 style="padding-left: 40%; padding-bottom: 20px; font-size: 50px;">Admin Login</h3>
	<form class="form-horizontal" name="admin" method="post" autocomplete="off" style="padding-top: 150px;padding-left: 20%;">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Email/Name</label>
			<div class="col-sm-10" style="width: 450px;">
				<input type="text" class="form-control" id="inputEmail3" placeholder="Email/Name" name="adminname" required>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10" style="width: 450px;">
				<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pass" autocomplete="off" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						<input type="checkbox"> Remember me
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" name="submit" onclick="">Sign in</button>
			</div>
		</div>
	</form>
</body>
</html>
</html>