<?php 
require "connection.php";
require "session.php";

$id = isset($_GET['id']) ? $_GET['id'] : '';
$result = $conn->query("SELECT * FROM users where id='$id'");
$user = $result->fetch_assoc();

if(isset($_POST["submit"]) && $_POST["firstname"] != "" && $_POST['lastname'] != "" && $_POST['email'] != "" && $_POST['password'] != "")
{
    
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname']; 
$email = $_POST['email']; 
$password = $_POST['password']; 
$date_of_birth = $_POST['date_of_birth']; 
$phonenumber = $_POST['phonenumber']; 
$address = $_POST['address']; 
$zipcode = $_POST['zipcode']; 
$city = $_POST['city']; 
$role = $_POST['role']; 

$sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password', date_of_birth = '$date_of_birth',
 phonenumber = '$phonenumber', address = '$address', zipcode = '$zipcode', city = '$city', role ='$role' WHERE id = '$id'";

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
    <meta name="description" content="Edit user page">
    <title>Edit user</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Averia Sans Libre' rel='stylesheet'>
</head>
<body>
<form action="" method="post">
        <input type="text" name="firstname" id="firstname" value="<?php echo $user['firstname'] ?>">
        <input type="text" name="lastname" id="lastname" value="<?php echo $user['lastname'] ?>">
        <input type="text" name="email" id="email" value="<?php echo $user['email'] ?>">
        <input type="password" name="password" id="password" value="<?php echo $user['password'] ?>">
        <input type="date" name="date_of_birth" id="date_of_birth" value="<?php echo $user['date_of_birth'] ?>">
        <input type="text" name="phonenumber" id="phonenumber" value="<?php echo $user['phonenumber'] ?>">
        <input type="text" name="address" id="address" value="<?php echo $user['address'] ?>">
        <input type="text" name="zipcode" id="zipcode" value="<?php echo $user['zipcode'] ?>">
        <input type="text" name="city" id="city" value="<?php echo $user['city'] ?>">
        <input type="hidden" name="role" id="role" value="<?php echo $user['role'] ?>">
        <button type="submit" name="submit">Edit</button>
    </form>
    <a href="delete_user.php?id=<?php echo $_SESSION['id']?>">Delete user</a>
</body>
</html>