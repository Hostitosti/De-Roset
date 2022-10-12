<?php 
session_start();

if($_SESSION['id'] !== ''){
    $id = $_SESSION['id'];
    $select = "SELECT * from users where id='".$id."'";
    $result = mysqli_query($conn,$select)  or die( mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    $_SESSION['role'] = $row['role'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['id'] = $row['id'];
}
