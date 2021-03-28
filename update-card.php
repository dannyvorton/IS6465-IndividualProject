<?php

include 'header.php';
include 'navbar.php';
include 'database.php';

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_GET['card_id'])) {

$cardid = $_GET['card_id'];

$query = "select * from gift_card where card_id=$cardid";

$result = $conn->query($query);
if(!$result) die ($conn->error);

$rows = $result->num_rows;

$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

<pre>
    Card ID: $row[card_id]
    Card Name: $row[card_name]
    Card Type: $row[card_type]
    Card Value: $row[card_value]
    Points: $row[points]
</pre>

_END;
}

echo <<<_END
        <form method='post' action='update-card.php'>
            <pre>
                Card Name: <input type='text' name='card_name'>
                Card Type: <input type='text' name='card_type'>
                Card Value: <input type='decimal' name='card_value'>
                Points: <input type='decimal' name='points'>
                <input type='submit' value='Update Record'>
            </pre>
        </form>
_END;

if (isset($_POST['card_id'])) {
    $cardname = $_POST['card_name'];
    $cardtype = $_POST['card_type'];
    $cardvalue = $_POST['card_value'];
    $points = $_POST['points'];

    $query = "update gift_card set card_name='$cardname', card_type='$cardtype', card_value=$cardvalue, points=$points where card_id=$cardid";

    $result = $conn->query($query);
    if(!$result) die ($conn->error);

    header("Location: card-update.php");
}

$conn->close();


?>
