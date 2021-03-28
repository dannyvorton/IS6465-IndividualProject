<?php

include 'header.php';
include 'navbar.php';
include 'database.php';

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['delete'])) {
    
    $cardname = $_POST['card_name'];
    $query = "delete from gift_card where card_name='$cardname'";

    $result = $conn->query($query);
    if(!$result) die ($conn->error);

    header("Location: card-delete.php");
}

$conn->close();

?>
