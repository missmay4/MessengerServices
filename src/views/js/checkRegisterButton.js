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

    console.log(regexMail.test(mail));

    if (regexUsr.test(user) && regexPass.test(pass) && regexMail.test(mail)){
        return false;
    } else {
        return true;
    }


}

function setUpFormulario(){
    var user = document.getElementById('usr');
    var pass = document.getElementById('pswd');
    var mail = document.getElementById('mail');

    user.onkeypress = function () {
        toggleSubmit(checkData());
    }
    pass.onkeypress = function () {
        toggleSubmit(checkData());
    }

    mail.onkeypress = function () {
        toggleSubmit(checkData());
    }

}

function toggleSubmit(state){
    //console.log(state);
    var boton = document.getElementById('but');
    boton.disabled = state;
}

window.onload = function () {
    setUpFormulario();
}