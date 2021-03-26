<?php

include 'header.php';
include 'database.php';

echo <<<_END
<main>
<div class="login">
            <h1>Login to Air Asia</h1>
            <form method="post" action="card-list.php">
                <p>
                    <input type="text" name="login" value="" placeholder="Username or Email">
                </p>
                <p>
                    <input type="password" name="password" value="" placeholder="Password">
                </p>
                <p class="remember_me">
                    <label>
                        <input type="checkbox" name="remember_me" id="remember_me">
                        Remember me on this computer
                    </label>
                </p>
                <p class="submit">
                    <input type="submit" name="commit" value="login">
                </p>
            </form>
        </div>
        <div class="login_help">
            <p>
                New User?
                <a href="register.php">Click Here to Register</a>
            </p>
        </div>
    </body>
</main>
    </html>
_END;

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['userName']) && isset($_POST['password'])) {
// Get values from login screen
    $tmp_username = mysql_entities_fix_string($conn, $_POST['userName']);
    $tmp_password = mysql_entities_fix_string($conn, $_POST['password']);

    // get password from DB w/ SQL
    $query = "select userName, password from users where userName = '$tmp_username' and password = $tmp_password";

    $result = $conn->query($query);
    if(!$result) die($conn->error);

    $rows = $result->num_rows;
    $passwordFromDB="";
    for($j=0; $j<$rows; $j++) {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $passwordFromDB = $row['password'];
    }

    // compare passwords
    if(password_verify($tmp_password, $passwordFromDB)) {
        echo "successful login<br>";
        session_start();
        $_SESSION['userName'] = $tmp_username;
        echo "<a href='continue.php'> Continue </a>";
    } else {
        echo "login error<br>";
    }

}

$conn->close();

// sanitization functions
function mysql_entities_fix_string($conn, $string) {
    return htmlentities(mysql_fix_string($conn, $string));
}

function mysql_fix_string($conn, $string) {
    $string = stripslashes($string);
    return $conn->real_escape_string($string);
}

?>
