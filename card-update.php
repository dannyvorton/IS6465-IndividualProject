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

_END;
}

echo <<<_END
        <form method='post' action='card-update-admin.php'>
            <pre>
                Card Name: <input type='text' name='cardName' value=$row[cardName]>
                Card Type: <input type='text' name='cardType' value=$row[cardType]>
                Card Value: <input type='decimal' name='cardValue' value=$row[cardValue]>
                Points: <input type='decimal' name='points' value=$row[points]>
                <input type='submit' value='Update Record'>
            </pre>
        </form>
_END;


?>