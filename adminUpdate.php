<?php 
session_start();
include "connection.php";
if (isset($_SESSION['adminview'])) {
        # code...
  if (isset($_GET['adminup'])) {
    $id = $_GET['adminup'];
    // echo $id;
        //     // $update = true;
    if (isset($_POST['save'])) {
      $unname = $_POST['name'];
      $area = $_POST['area'];
      $gpa = $_POST['reqgpa'];
      $fee = $_POST['fee'];
      $rank = $_POST['rank'];
      $status = $_POST['status'];
      
      $try =  mysqli_query($conn, "UPDATE university SET  name = '$uniname', area = '$area', gpa = '$reqgpa', fee = '$fee', qsrank = '$rank', status = '$status' WHERE id=$id");
      $_SESSION['message'] = "Address updated!"; 
      if (!$try) {
        # code...
        header('location: adminview.php');
      }
    }
    else{

    }
  }


}
else{
  header("location: adminview.php");
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
  <form action="" method="post" name="reg" autocomplete="off" style="padding-left: 15px;padding-right: 10px;">
    <div class="form-group row">
      <label for="inputuniName" class="col-sm-2 col-form-label">University Name: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="universityName" placeholder="University Name" name="name" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputArea" class="col-sm-2 col-form-label">University Area/Location: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputArea" placeholder="University Area/Location" name="area" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputgpa" class="col-sm-2 col-form-label">Required GPA: </label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputgpa" placeholder="Required GPA" name="reqgpa" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputfee" class="col-sm-2 col-form-label">University's Per Credit Fee: </label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputfee" placeholder="Per Credit Fee" name="fee" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputrank" class="col-sm-2 col-form-label">Qs Ranking: </label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputrank" placeholder="Qs Ranking" name="rank" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputstatus" class="col-sm-2 col-form-label">Private/Public: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputstatus" placeholder="Status" name="status" required>
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-6 col-md-6">
        <button type="submit" class="btn btn-default btn-success" name="save">Save</button>
      </div>
    </div>
  </form>
  <div>
    <div class="col-sm-offset-2 col-sm-6"  style="padding-bottom: 25px; padding-top: 30px; padding-left: 25px;">
      <a href="adminview.php"><button class="btn btn-default btn-warning">Back</button></a>
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