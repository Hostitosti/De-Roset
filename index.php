<?php 
require "connection.php";
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <div class="grid-container">
        <div class="grid-item grid-item1">a</div>
        <div class="grid-item grid-item2">
            <a href="login.php">login</a>
            <a href="register.php">register</a>
            <a href="logout.php">logout</a>
        <?php if(isset($_SESSION['id'])){?>
            <a href="edit_user.php?id=<?php echo $_SESSION['id'] ?>"><?php echo $_SESSION['firstname']; ?></a>
        <?php } ?></div>
        <div class="grid-item grid-item3">c</div>
        <div class="grid-item grid-item4">d</div>
        <div class="grid-item grid-item5">e</div>
        <div class="grid-item grid-item6">f</div>
    </div>
    </body>
</html>