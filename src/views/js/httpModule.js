
/**********
 * This file store all ajax peticion 
 * was used promise to suplied asinc
 * peticion
 **********/

 /**
  * Get Users
  */
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
/**
 * Get Attachment 
 * id of a message
 */
function ajaxAttachment(id){
    let ajax = new XMLHttpRequest();
    return new Promise((resolve , reject)=>{
        ajax.onerror = function(){
            console.log("Error");
        }
        ajax.onload = function(){
            console.log(ajax.responseText)
            let a = document.createElement('a');
            a.href = 'http://'+location.hostname+"/MessengerServices/src/views/attachments/"+ajax.responseText;
            a.download = ajax.responseText;
            a.click();
        }

        ajax.open('GET' , '../ajax/getAttachments.php?msmid='+id);
        ajax.send();
    });
}
/**
 * Get Messages of current user
 */
function ajaxMessages(){
    let ajax = new XMLHttpRequest();
    return new Promise((resolve , reject )=>{
        ajax.onerror = function(){
            reject( JSON.parse(ajax.responseText));
        }
        ajax.onload = function(){
            console.log(ajax.responseText)
            resolve(JSON.parse(ajax.responseText));
        }

        ajax.open('GET' , '../ajax/getMessages.php');
        ajax.send();
    })
}
/**
 * Modify Message  
 */
function ajaxModifyMessage( message ){
    console.log(message)
    let ajax = new XMLHttpRequest();
    return new Promise((resolve , reject )=>{
        ajax.onerror = function(){
            reject( JSON.parse(ajax.responseText));
        }
        ajax.onload = function(){
            console.log(ajax.responseText)
            resolve(JSON.parse(ajax.responseText));
        }
        
        ajax.open('POST' , '../ajax/modifyMessages.php');
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send(objectToGetQuery(message));
    })
}
/**
 * Send a message  
 */
function ajaxSendMessage( formData ){
    let ajax = new XMLHttpRequest();
    return new Promise((resolve , reject )=>{
        ajax.onerror = function(){
        }
        ajax.onload = function(){
            console.log("R"+ ajax.responseText)
        }

        ajax.open('POST' , '../ajax/sendMessage.php' , true);
        //ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send(formData);
    })
}
/**
 * Parse a object js to query string 
 */
function objectToGetQuery( object ){
    let queryString = "";

    for (const key in object) {
        queryString += key+"="+object[key]+"&";    
    }
    
    return queryString.slice(0 , (queryString.length-1));
}