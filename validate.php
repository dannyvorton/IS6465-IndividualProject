<?php

if (isset($_POST['username'])) {
    $firstname = fix_string($_POST['first_name']);
    $lastname = fix_string($_POST['last_name']);
    $email = fix_string($_POST['email']);
    $username = fix_string($_POST['username']);
    $password1 = fix_string($_POST['password1']);
    $password2 = fix_string($_POST['password2']);
    $role = fix_string($_POST['role']);

    $fail = validateFirstName($firstname);
    $fail = validateLastName($lastname);
    $fail = validateEmail($email);
    $fail = validateUsername($username);
    $fail = validatePassword1($password1);
    $fail = validatePassword2($password2);
    $fail = validateRole($role);
    $fail = comparePasswords($password1, $password2);

    if ($fail == "") {
        echo "Form data validated successfully<br>";
    } else {
        echo $fail. '<br>';
    }
}

//function validateFirstName($field) {
//    return ($field=="") ? "No firstname was entered <br>" : "";
//}

//function validateLastName($field) {
//    return ($field=="") ? "No lastname was entered <br>" : "";
//}

//function validateEmail($string) {
//    return ($string == "") ? "No email was entered.\n" : "";
//}

//function validateUsername($field) {
//    return ($field=="") ? "No username was entered <br>" : "";
//}

//function validatePassword1($string) {
//    return ($string == "") ? "No password1 was entered.\n" : "";
//}

//function validatePassword2($string) {
//    return ($string == "") ? "No password2 was entered.\n" : "";
//}

//function comparePasswords($pass1, $pass2) {
//    if($pass1==$pass2) return "";
//    else return "Your passwords do not match.\n";
//}

//function validateRole($string) {
//    return ($string == "") ? "No role was entered.\n" : "";
//}

//sanitization function
//function fix_string($string) {
//    if (get_magic_quotes_gpc()) $string = stripslashes($string);
//    return htmlentities($string);
//}

?>
