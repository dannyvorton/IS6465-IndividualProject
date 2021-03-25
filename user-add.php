<?php

include 'header.php';
include 'database.php';

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
if(isset($_POST['userId'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT into users (firstName, lastName, email, userName, password) values ('$firstName', '$lastName', '$email', '$userName', '$password')";

    $conn->query($query);
    if(!result) die ($conn->error);
    header("Location: login.php");
}

echo <<<_END
<div>Thank you for registering!</div>
<br>
<a href="login.php">
    <button type="button">Sign In</button>
</a>
_END;

$conn->close();

?>
