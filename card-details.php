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
    Card Name: $row[card_name]
    Card Type: $row[card_type]
    Card Value: $row[card_value]
    Points: $row[points]
</pre>

_END;
}

?>
