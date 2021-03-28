<?php

include 'header.php';
include 'account-navbar.php';
include 'database.php';

$page_roles = array('admin');
if(isset($_SESSION['person'])){
    $user = $_SESSION['person'];
    $username = $user->username;
    $user_roles = $user->getRoles();
    $found=0;
    foreach($user_roles as $urole) {
        foreach($page_roles as $prole) {
            if($urole==$prole)$found=1;
        }
    }
    if($found==1) {
        echo "Welcome $username to the card admin page";
    }
}

echo <<<_END
        <form method='post' action='card-add.php'>
            <pre>
                Card Name: <input type='text' name='cardName'>
                Card Type: <input type='text' name='cardType'>
                Card Value: <input type='decimal' name='cardValue'>
                Points: <input type='decimal' name='points'>
                <input type='submit' value='Add Record'>
            </pre>
        </form>
_END;

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
    header("Location: card-add.php");
}

$conn->close();

?>
