
function renderTable(datas, container) {
    let keys = ['seen' , 'PhotoProfile' , 'sender', 'title', 'sendingTime'];
    let contain = document.getElementById(container)
    contain.innerHTML = ""
    
    for (const row of datas) {
        let tr = document.createElement('tr');
        if (datas.length == 0) {
            let th = document.createElement('th');
            th.classList.add("ui")
            th.classList.add("center")
            th.classList.add("aligned")
            th.innerHTML = "Not Messages";
            th.colSpan = 4;
            tr.appendChild(th);
            break
        }
        for (const key of keys) {
            let th = document.createElement('th');
            th.classList.add("ui")
            th.classList.add("center")
            th.classList.add("aligned")
            if (key == 'seen') {
                let checkBox = document.createElement('input');
                checkBox.type = "checkbox";
                (row[key] == 1) ? checkBox.checked = true : checkBox.checked = false;
                checkBox.onclick = function () {
                    let msm = row;
                    (msm.seen == 1) ? msm.seen = 0 : msm.seen = 1;
                    ajaxModifyMessage(objectToGetQuery(msm));
                }
                th.appendChild(checkBox);
            }
            else if( key == 'PhotoProfile'){
                let msm = row;
                let img = document.createElement('img');
                img.src = "img/profile_photo/" + msm['photoSender'];
                img.style.width = "40px";
                img.style.height = "40px";
                th.appendChild(img);
            }
            else {
                th.innerHTML = row[key];
            }
            tr.appendChild(th);
        }
        tr.onclick = function () {
            let msm = row;
            msm.seen = 1
            ajaxModifyMessage(objectToGetQuery(msm));
            renderMessageDetails(row);
        };
        contain.appendChild(tr)
    }
}

function renderMessageDetails(msm) {
    console.log(msm);
    let sender = document.getElementById('jsSenderMessage');
    sender.value = msm['sender'];

    let title = document.getElementById('jsTitleMessage')
    title.value = msm['title'];

    let body = document.getElementById('jsBodyMessage');
    body.innerHTML = msm['body'];
}

function renderUsers(users, container) {
    let padre = document.getElementById(container);
    padre.innerHTML = "";

    let select = document.createElement('select');
    select.name = 'destination';
    select.id ="jsSendDestMess"
    for (const usu of users) {
        let option = document.createElement('option');
        option.value = usu['ID'];
        option.innerHTML = usu['username'];
        select.appendChild(option);
    }
    padre.appendChild(select);
}

window.onload = function () {
    setInterval(function () {
        console.log("luking for neus masages")
        this.ajaxMessages().then(messeges => {this.renderTable(messeges, 'jsTableMessage') });
    }, 3000);
    this.ajaxUsers().then(user => { renderUsers(user, "jsSendUsersSelect") });
    document.getElementById('jsSendMessageButton').onclick = function(){
        let msm = {
            ID : null,
            sender : null ,
            receiver : jsSendDestMess.value,
            title : jsSendTitleMessage.value,
            body : jsSendBodyMessage.value,
            sendingTime :null ,
            seen : null,
        }
        ajaxSendMessage(msm);

        jsSendTitleMessage.value ="";
        jsSendBodyMessage.value="";

    }
}