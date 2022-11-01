<?php 
require "connection.php";
require "session.php";
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "DELETE FROM orders WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: worker_page.php");
 } else {
     echo "Error" . $conn->error;
 }

  exit();
?>