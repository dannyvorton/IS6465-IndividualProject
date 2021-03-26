<?php

include 'header.php';
include 'account-navbar.php';
include 'database.php';

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_GET['cardId'])) {

$isbn = $_GET['cardId'];

$query = "select * from giftcard where cardId=$cardid";

$result = $conn->query($query);
if(!$result) die ($conn->error);

$rows = $result->num_rows;

for ($j=0; $j<$rows; ++$j) {
//    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $cardname = $row['cardName'];
    $checked='';
    if($available==1) $checked='checked';

    $category = $row['category'];
    $A=$B=$C='';
    if($category=='Classic Fiction') $A = 'selected';
    if($category=='Non-Fiction') $B = 'selected';
    if($category=='Play') $C = 'selected';

    $genre = $row['genre'];
    $D=$E=$F='';
    if($genre=='action') $D = 'checked';
    if($genre=='classics') $E = 'checked';
    if($genre=='memoir') $F = 'checked';

    $imagepath = $row['imagepath'];

echo <<<_END

    <form action='updaterecord.php' method='post'>

<pre>

    <img src='$imagepath' width='200' height='300'>

    Author: <input type='text' name='author' value='$row[author]'>
    Title: <input type='text' name='title' value='$row[title]'>
    Year: <input type='text' name='year' value='$row[year]'>
    Available: Yes <input type='checkbox' name='available' $checked>
    ISBN: $row[isbn]
    Image Path: <input type='text' name='imagepath' value='$imagepath'>

    Category:
    <select name='category' id='category'>
        <option value='Classic Fiction' $A>Classic Fiction</option>
        <option value='Non-Fiction' $B>Non-Fiction</option>
        <option value='Play' $C>Play</option>
    </select>

    <input type="radio" id="action" name="genre" value="action" $D>Action
    <input type="radio" id="action" name="genre" value="classics" $E>Classics
    <input type="radio" id="action" name="genre" value="memoir" $F>Memoir

</pre>

        <input type='hidden' name='update' value='yes'>
        <input type='hidden' name='isbn' value='$row[isbn]'>
        <input type='submit' value='UPDATE RECORD'>
    </form>

_END;
}
}

if (isset($_POST['update'])) {
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $year = $_POST['year'];

    $available=0;
    if(isset($_POST['available'])) $available=1;

    $genre = $_POST['genre'];
    $imagepath = $_POST['imagepath'];

    $query = "UPDATE classics2 set author='$author', title='$title', category='$category', year='$year', available=$available, genre='$genre', imagepath='$imagepath' where isbn=$isbn";

    $result = $conn->query($query);
    if(!$result) die ($conn->error);

    header("Location: card-list-admin.php");
}

$conn->close();

?>