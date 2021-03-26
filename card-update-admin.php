<?php

include 'header.php';
include 'account-navbar.php';
include 'database.php';

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_GET['cardId'])) {

$cardId = $_GET['cardId'];

$query = "select * from giftcard where cardId=$cardId";

$result = $conn->query($query);
if(!$result) die ($conn->error);

$rows = $result->num_rows;

$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

<pre>
    Card Name: $row[cardName]
    Card Type: $row[cardType]
    Card Value: $row[cardValue]
    Points: $row[points]
</pre>

<form method='post' action='card-update-admin.php'>
<pre>
    Card Name: <input type='text' name='cardName'>
    Card Type: <input type='text' name='cardType'>
    Card Value: <input type='decimal' name='cardValue'>
    Points: <input type='decimal' name='points'>
    <input type='submit' value='Update Record'>
</pre>
</form>

_END;
}

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['cardName'])) {
//    $cardId = $_POST['cardId'];
    $cardName = $_POST['cardName'];
    $cardType = $_POST['cardType'];
    $cardValue = $_POST['cardValue'];
    $points = $_POST['points'];

    $query = "insert into giftcard (cardName, cardType, cardValue, points) values ('$cardName', '$cardType', $cardValue, $points)";

    $conn->query($query);
    if(!result) die ($conn->error);
    header("Location: card-add-admin.php");
}

$conn->close();

?>
