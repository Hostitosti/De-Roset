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
    <title>Bestellen</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Averia Sans Libre' rel='stylesheet'>
</head>
<body>
    <div class="grid-container">
        <div class="grid-item grid-item1">
            <img src="images/logo.png" alt="logo" height="150px" width="150px">
            <h2>De Roset</h2>
        </div>
        <div class="grid-item grid-item2">
            <a class="button-1" href="index.php">Over ons</a>
                <a class="button-1" href="bestellen.php">Bestellen <i class="fa-solid fa-store"></i></a>
                    <a class="button-1" href="blog.php">Blog <i class="fa-solid fa-square-rss"></i></a>
                        <a class="button-1" href="contact.php">Contact <i class="fa-solid fa-phone"></i></a>
                            <a class="button-1" href="winkelmandje.php">Winkelmandje <i class="fa-solid fa-cart-shopping"></i></a>
                        <?php if(isset($_SESSION['id'])){
                        if($_SESSION['role'] == 'Medewerker') {?>
                            <a class="button-1" href="worker_page.php">Medewerker pagina</a>
                        <?php } ?>
                            <a class="button-1" href="edit_user.php?id=<?php echo $_SESSION['id'] ?>"><?php echo $_SESSION['firstname']; ?> <i class="fa-solid fa-person"></i></a>
                                <a class="button-1" href="logout.php">logout <i class="fa-solid fa-circle-xmark"></i></a>
                            <?php } else { ?>
                        <a class="button-1" href="login.php">login <i class="fa-solid fa-circle-plus"></i></a>
                    <?php } ?></div>

    <div class="grid-item grid-item3">
        <h2>Smaak van de dag</h2>
        <?php
            $sql = "SELECT image_link, name FROM products WHERE is_flavor_of_week = 1 LIMIT 1";
            if ( $result = mysqli_query($conn,$sql) ) {
                $product = mysqli_fetch_assoc($result);
                 ?>
                    <h4><?php echo $product['name']; ?></h4>
                       <img class="load" src="images/<?php echo $product['image_link']; ?>" alt="" width="" height="">
                    <?php mysqli_free_result($result);
                }?>
            <a class="button-1" href="#">Bestel</a>
        </div>
        
        <div class="grid-item grid-item4 flex">
            <div class="orderpage-container">
                
                <?php 
                    $sql3 = "SELECT * FROM products";
                if ( $result = mysqli_query($conn,$sql3) )
                {
                    while ($row=mysqli_fetch_assoc($result))
                    { ?>
                            <div class="orderpage-item orderpage-item1 load">
                                <img src="images/<?php echo $row['image_link']; ?>" alt="" width="" height="">
                                <h2><?php echo $row['name']; ?></h2>
                                <h2>€<?php echo $row['price_per_kg']; ?></h2>
                                <a class="button-1" class="orderpage-link" href="">Bestel</a>
                                <?php if(isset($_SESSION['id'])){
                                if($_SESSION['role'] == 'Medewerker') {?>
                                <a href="edit_product.php?id=<?php echo $row['id']; ?>" style="color: black;">Edit product</a>
                    <?php } 
                    } ?>
                            </div>
                            
              <?php } 
                }
            mysqli_free_result($result); ?>
            <?php if(isset($_SESSION['id'])){
                if($_SESSION['role'] == 'Medewerker') {?>
                            <a class="" href="add_product.php">
                                <div class="orderpage-item orderpage-item1 load" style="font-size: 12rem; color: black;">
                                +
                                    </div>
                                </a>
                    <?php } 
                    } ?>
            </div>
        </div>
        
        <div class="grid-item grid-item5">
            <h2>Populaire smaken</h2>
                <?php 
                    $sql2 = "SELECT * FROM products Limit 3";
                if ( $result = mysqli_query($conn,$sql2) )
                {
                    while ($row=mysqli_fetch_assoc($result))
                    { ?>
                        <img class="load" src="images/<?php echo $row['image_link']; ?>" alt="" width="" height="">
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