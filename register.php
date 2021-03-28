<?php

include 'header.php'

?>

<!DOCTYPE html>
<html> 
	<head>
		<title>An Example Form</title>
        <script type='text/javascript' src='register-validate.js'></script>
        <script>
            function validate(form) {
                var 
				fail = validateFirstName(form.firstname.value)
				fail += validateLastName(form.lastname.value)
				fail += validateEmail(form.email.value)
				fail += validateUsername(form.username.value)
                fail += validatePassword1(form.password1.value)
                fail += validatePassword2(form.password2.value)
				fail += validate_role(form.role.value)
                if(form.password1.value!="")
                    fail += comparePasswords(form.password1.value, form.password2.value)
                
                if (fail == "") return true
                else {alert (fail); return false}
            }
        </script>
	</head>
	
	<body> 
		<table class="register.php" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
			<th colspan="2" align="center"> SIGNUP</th>
			<form method="post" action="user-add.php" onsubmit="return validate(this)">
				<tr><td>Your First Name</td>
				<td><input type="text" name="first_name"></td></tr>
				<tr><td>Your Last Name</td>
				<td><input type="text" name="last_name"></td></tr>
				<tr><td>Your email</td>
			  	<td><input type="text" name="email"></td></tr>
			 	<tr><td>Your username</td>
			  	<td><input type="text" name="username"></td></tr>
			 	<tr><td>Your password</td>
			 	<td><input type="password" name="password1"></td></tr>
			 	<tr><td>Please confirm your password</td>
			 	<td><input type="password"  name="password2"></td></tr>
				<tr><td>Your Role</td>
				<td><input type="radio" name="role" value="cust">Customer</td>
				<td><input type="radio" name="role" value="admin">Administrator</td></tr>
			 <tr><td colspan="2" align="center"><input type="submit" value="SIGN UP"></td></tr>
		    </form>
		</table>
	</body>
</html>
