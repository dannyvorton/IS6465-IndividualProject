<?php

require_once 'user.php';

$page_roles = array('admin','user');

session_start();

if($_SESSION['person']) {
    $user = $_SESSION['person'];
    $username = $user->username;
    $user_roles = $user->getRoles();

    $found=0;
    foreach ($user_roles as $urole) {
        foreach ($page_roles as $prole) {
            if ($urole==$prole) {
                $found=1;
            }
        }
    }

    if (!$found) {
        header("Location: unauthorized.php");
    } else {
        echo "Welcome back $username<br>";
    }

//    destroy_session_and_data();

//    echo "Welcome back $username <br>";
} else {
    echo "Username is not in the session<br>";
}

function destroy_session_and_data() {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
}

?>