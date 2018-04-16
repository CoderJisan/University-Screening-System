<?php
session_start();
include "connection.php";
if ($_SESSION['adminview']) {
	# code...
	if ($conn) {
	# code...
		if (isset($_GET['admindel'])) {
			$id = $_GET['admindel'];
		// $sql = "";
			$sql = mysqli_query($conn, "DELETE FROM university WHERE id = $id");
			if($sql){
				header("location: adminview.php");
			}else
			{
				header("location: adminview.php");
			}
		}
	}
	else{
		header("location: index.php");
	}
}
else{
		header("location: adminview.php");
	}
?>