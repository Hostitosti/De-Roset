<?php 
require "connection.php";
require "session.php";

$id = isset($_GET['id']) ? $_GET['id'] : '';
$result = $conn->query("SELECT * FROM orders where id='$id'");
$order = $result->fetch_assoc();

if(isset($_POST["submit"]) && $_POST["name"] != "")
{

if($order['isDelivery'] == 1){
    $delivery = $_POST['orderDateTime'];
    $pickup = '';
} else if ($order['isDelivery'] == 0){
    $pickup = $_POST['orderDateTime'];
    $delivery = '';
}
    
$name = $_POST['name']; 
$address = $_POST['address'];
$postalcode = $_POST['postalcode'];
$place = $_POST['place'];
$phonenumber = $_POST['phonenumber'];

$isReceived = $_POST['isReceived'];


$sql = "UPDATE orders SET pickup = '$pickup', delivery = '$delivery', isReceived = '$isReceived', name = '$name', address = '$address', postalcode = '$postalcode',
 place = '$place', phonenumber = '$phonenumber' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: worker_page.php");
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
    <meta name="description" content="Edit order page">
    <title>Edit order</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Averia Sans Libre' rel='stylesheet'>
</head>
<body>
<form action="" method="POST" class="winkelmandje" style="width: 50%;">
    <label for="name">Naam</label>
        <input type="text" value="<?php echo $order['name'] ?>" name="name" id="">
    <label for="address">Adres</label>
        <input type="text" value="<?php echo $order['address'] ?>" name="address" id="">
    <label for="postalcode">postalcode</label>
        <input type="text" value="<?php echo $order['postalcode'] ?>" name="postalcode" id="">
    <label for="place">Plaats</label>
        <input type="text" name="place" value="<?php echo $order['place'] ?>" id="">
    <label for="phonenumber">Telefoonnummer</label>
        <input type="text" value="<?php echo $order['phonenumber'] ?>" name="phonenumber" id="">

        <label for="isRecieved">Is ontvangen</label>
    <select name="isReceived" id="isReceived">
    <?php if($order['isReceived'] != 0){?>
<option value="1">ja</option>
<option value="0">nee</option>
<?php } else {
?> <option value="0">nee</option>
    <option value="1">ja</option>
    <?php } ?>
</select>

    <label for="pickup">Afhalen of Bezorging datum en tijd</label>
        <input type="datetime-local" value="<?php if($order['isDelivery'] == 1){
            echo $order['delivery']; 
        }
        else if ($order['isDelivery'] == 0){
            echo $order['pickup']; 
        } ?>" name="orderDateTime" id="">

    <button type="submit" name="submit" class="button-4">Edit</button>
</form>
</body>
</html>