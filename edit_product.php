<?php 
require "connection.php";
require "session.php";

$id = isset($_GET['id']) ? $_GET['id'] : '';
$result = $conn->query("SELECT * FROM products where id='$id'");
$product = $result->fetch_assoc();

if(isset($_POST["submit"]) && $_POST["name"] != "" && $_POST['price_per_kg'] != "" && $_POST['category'] != "")
{
    
$name = $_POST['name']; 
$price_per_kg = $_POST['price_per_kg'];
$is_flavor_of_week = $_POST['is_flavor_of_week'];
$category = $_POST['category'];
$image_link = $_POST['image_link'];



$sql = "UPDATE products SET name = '$name', price_per_kg = '$price_per_kg', is_flavor_of_week = '$is_flavor_of_week', category = '$category' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: index.php");
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
    <title>Edit user</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="post">
<input type="text" name="name" id="name" placeholder="name" value="<?php echo $product['name'] ?>">
        <input type="text" name="price_per_kg" id="price_per_kg" placeholder="price_per_kg" value="<?php echo $product['price_per_kg'] ?>">
        <label for="is_flavor_of_week">is flavor of the week</label>
        <input type="checkbox" name="is_flavor_of_week" id="is_flavor_of_week" value="<?php echo $product['is_flavor_of_week'] ?>">
        <select name="category" id="category">
            <option value="<?php echo $product['category'] ?>"><?php echo $product['category'] ?></option>
            <option value="ijs">ijs</option>
            <option value="eten">eten</option>
        </select>
        <input type="text" name="image_link" id="image_link" value="<?php echo $product['image_link'] ?>">
        <button type="submit" name="submit">Edit</button>
    </form>
    <a href="delete_product.php?id=<?php echo $product['id']?>">Delete product</a>
</body>
</html>