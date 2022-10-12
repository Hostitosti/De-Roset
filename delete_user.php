<?php 
require "connection.php";
require "session.php";
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "DELETE FROM users WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: logout.php");
 } else {
     echo "Error" . $conn->error;
 }

  exit();
?>