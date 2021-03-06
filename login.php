<?php

include 'header.php';
include 'database.php';
include 'user.php';

echo <<<_END
<body>
<form method='post' action='login.php'>
    Username: <input type='text' name='username'><br>
    Password: <input type='password' name='password'>
    <input type='submit' value='Login'>
    <br>
    New User?
        <a href="register.php">Click Here to Register</a>
    <br>
</form>
</body>
</html>
_END;

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	//Get values from login screen
	$tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);
	
	//get password from DB w/ SQL
	$query = "select password from users where username = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++) {
		$result->data_seek($j); 
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	
	}
	
	//Compare passwords
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo "successful login<br>";

		$user = new User($tmp_username);

		session_start();
		$_SESSION['person'] = $user;
		
//		echo "<a href='continue.php'> Continue </a>";

		header("Location: card-list.php");

	}
	else
	{
		echo "login error<br>";
	}	
	
}

$conn->close();

//sanitization functions
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}

?>
