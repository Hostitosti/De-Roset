<?php 
require "connection.php";

if(isset($_POST["submit"]) && $_POST["firstname"] != "" && $_POST['lastname'] != "" && $_POST['email'] != "" && $_POST['password'] != "")
{
    
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname']; 
$email = $_POST['email']; 
$password = $_POST['password']; 
$date_of_birth = $_POST['date_of_birth']; 
$phonenumber = $_POST['phonenumber']; 
$address = $_POST['address']; 
$zipcode = $_POST['zipcode']; 
$city = $_POST['city']; 
$role = $_POST['role']; 

$sql = "INSERT INTO users (firstname, lastname, email, password, date_of_birth, phonenumber, address, zipcode, city, role)
VALUES ('$firstname', '$lastname', '$email','$password','$date_of_birth','$phonenumber','$address','$zipcode','$city','Klant')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: index.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }$conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <input type="text" name="firstname" id="firstname" placeholder="firstname">
        <input type="text" name="lastname" id="lastname" placeholder="lastname">
        <input type="text" name="email" id="email" placeholder="email">
        <input type="password" name="password" id="password" placeholder="">
        <input type="date" name="date_of_birth" id="date_of_birth" placeholder="">
        <input type="text" name="phonenumber" id="phonenumber" placeholder="06123456789">
        <input type="text" name="address" id="address" placeholder="address">
        <input type="text" name="zipcode" id="zipcode" placeholder="zipcode">
        <input type="text" name="city" id="city" placeholder="city">
        <button type="submit" name="submit">register</button>
    </form>
</body>
</html>