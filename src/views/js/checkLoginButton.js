function checkData(){
    var user = document.getElementById('usr').value;
    var pass = document.getElementById('pswd').value;

    var regexUsr = /\w+/; // Nombre sin espacios
    var regexPass = /\w+\d+/;
    if (regexUsr.test(user) && regexPass.test(pass)){
        return false;
    } else {
        return true;
    }
}

function setUpFormulario(){
    console.log('set');
    var user = document.getElementById('usr');
    var pass = document.getElementById('pswd');

    user.onkeypress = function () {
        toggleSubmit(checkData());
    }
    pass.onkeypress = function () {
        toggleSubmit(checkData());
    }

}

function toggleSubmit(state){
    console.log(state);
    var boton = document.getElementById('but');
    boton.disabled = state;
}

window.onload = function () {
    setUpFormulario();
}