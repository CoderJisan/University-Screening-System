<?php
session_start();
// $conn = mysqli_connect("localhost", "root", "root", "uss");
include "connection.php";
if (!$conn) {
  # code...
  echo "did not connect";
}

if (isset($_POST['submit'])) {
  # code...
  $fullname = $_POST['fullname'];
  $uname = $_POST['uname'];
  $uemail = $_POST['uemail'];
  $upass = $_POST['upass'];
  $pnumber = $_POST['pnumber'];
  $sgpa = $_POST['sgpa'];
  $hgpa = $_POST['hgpa'];
  $uni = $_POST['prefUni'];
  $fee = $_POST['fee'];
  $sql = mysqli_query($conn,"INSERT into users (name, uname, email, password, phone, ssc, hsc, uni, fee) VALUES('$fullname', '$uname', '$uemail', '$upass', '$pnumber', '$sgpa', '$hgpa', '$uni', '$fee')");
  if ($sql) {
    # code...
    $_SESSION['msg'] = "Registration Successful!";
    header('location: index.php');
  }
}
mysqli_close();
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>University Screening System</title>
	<meta  name="viewport" content="width= device-width">
</head>
<body style="padding-left: 10px; padding-right: 20px;">
  <?php
  include('head.php');
  ?>
  <h3 style="padding-left: 40%; padding-bottom: 20px; font-size: 50px;">Registration</h3>
  <form action="" method="post" name="reg" autocomplete="off">
    <div class="form-group row">
      <label for="inputFullName" class="col-sm-2 col-form-label">Full Name: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputFullName" placeholder="Full Name" name="fullname" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputUserName" class="col-sm-2 col-form-label">User Name: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputUserName" placeholder="User Name" name="uname" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail" class="col-sm-2 col-form-label">Email: </label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="uemail" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Password: </label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="upass" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPhoneNumber" class="col-sm-2 col-form-label">Phone Number: </label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputPhoneNumber" placeholder="Phone Number" name="pnumber" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputSSCGPA" class="col-sm-2 col-form-label">SSC GPA: </label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputSSCGPA" placeholder="SSC GPA" name="sgpa" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputHSCGPA" class="col-sm-2 col-form-label">HSC GPA: </label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputHSCGPA" placeholder="HSC GPA" name="hgpa" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPrefferedUni" class="col-sm-2 col-form-label">Preferred University: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPrefUni" placeholder="Preferred" name="prefUni" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPrefferedFee" class="col-sm-2 col-form-label">Preferred Tuition Fee: </label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputFee" placeholder="Preferred Tuition Fee" name="fee" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">Sign in</button>
      </div>
    </div>
    <label><a href="login.php">Already Registered? Click HERE!</a></label>      
  </form>
</body>
</html>