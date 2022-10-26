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
    <link href='https://fonts.googleapis.com/css?family=Averia Sans Libre' rel='stylesheet'>
</head>
<body>
    <h1>Registreer</h1>
    <form action="" method="post" class="form_register">
        <div>
            <label for="firstname">Voornaam</label>
            <input type="text" name="firstname" id="firstname" placeholder="firstname">
        </div>
        <div>
            <label for="lastname">Achternaam</label>
            <input type="text" name="lastname" id="lastname" placeholder="lastname">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="email">
        </div>
        <div>
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password" placeholder="">
        </div>
        <div>
            <label for="date_of_birth">Geboortedatum</label>
            <input type="date" name="date_of_birth" id="date_of_birth" placeholder="">
        </div>
        <div>
            <label for="phonenumber">Telefoonnummer</label>
            <input type="text" name="phonenumber" id="phonenumber" placeholder="06123456789">
        </div>
        <div>
            <label for="address">Adres</label>
            <input type="text" name="address" id="address" placeholder="address">
        </div>
        <div>
            <label for="zipcode">Zipcode</label>
            <input type="text" name="zipcode" id="zipcode" placeholder="zipcode">
        </div>
        <div>
            <label for="city">Stad</label>
            <input type="text" name="city" id="city" placeholder="city">
        </div>
        <button type="submit" name="submit" class="button-4">register</button>
        <a href="" onclick="history.back()">Terug</a>
    </form>
</body>
</html>