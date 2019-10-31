function ajaxUsers(){
    let ajax = new XMLHttpRequest();
    return new Promise((resolve , reject )=>{
        ajax.onerror = function(){
            reject( JSON.parse(ajax.responseText));
        }
        ajax.onload = function(){
            resolve(JSON.parse(ajax.responseText));
        }

        ajax.open('GET' , '../ajax/getUsers.php');
        ajax.send();
    })
}

function ajaxMessages(){
    let ajax = new XMLHttpRequest();
    return new Promise((resolve , reject )=>{
        ajax.onerror = function(){
            reject( JSON.parse(ajax.responseText));
        }
        ajax.onload = function(){
            resolve(JSON.parse(ajax.responseText));
        }

        ajax.open('GET' , '../ajax/getMessages.php');
        ajax.send();
    })
}