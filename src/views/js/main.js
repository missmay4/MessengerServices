
function renderTable(datas, container) {
    let keys = ['seen', 'sender', 'title', 'sendingTime'];
    let table = document.createElement('table');
    table.classList.add("ui");
    table.classList.add("selectable");
    table.classList.add("table");

    let tr = document.createElement('tr');
    tr.classList.add("ui");
    tr.classList.add("center");
    tr.classList.add("aligned");
    for (const key of keys) {
        let th = document.createElement('th');
        th.innerHTML = key;
        tr.appendChild(th);
    }
    let thead = document.createElement('thead');
    thead.appendChild(tr);
    table.appendChild(thead);
    for (const row of datas) {
        let tr = document.createElement('tr');
        tr.classList.add("ui");
        tr.classList.add("center");
        tr.classList.add("aligned");
        if (datas.length == 0) {
            let th = document.createElement('th');
            th.innerHTML = "Not Messages";
            th.colSpan = 4;
            tr.appendChild(th);
            break
        }
        for (const key of keys) {
            let th = document.createElement('th');
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
            else {
                th.innerHTML = row[key];
            }
            tr.appendChild(th);
        }
        tr.onclick = function () {
            renderMessageDetails(row);
        };
        let tbody = document.createElement('tbody');
        tbody.appendChild(tr);
        table.appendChild(tbody);
    }

    document.getElementById(container).appendChild(table);
}

function renderMessageDetails(msm) {

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
    this.ajaxMessages().then(messeges => { this.renderTable(messeges, 'jsTableMessage') });
    this.ajaxUsers().then(user => { renderUsers(user, "jsSendUsersSelect") });
    document.getElementById('jsSendMessageButton').onclick = function(){
        console.log("sending msm");
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
    }
}