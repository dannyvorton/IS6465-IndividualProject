<?php

session_start();

if($_SESSION['username']) {
    $username = $_SESSION['username'];

    destroy_session_and_data();

    echo "Welcome back $username <br>";
} else {
    echo "Username is not in the session<br>";
}

function destroy_session_and_data() {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
}

?>
