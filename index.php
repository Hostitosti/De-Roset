<?php 
require "connection.php";
include "session.php";

$sql = "SELECT * FROM products";
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
        <div class="grid-item grid-item1">
            <div class="logo">
                <img src="images/ijsjeTest.jpg" alt="logo" height="150px" width="150px">
            </div>
            <h2>De Roset</h2>
        </div>
        <div class="grid-item grid-item2">
            <a href="#">Over ons</a>
            <a href="#">Bestellen</a>
            <a href="#">Blog</a>
            <a href="#">Contact</a>
            <a href="#">Winkelmandje</a>
        <?php if(isset($_SESSION['id'])){?>
            <a href="edit_user.php?id=<?php echo $_SESSION['id'] ?>"><?php echo $_SESSION['firstname']; ?></a>
            <a href="logout.php">logout</a>
        <?php } else { ?>
            <a href="login.php">login</a>
        <?php } ?></div>
        <div class="grid-item grid-item3">
            <h2>Smaak van de dag</h2>
            <img src="images/ijsjeTest.jpg" alt="ijsje" width="150px" height="150px">
            <button>Bestel</button>
        </div>
        <div class="grid-item grid-item4">d</div>
        <div class="grid-item grid-item5">
            <h2>Smaak van de dag</h2>
            <img src="images/ijsjeTest.jpg" alt="ijsje" width="150px" height="150px">
            <img src="images/ijsjeTest.jpg" alt="ijsje" width="150px" height="150px">
            <img src="images/ijsjeTest.jpg" alt="ijsje" width="150px" height="150px">
        </div>
        <div class="grid-item grid-item6">f</div>
    </div>
    <script src="https://kit.fontawesome.com/05147bc226.js" crossorigin="anonymous"></script>
    </body>
</html>