<?php

include 'header.php';
include 'account-navbar.php';
include 'database.php';

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['delete'])) {
    
    $cardId = $_POST['cardId'];
    $query = "delete from giftcard where cardId='$cardId'";

    $result = $conn->query($query);
    if(!$result) die ($conn->error);

    header("Location: card-list-admin.php");
}

$conn->close();

?>