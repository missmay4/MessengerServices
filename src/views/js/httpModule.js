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
function ajaxModifyMessage( message ){
    let ajax = new XMLHttpRequest();
    return new Promise((resolve , reject )=>{
        ajax.onerror = function(){
            reject( JSON.parse(ajax.responseText));
        }
        ajax.onload = function(){
            resolve(JSON.parse(ajax.responseText));
        }
        
        ajax.open('POST' , '../ajax/modifyMessages.php');
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send(message);
    })
}
function ajaxSendMessage( message ){
    let ajax = new XMLHttpRequest();
    return new Promise((resolve , reject )=>{
        ajax.onerror = function(){
        }
        ajax.onload = function(){
        }

        ajax.open('POST' , '../ajax/sendMessage.php');
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("?"+objectToGetQuery(message));
    })
}
function objectToGetQuery( object ){
    let queryString = "";

    for (const key in object) {
        queryString += key+"="+object[key]+"&";    
    }
    
    return queryString.slice(0 , (queryString.length-1));
}