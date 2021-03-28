<?php

include 'header.php';
include 'account-navbar.php';
include 'database.php';

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['delete'])) {
    
    $cardname = $_POST['cardName'];
    $query = "DELETE from giftcard where cardName='$cardname'";

    $result = $conn->query($query);
    if(!$result) die ($conn->error);

    header("Location: card-delete.php");
}

$conn->close();

?>