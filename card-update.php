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

if (isset($_GET['userName'])) {

$isbn = $_GET['userName'];

$query = "SELECT * from giftcard where userName=$username";

$result = $conn->query($query);
if(!$result) die ($conn->error);

$rows = $result->num_rows;

//for ($j=0; $j<$rows; ++$j) {
//    $result->data_seek($j);
//    $row = $result->fetch_array(MYSQLI_ASSOC);
//    $available = $row['available'];
//    $checked='';
//    if($available==1) $checked='checked';

//    $category = $row['category'];
//    $A=$B=$C='';
//    if($category=='Classic Fiction') $A = 'selected';
//    if($category=='Non-Fiction') $B = 'selected';
//    if($category=='Play') $C = 'selected';

//    $genre = $row['genre'];
//    $D=$E=$F='';
//    if($genre=='action') $D = 'checked';
//    if($genre=='classics') $E = 'checked';
//    if($genre=='memoir') $F = 'checked';

//    $imagepath = $row['imagepath'];

echo <<<_END

    <form action='card-update.php' method='post'>

<pre>

    Card Name: <input type='text' name='cardName' value='$row[cardName]'>
    Card Type: <input type='text' name='cardType' value='$row[cardType]'>
    Card Value: <input type='text' name='cardValue' value='$row[cardValue]'>
    Points: <input type='text' name='points' value='$row[points]'>

</pre>

        <input type='hidden' name='update' value='yes'>
        <input type='hidden' name='cardName' value='$row[cardName]'>
        <input type='submit' value='UPDATE RECORD'>
    </form>

_END;
}
//}

if (isset($_POST['cardName'])) {
    $cardname = $_POST['cardName'];
    $cardtype = $_POST['cardType'];
    $cardvalue = $_POST['cardValue'];
    $points = $_POST['points'];

    $available=0;
    if(isset($_POST['available'])) $available=1;

    $query = "UPDATE giftcard set cardName='$cardname', cardType='$cardtype', cardValue='$cardvalue', points='$points' where cardName=$cardname";

    $result = $conn->query($query);
    if(!$result) die ($conn->error);

    header("Location: card-list.php");
}

$conn->close();

?>