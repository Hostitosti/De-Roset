<?php 
require "connection.php";
require "session.php";

if(isset($_POST["submit"]) && $_POST["name"] != "")
{
    
$name = $_POST['name']; 
$price_per_kg = $_POST['price_per_kg']; 
$is_flavor_of_week = $_POST['is_flavor_of_week']; 
$category = $_POST['category']; 
$image_link = $_POST['image_link']; 

$sql = "INSERT INTO products (name, price_per_kg, is_flavor_of_week, category, image_link)
VALUES ('$name','$price_per_kg','$is_flavor_of_week','$category','$image_link')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: bestellen.php");
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
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" id="name" placeholder="name">
        <input type="text" name="price_per_kg" id="price_per_kg" placeholder="price_per_kg">
        <label for="is_flavor_of_week">is flavor of the week</label>
        <input type="checkbox" name="is_flavor_of_week" id="is_flavor_of_week">
        <select name="category" id="category">
            <option value="ijs">ijs</option>
            <option value="eten">eten</option>
        </select>
        <input type="text" name="image_link" id="image_link" placeholder="image link">
        <button type="submit" name="submit">add</button>
    </form>
</body>
</html>