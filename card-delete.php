<?php

include 'header.php';
include 'navbar.php';
include 'database.php';

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "select * from gift_card";

$result = $conn->query($query);
if(!$result) die ($conn->error);

$rows = $result->num_rows;

for ($j=0; $j<$rows; ++$j) {
//    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
<pre>
    Card Name: <a href='card-details.php?card_id=$row[card_id]'>$row[card_name]</a>
    Card Type: $row[card_type]
    Card Value: $row[card_value]
    Points: $row[points]
</pre>

<form action='delete-card.php' method='post'>
    <input type='hidden' name='delete' value='yes'>
    <input type='hidden' name='card_id' value=$row[card_id]>
    <input type='hidden' name='card_name' value='$row[card_name]'>
    <input type='submit' value='DELETE RECORD'>
</form>

_END;

}

$conn->close();

?>
