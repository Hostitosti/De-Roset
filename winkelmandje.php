<?php 
require "connection.php";
require "session.php";

$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';

if(isset($_POST["submit"]) && $_POST["orderDateTime"] != "" && $product_id != "")
{

if(isset($_SESSION['id'])){ 
$user_id = $_SESSION['id'];
}
else {
    $user_id = '';
}


if ($_POST['typeBezorging'] == "afhalen"){
    $isDelivery = 0;
    $pickup = $_POST["orderDateTime"];
    $delivery = "";
} elseif ($_POST['typeBezorging'] == "bezorgen") {
    $isDelivery = 1;
    $delivery = $_POST["orderDateTime"];
    $pickup = "";
}

if ($_POST['name'] != "" && $_POST['address'] != "" && $_POST['postalcode'] != "" && $_POST['place'] != "" && $_POST['phonenumber'] != ""){
    $name = $_POST['name']; 
    $address = $_POST['address']; 
    $postalcode = $_POST['postalcode']; 
    $place = $_POST['place'];
    $phonenumber = $_POST['phonenumber']; 
} elseif (isset($_SESSION['id'])){
    $sessionID = $_SESSION['id'];
    $result = $conn->query("SELECT * FROM users where id='$sessionID'");
    $user = $result->fetch_assoc();
    $name = $user['firstname'];
    $address = $user['address']; 
    $postalcode = $user['zipcode']; 
    $place = $user['city'];
    $phonenumber = $user['phonenumber']; 
}
else {
    echo "<script>alert('Voer uw gegevens in')</script>";
}



$sql = "INSERT INTO orders (user_id, product_id, pickup, delivery, isDelivery, name, address, postalcode, place, phonenumber)
VALUES ('$user_id','$product_id','$pickup','$delivery','$isDelivery','$name','$address','$postalcode','$place','$phonenumber')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: index.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }$conn->close();
}
else if(isset($_POST["submit"])) {
    echo "<script>alert('Selecteer A.U.B. een product of vul een datum in')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shopping cart">
    <title>winkelmandje</title>
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
                       <img src="images/<?php echo $product['image_link']; ?>" alt="" width="" height="">
                    <?php mysqli_free_result($result);
                }?>
            <a class="button-1" href="#">Bestel</a>
        </div>
                
        <div class="grid-item grid-item4 winkelmandje">
            <div>
                <h1>Winkelmandje</h1>
            </div>
            <div>
                <form action="" method="POST" class="winkelmandje">
                    <label for="afhalen">Afhalen</label>
                        <input type="radio" name="typeBezorging" value="afhalen" id="" checked>
                    <label for="bezorgen">Bezorgen</label>
                        <input type="radio" name="typeBezorging" value="bezorgen" id="">


                    <label for="name">Naam</label>
                        <input type="text" name="name" id="">
                    <label for="address">Adres</label>
                        <input type="text" name="address" id="">
                    <label for="postalcode">postalcode</label>
                        <input type="text" name="postalcode" id="">
                    <label for="place">Plaats</label>
                        <input type="text" name="place" id="">
                    <label for="phonenumber">Telefoonnummer</label>
                        <input type="text" name="phonenumber" id="">

                    <label for="retouraddress">Retouradres hetzelfde als Afleveradres</label>
                    <input type="checkbox" name="retouraddress" id="">

                    <label for="pickup">Afhalen of Bezorging datum en tijd</label>
                        <input type="datetime-local" name="orderDateTime" id="">

                    <button type="submit" name="submit" class="button-4">Bestel</button>
                </form>
                <p>(Bestellen kost tussen de 5 en 10 euro)</p>
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
                        <img src="images/<?php echo $row['image_link']; ?>" alt="" width="" height="">
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