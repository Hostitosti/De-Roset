<?php 
require "connection.php";
include "session.php";

if(isset($_SESSION['id'])){
    if($_SESSION['role'] == 'Medewerker') {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="worker page">
    <title>Medewerker pagina</title>
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
                    <p><?php echo $product['name']; ?></p>
                       <img class="" src="images/<?php echo $product['image_link']; ?>" alt="" width="" height="">
                    <?php mysqli_free_result($result);
                }?>
            <a class="button-1" href="#">Bestel</a>
        </div>
                
        <div class="grid-item grid-item4 flex " style="padding: 2rem;">
        <div class="load" >
                
                <h2>Orders</h2>
                <table class="table">
                    <thead>
                        <tr >
                        <th scope="col">ID</th>
                        <th scope="col">User</th>
                        <th scope="col">Product</th>
                        <th scope="col">Afhaal datum</th>
                        <th scope="col">Bezorg datum</th>
                        <th scope="col">Is Ontvangen</th>
                        <th scope="col">Name</th>
                        <th scope="col">Adres</th>
                        <th scope="col">Postcode</th>
                        <th scope="col">Plaats</th>
                        <th scope="col">Telefoonnummer</th>
                        </tr>
                    </thead>
                    <tbody >
                    <?php
                $sql = "SELECT * From orders";
                if ( $result = mysqli_query($conn,$sql) )
                {
                  
                  while ($row=mysqli_fetch_assoc($result))
                    { ?>
                                <tr>
                                <th scope="row"><?php echo $row['id']; ?></th>
                                <th scope="row"><?php echo $row['user_id']; ?></th>
                                <th scope="row"><?php echo $row['product_id']; ?></th>
                                
                                <td><?php echo $row['pickup']; ?></td>
                                <td><?php echo $row['delivery']; ?></td>
                                <td><?php if($row['isReceived'] == 0){
                                    echo "nee";
                                } else { echo "ja"; } ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['postalcode']; ?></td>
                                <td><?php echo $row['place']; ?></td>
                                <td><?php echo $row['phonenumber']; ?></td>
                                <td><a href="delete_order.php?id=<?php echo $row['id'] ?>"  class="button-3">Annuleer</a></td>
                                <td><a href="edit_order.php?id=<?php echo $row['id'] ?>" class="button-2">Edit</a></td>
                                </tr>
                                
                                <?php }
                    
                    mysqli_free_result($result);
                } ?>
                    </tbody>
                </table>
            </div>
        <div class="load">
                
            <h2>Producten</h2>
            <table class="table">
                <thead>
                    <tr >
                    <th scope="col">ID</th>
                    <th scope="col">Plaatje</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Prijs per KG</th>
                    <th scope="col">Is Smaak van de week</th>
                    <th scope="col">categorie</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            $sql = "SELECT * From products";
            if ( $result = mysqli_query($conn,$sql) )
            {
              
              while ($row=mysqli_fetch_assoc($result))
                { ?>
                            <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><img src="images/<?php echo $row['image_link']; ?>" alt="Plaatje product" width="50px" height="50px"></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price_per_kg']; ?></td>
                            <td><?php if($row['is_flavor_of_week'] == 0){
                                echo "nee";
                            } else { echo "ja"; } ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><a href="delete_product.php?id=<?php echo $row['id'] ?>"  class="button-3">Delete</a></td>
                            <td><a href="edit_product.php?id=<?php echo $row['id'] ?>" class="button-2">Edit</a></td>
                            </tr>
                            
                            <?php }
                
                mysqli_free_result($result);
            } ?>
                <tr>
                    <td></td>
                    <td><a class="button-4" href="add_product.php">Add product +</a></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="load">
            <h2>Gebruikers</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Voornaam</th>
                    <th scope="col">Achternaam</th>
                    <th scope="col">Email</th>
                    <th scope="col">Wachtwoord</th>
                    <th scope="col">Geboortedatum</th>
                    <th scope="col">Telefoonnummer</th>
                    <th scope="col">Adres</th>
                    <th scope="col">Zipcode</th>
                    <th scope="col">City</th>
                    <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            $sql = "SELECT * From users";
            if ( $result = mysqli_query($conn,$sql) )
            {
              
              while ($row=mysqli_fetch_assoc($result))
                { ?>
                            <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['date_of_birth']; ?></td>
                            <td><?php echo $row['phonenumber']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['zipcode']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><a href="delete_user.php?id=<?php echo $row['id'] ?>"  class="button-3">Delete</a></td>
                            <td><a href="edit_user.php?id=<?php echo $row['id'] ?>" class="button-2">Edit</a></td>
                            </tr>
                            
                            <?php }
                
                mysqli_free_result($result);
            } ?>
                <tr>
                    <td></td>
                    <td><a class="button-4" href="register.php">Add user +</a></td>
                </tr>
                </tbody>
                </table>
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
                        <p><?php echo $row['name']; ?></p>
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
<?php }
else {
    header("location: index.php");
}} 
?>