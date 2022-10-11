<?php 
session_start();

$email = $_SESSION['email'];
$select = "SELECT * from users where email='".$email."'";
$result = mysqli_query($conn,$select)  or die( mysqli_error($conn));
$row = mysqli_fetch_array($result);
$_SESSION['role'] = $row['role'];
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['id'] = $row['id'];
?>