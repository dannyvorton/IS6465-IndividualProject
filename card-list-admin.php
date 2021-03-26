<?php

include 'header.php';
include 'account-navbar.php';
include 'database.php';

$page_roles = array('admin');

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "select * from giftcard";

$result = $conn->query($query);
if(!$result) die ($conn->error);

$rows = $result->num_rows;

for ($j=0; $j<$rows; ++$j) {
//    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
<pre>
    Card Name: <a href='card-details.php?cardId=$row[cardId]'>$row[cardName]</a>
    Card Type: $row[cardType]
    Card Value: $row[cardValue]
    Points: $row[points]
</pre>

<form action='card-delete.php' method='post'>
    <input type='hidden' name='delete' value='yes'>
    <input type='hidden' name='cardId' value=$row[cardId]>
    <input type='hidden' name='cardName' value='$row[cardName]'>
    <input type='submit' value='DELETE RECORD'>
</form>

_END;

}

$conn->close();

?>
