<?php

include 'header.php';
include 'navbar.php';
include 'database.php';

echo <<<_END
        <form method='post' action='card-add.php'>
            <pre>
                Card Name: <input type='text' name='card_name'>
                Card Type: <input type='text' name='card_type'>
                Card Value: <input type='decimal' name='card_value'>
                Points: <input type='decimal' name='points'>
                <input type='submit' value='Add Record'>
            </pre>
        </form>
_END;

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['card_name'])) {
//    $cardId = $_POST['cardId'];
    $cardname = $_POST['card_name'];
    $cardtype = $_POST['card_type'];
    $cardvalue = $_POST['card_value'];
    $points = $_POST['points'];

    $query = "insert into gift_card (card_name, card_type, card_value, points) values ('$cardname', '$cardtype', $cardvalue, $points)";

    $conn->query($query);
    if(!result) die ($conn->error);
    header("Location: card-add.php");
}

$conn->close();

?>
