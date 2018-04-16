<?php
session_start();
include "connection.php";
if ($_SESSION['admin']) {
	# code...
	if ($conn) {
	# code...
		if (isset($_GET['delete'])) {
			$id = $_GET['delete'];
		// $sql = "";
			$sql = mysqli_query($conn, "DELETE FROM users WHERE id = $id");
			if($sql){
				header("location: adminview.php");
			}else
			{
				header("location: admin.php");
			}
		}
	}
	else{
		header("location: index.php");
	}
}
else{
		header("location: admin.php");
	}
?>