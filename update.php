<?php 
session_start();
include "connection.php";
if ($_SESSION['use']) {
        # code...
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    // echo $id;
        //     // $update = true;
    if (isset($_POST['save'])) {
      $fname = $_POST['fullname'];
      $uname = $_POST['uname'];
      $email = $_POST['uemail'];
      $password = $_POST['upass'];
      $phone = $_POST['pnumber'];
      $sgpa = $_POST['sgpa'];
      $hgpa = $_POST['hgpa'];
      $uni = $_POST['prefuni'];
      $fee = $_POST['fee'];

      $try =  mysqli_query($conn, "UPDATE users SET  name = '$fname', uname = '$uname', email = '$email', phone = '$phone', ssc = '$sgpa', hsc = '$hgpa', uni = '$uni', fee = '$fee' WHERE id=$id");
      $_SESSION['message'] = "Address updated!"; 
      if (!$try) {
        # code...
        header('location: view.php');
      }
    }
    else{

    }
  }


}
else{
  header("location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  include 'head.php';
  ?>
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
        <input type="text" class="form-control" id="inputPrefUni" placeholder="Preferred" name="prefuni" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPrefferedFee" class="col-sm-2 col-form-label">Preferred Tuition Fee: </label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputFee" placeholder="Preferred Tuition Fee" name="fee" required>
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-6 col-md-6">
        <button type="submit" class="btn btn-default btn-success" name="save">Save</button>
      </div>
    </div>
  </form>
  <div>
    <div class="col-sm-offset-2 col-sm-6"  style="padding-bottom: 20px; padding-top: 30px;">
      <a href="view.php"><button class="btn btn-default btn-warning">Back</button></a>
    </div>
  </div>

  <div class="form-group" style="padding-left: 30%;"> 
    <div class="col-sm-offset-2 col-sm-10">
      <a href="logout.php"><button type="submit" class="btn btn-default btn-danger" name="submit">Log Out</button>
      </div>
    </div>
<!--   <?php
   // include('footer.php');
?> -->
</body>
</html>