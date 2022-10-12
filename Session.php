<?php 
session_start();
if(isset($_SESSION ['email'])){
    $email = $_SESSION['email'];
    $select = "SELECT * from users where email='".$email."'";
    $result = mysqli_query($conn,$select)  or die( mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['id'] = $row['id'];
}
