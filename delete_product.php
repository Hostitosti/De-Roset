<?php 
require "connection.php";
require "session.php";
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "DELETE FROM products WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("location:javascript://history.go(-2)");
 } else {
     echo "Error" . $conn->error;
 }

  exit();
?>