<?php

include 'header.php';
include 'database.php';

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['username'])) {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password = password_hash($password1, PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $query = "insert into users (first_name, last_name, email, username, password, role) values ('$firstname', '$lastname', '$email', '$username', '$password', '$role')";

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
