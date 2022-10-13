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
    <title>blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="grid-container">
        <div class="grid-item grid-item1">
            <img src="images/logo.png" alt="logo" height="150px" width="150px">
            <h2>De Roset</h2>
        </div>
        <div class="grid-item grid-item2">
            <a href="#">Over ons</a>
                <a href="#">Bestellen <i class="fa-solid fa-store"></i></a>
                    <a href="#">Blog <i class="fa-solid fa-square-rss"></i></a>
                        <a href="#">Contact <i class="fa-solid fa-phone"></i></a>
                            <a href="#">Winkelmandje <i class="fa-solid fa-cart-shopping"></i></a>
                        <?php if(isset($_SESSION['id'])){?>
                            <a href="edit_user.php?id=<?php echo $_SESSION['id'] ?>"><?php echo $_SESSION['firstname']; ?> <i class="fa-solid fa-person"></i></a>
                                <a href="logout.php">logout <i class="fa-solid fa-circle-xmark"></i></a>
                            <?php } else { ?>
                        <a href="login.php">login <i class="fa-solid fa-circle-plus"></i></a>
                    <?php } ?></div>

    <div class="grid-item grid-item3">
        <h2>Smaak van de dag</h2>
        <?php
            $sql = "SELECT image_link, name FROM products WHERE is_flavor_of_week = 1 LIMIT 1";
            if ( $result = mysqli_query($conn,$sql) ) {
                $product = mysqli_fetch_assoc($result); ?>
                    <h4><?php echo $product['name']; ?></h4>
                       <img src="images/<?php echo $product['image_link']; ?>" alt="" width="150px" height="150px">
                    <?php mysqli_free_result($result);
                }?>
            <a href="#">Bestel</a>
        </div>
                
        <div class="grid-item grid-item4 index">d</div>
        
        <div class="grid-item grid-item5">
            <h2>Populaire smaken</h2>
                <?php 
                    $sql2 = "SELECT * FROM products Limit 3";
                if ( $result = mysqli_query($conn,$sql2) )
                {
                    while ($row=mysqli_fetch_assoc($result))
                    { ?>
                        <img src="images/<?php echo $row['image_link']; ?>" alt="" width="150px" height="150px">
                        <h4><?php echo $row['name']; ?></h4>
              <?php } 
                }
            mysqli_free_result($result); 
            mysqli_close($conn);?>
        </div>
        
        <div class="grid-item grid-item6">
            <div>
                <p>ons adres</p>
                <p>...</p>
                <p>...</p>
                <p>Castricum</p>
            </div>
            <div>
                <p>Wij bezorgen in ...</p>
            </div>
            <div>
                <a href="#">onze voorwaarden</a>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/05147bc226.js" crossorigin="anonymous"></script>
    </body>
</html>