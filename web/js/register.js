$(document).ready(function () {
    $('#repeatemail').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    $('#fos_user_registration_form_plainPassword_second').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    let not_registable = true;
    let id_numId = 'fos_user_registration_form_numberid';
    let id_firstname = 'fos_user_registration_form_firstname';
    let id_lastname = 'fos_user_registration_form_lastname';
    let id_username = 'fos_user_registration_form_username';
    let id_email = 'fos_user_registration_form_email';
    let id_repeatemail = 'repeatemail';
    let id_password = 'fos_user_registration_form_plainPassword_first';
    let id_repeatpassword = 'fos_user_registration_form_plainPassword_second';
    $('#register_button')
        .attr('disabled', not_registable)
        .css("cursor", "not-allowed")
    ;

    $(`#${id_numId}, #${id_firstname}, #${id_lastname}, #${id_username}, #${id_email}, #${id_repeatemail}, #${id_repeatpassword}, #${id_password}`)
        .focusin(function (e) {
            e.preventDefault();
        })
        .focusout(function () {
            if (
                numIDIsValid(id_numId) &&
                firstnameOrLastnameIsValid(id_firstname, 'firstname') &&
                firstnameOrLastnameIsValid(id_lastname, 'lastname') &&
                firstnameOrLastnameIsValid(id_username, 'username') &&
                emailMatched(id_email, id_repeatemail) &&
                passwordMatched(id_password, id_repeatpassword)
            ) {
                $('#register_button')
                    .attr('disabled', !not_registable)
                    .css("cursor", "pointer")
                ;
            } else {
                $('#register_button')
                    .attr('disabled', not_registable)
                    .css("cursor", "not-allowed")
                ;
            }
        });

    // numIDIsValid('fos_user_registration_form_numberid')
});


// NumCIN is valid?
function numIDIsValid($id) {
    let valeurduchamps = document.getElementById($id).value;
    let reg = new RegExp('^(^(^(\\d{1}([a-z]|\\d{1})\\d{11})$|\\d{14}$)|[a-z]\\d{8})$', 'gi')
    if (reg.test(valeurduchamps)) {
        toggleMessageError('matchIdCard');
        return true;
    }
    toggleMessageError('matchIdCard', 'Le numéro est invalide');
    return false;
}

// Firstname is valid?
function firstnameOrLastnameIsValid($id, $name) {
    let valeurduchamps = document.getElementById($id).value;
    if ($name === 'firstname') {
        if (isNaN(valeurduchamps) && valeurduchamps !== "") {
            toggleMessageError('firstnamecheck');
            return true;
        } else {
            toggleMessageError('firstnamecheck', 'Le prénom doit comporter au moins une lettre');
            return false;
        }
    }
    if ($name === 'lastname') {
        if (isNaN(valeurduchamps) && valeurduchamps !== "") {
            toggleMessageError('lastnamecheck');
            return true;
        } else {
            toggleMessageError('lastnamecheck', 'Le nom doit comporter au moins une lettre');
            return false;
        }
    }
    if ($name === 'username') {
        if (isNaN(valeurduchamps) && valeurduchamps !== "") {
            toggleMessageError('usernamecheck');
            return true;
        } else {
            toggleMessageError('usernamecheck', 'Le nom doit comporter au moins une lettre');
            return false;
        }
    }
    return false;
}

// verifier la correspondance des email
function emailMatched($idemail, $idrepeatemail) {
    let valeurduchampsemail = document.getElementById($idemail).value;
    let valeurduchampsrepeatemail = document.getElementById($idrepeatemail).value;
    if (valeurduchampsrepeatemail !== "" && valeurduchampsemail !== "" && valeurduchampsemail.localeCompare(valeurduchampsrepeatemail) === 0) {
        toggleMessageError('matchemail');
        return true;
    }
    toggleMessageError('matchemail', 'les deux emails doivent être identiques');
    return false;
}

// verifier la correspondance des email
function passwordMatched($idpassword, $idrepeatpassword) {
    let valeurduchampspasswd = document.getElementById($idpassword).value;
    let valeurduchampsrepeatpasswd = document.getElementById($idrepeatpassword).value;
    if (valeurduchampsrepeatpasswd !== "" && valeurduchampspasswd !== "" && valeurduchampspasswd.localeCompare(valeurduchampsrepeatpasswd) === 0) {
        toggleMessageError('matchpasswd');
        return true;
    }
    toggleMessageError('matchpasswd', 'les deux mots de passe doivent être identiques');
    return false;

}

function toggleMessageError($idspanmessage, $message = null) {
    let spanmessage = $(`#${$idspanmessage}`);
    if ($message === null) {
        if (!spanmessage.empty()) {
            spanmessage.empty()
        }
    } else {
        if (!spanmessage.empty()) {
            spanmessage.empty()
        }
        spanmessage.append($message);
    }
}








