/**
 * Check the data into the register form
 * @returns {boolean}
 */
function checkData(){
    var user = document.getElementById('usr').value;
    var pass = document.getElementById('pswd').value;
    var mail = document.getElementById('mail').value;

    var regexUsr = /\w+/;
    var regexPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    // The password should contain at leas one digit -> (?=.*\d)
    // The password should contain at least one lower case -> (?=.*[a-z])
    // The password should contain at least one upper case -> (?=.*[A-Z])
    // The password should contain at least 8 from the mentioned characters -> [a-zA-Z0-9]{8,}
    var regexMail = /.+\@.+\..+/;

    if(regexUsr.test(user)){
        document.getElementById("nameJS").style.display ="none";
    }else{
        document.getElementById("nameJS").style.display ="block";
    }

    if(regexPass.test(pass)){
        document.getElementById("passJS").style.display ="none";
    }else{
        document.getElementById("passJS").style.display ="block";
    }
    
    if(regexMail.test(mail)){
        document.getElementById("emailJS").style.display ="none";
    }else{
        document.getElementById("emailJS").style.display ="block";
    }

    if (regexUsr.test(user) && regexPass.test(pass) && regexMail.test(mail)){
        return false;
    } else {
        return true;
    }


}

/**
 * When the user type check if the data is correct
 */
function setUpFormulario(){
    var user = document.getElementById('usr');
    var pass = document.getElementById('pswd');
    var mail = document.getElementById('mail');

    user.oninput = function () {
        toggleSubmit(checkData());
    }
    pass.oninput = function () {
        toggleSubmit(checkData());
    }

    mail.oninput = function () {
        toggleSubmit(checkData());
    }

}

/**
 * Manages the state disabled/enabled of the button register
 * @param state
 */
function toggleSubmit(state){
    var boton = document.getElementById('but');
    boton.disabled = state;
}

window.onload = function () {
    setUpFormulario();
}