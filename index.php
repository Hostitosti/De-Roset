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
                $product = mysqli_fetch_assoc($result); ?>
                    <h4><?php echo $product['name']; ?></h4>
                       <img class="" src="images/<?php echo $product['image_link']; ?>" alt="" width="" height="">
                    <?php mysqli_free_result($result);
                }?>
            <a class="button-1" href="bestellen.php">Bestel</a>
        </div>

        <div class="grid-item grid-item4">
            <div class="content-grid-index load">
                <div class="content-grid-item content-grid-item0"><h1>Over ons</h1></div>
                <div class="content-grid-item content-grid-item1"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga quidem, excepturi quam magni, et ipsum repudiandae eum corporis ullam placeat error eaque cum nihil assumenda nam vitae. Corporis facilis qui dicta libero pariatur. Ipsam rem, molestias, dolorum quas id doloremque error hic totam nemo sunt unde. Fuga ipsum at repudiandae.</p></div>
                <div class="content-grid-item content-grid-item2"><img class="load" src="images/vanille-ijs.jpg" alt=""></div>
                <div class="content-grid-item content-grid-item3"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus cum asperiores deleniti voluptates at expedita, nihil, cupiditate corrupti ab non vitae sapiente veniam reiciendis fugiat possimus voluptas ex architecto. Ratione atque provident, unde voluptas quo quod iure nihil cumque quasi odit incidunt quam culpa itaque nobis perferendis mollitia enim eius veniam libero consequatur saepe? Laboriosam, praesentium maiores earum cupiditate itaque voluptates asperiores. Doloremque pariatur quibusdam expedita? Accusamus mollitia enim placeat deserunt, porro voluptate illum cumque accusantium aspernatur reprehenderit laboriosam voluptates et, magni tenetur ea, quam officia libero provident vel eligendi esse. Nihil vitae ipsam perspiciatis hic, repudiandae asperiores eaque amet.</p></div>
                <div class="content-grid-item content-grid-item4"><img class="load" src="images/chocolade-ijs.jpg" alt=""></div>
                <div class="content-grid-item content-grid-item5"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam porro a autem mollitia iure quo rem inventore provident voluptatem, dolorem deleniti voluptas dolores totam nisi esse ipsum ex molestiae maiores sapiente nobis libero! Dolore ratione, fugit animi nam beatae accusantium omnis praesentium accusamus modi, debitis dolorum voluptatibus, numquam mollitia rem?</p></div>

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
                        <img class="" src="images/<?php echo $row['image_link']; ?>" alt="" width="" height="">
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
                <p>Wij bezorgen in Haarlem, Overveen en Heemstede</p>
            </div>
            <div>
                <a href="#">onze voorwaarden</a>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/05147bc226.js" crossorigin="anonymous"></script>
    </body>
</html>