<?php

if (isset($_POST['username'])) {
    $firstname = fix_string($_POST['firstname']);
    $lastname = fix_string($_POST['lastname']);
    $email = fix_string($_POST['email']);
    $username = fix_string($_POST['username']);
    $password1 = fix_string($_POST['password1']);
    $password2 = fix_string($_POST['password2']);
    $role = fix_string($_POST['role']);

    $fail = validate_firstname($firstname);
    $fail = validate_lastname($lastname);
    $fail = validate_email($email);
    $fail = validate_username($username);
    $fail = validate_password1($password1);
    $fail = validate_password2($password2);
    $fail = compare_password($password1, $password2);
    $fail = validate_role($role);

    if ($fail == "") {
        echo "Form data validated successfully<br>";
    } else {
        echo $fail. '<br>';
    }
}

function validate_firstname($string) {
    return ($string=="") ? "No first name was entered <br>" : "";
}

function validate_lastname($string) {
    return ($string=="") ? "No last name was entered <br>" : "";
}

function validate_email($string) {
    return ($string == "") ? "No email was entered.\n" : "";
}

function validate_username($field) {
    return ($field=="") ? "No username was entered <br>" : "";
}

function validate_password1($string) {
    return ($string == "") ? "No password1 was entered.\n" : "";
}

function validate_password2($string) {
    return ($string == "") ? "No password2 was entered.\n" : "";
}

function compare_password($pass1, $pass2) {
    if($pass1==$pass2) return "";
    else return "Your passwords do not match.\n";
}

function validate_role($string) {
    return ($string=="") ? "No role was entered.\n" : "";
}

//sanitization function
function fix_string($string) {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities($string);
}

?>