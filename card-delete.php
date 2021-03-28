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

if (isset($_POST['delete'])) {
    
    $cardId = $_POST['cardId'];
    $query = "delete from giftcard where cardId='$cardId'";

    $result = $conn->query($query);
    if(!$result) die ($conn->error);

    header("Location: card-list.php");
}

$conn->close();

?>