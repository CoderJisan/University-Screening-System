<?php
session_start();
if (isset($_SESSION['use'])) {
	# code...
	header("location: login.php");
}
else{
	include_once('connection.php');
	if (isset($_POST['submit'])) { 
		$name = $_POST['uname'];
		$pass = $_POST['pass'];
		$result = ("select * FROM users WHERE uname = '$name' and password = '$pass' ") or die();
		$search_result=mysqli_query($conn, $result);
		if ($search_result->num_rows > 0) {
    		# code...
			$_SESSION['use'] = $name;
			header("location: view.php");
		}else{
			header("location: login.php");
		}
	}
}
mysqli_close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
<!-- 	<meta http-equiv="REFRESH" content="0;url=http://localhost:8888/University%20Screening%20System/login.php"> -->
</head>
<body>
	<?php
	include('head.php');
	?>
	<h3 style="padding-left: 40%; padding-bottom: 20px; font-size: 50px;">Student Login</h3>

	<form method="post" name="login" style="padding-top: 150px; padding-left: 25%;">
		<div class="form-group">
			<label for="exampleInputEmail1">Email address/User Name</label>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email/User name" name="uname" style="width: 30%;" required>
			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off" style="width: 30%;" name="pass" required>
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1">Check me out</label>
		</div>
		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
	</form>

</body>
</html>