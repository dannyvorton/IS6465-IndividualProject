<?php

include 'header.php';
include 'database.php';

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['userName'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $role = $_POST['role'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "insert into users (firstName, lastName, email, userName, password, role) values ('$firstName', '$lastName', '$email', '$userName', '$password', '$role')";

    $conn->query($query);
    if(!result) die ($conn->error);
    header("Location: user-add.php");
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
