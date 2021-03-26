function validateFirstName(field) {
    return (field=="") ? "No first name was entered.\n" : "";
}

function validateLastName(field) {
    return (field=="") ? "No last name was entered.\n" : "";
}

function validateEmail(field) {
    return (field=="") ? "No email was entered.\n" : "";
}

function validateUsername(field) {
    return (field=="") ? "No username was entered.\n" : "";
}

function validatePassword1(field) {
    return (field=="") ? "No password1 was entered.\n" : "";
}

function validatePassword2(field) {
    return (field=="") ? "No password2 was entered.\n" : "";
}

function validateRole(field) {
    return (field=="") ? "No role was entered.\n" : "";
}

function comparePasswords(pass1, pass2) {
    if((pass1==pass2) && (pass1!="")) return ""
    else return "Your passwords do not match\n";
}
