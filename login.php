<?php 
require "connection.php";

session_start();

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = mysqli_query($conn, "SELECT count(*) as total from users where email='".$email."' and password='".$password."'") or die(mysqli_error($conn));

    $row = mysqli_fetch_array($sql);
    if($row['total'] > 0){
        $id = $row['id'];
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        
        header("location: index.php");
        die;
    }
    else
    {
        echo "<script>alert('gebruikersnaam en wachtwoord zijn incorrect')</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <input type="email" name="email" id="email" placeholder="placeholder@email.com">
        <input type="password" name="password" id="password" placeholder="">
        <button type="submit" name="submit">Login</button>
    </form>
    <a href="register.php">Geen acount? Maak een gratis account aan!</a> 
</body>
</html>