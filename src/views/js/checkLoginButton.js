function checkData(){
    var user = document.getElementById('usr').value;
    var pass = document.getElementById('pswd').value;

    var regexUsr = /\w+/; // Nombre sin espacios
    var regexPass = /\w+\d+/;
    if(regexUsr.test(user)){
        document.getElementById("nameJS").style.display ="none";
    }
    else{
        document.getElementById("nameJS").style.display ="block";
    }
    if(regexPass.test(pass)){
        document.getElementById("paswJS").style.display ="none";
    }
    else{
        document.getElementById("paswJS").style.display ="block";
    }

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

    user.oninput = function () {
        toggleSubmit(checkData());
    }
    pass.oninput = function () {
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