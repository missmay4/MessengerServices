
function renderTable(datas,container) {
    let keys = ['seen', 'sender', 'title', 'sendingTime'];
    let table = document.createElement('table');
    let tr = document.createElement('tr');
    for (const key of keys) {
        let th = document.createElement('th');
        th.innerHTML = key;
        tr.appendChild(th);
    }
    table.appendChild(tr);
    for (const row of datas) {
        let tr = document.createElement('tr');
        if( datas.length == 0 ){
            let th = document.createElement('th');
            th.innerHTML = "Not Messages";
            th.colSpan = 4 ;
            tr.appendChild(th);
            break
        }
        for (const key of keys) {
            let th = document.createElement('th');
            if(key == 'seen'){
                let checkBox = document.createElement('input');
                checkBox.type ="checkbox";
                (row[key] == 1) ? checkBox.checked = true : checkBox.checked = false ;
                checkBox.onclick = function(){
                    let msm = row;
                    (msm.seen == 1)? msm.seen = 0 : msm.seen = 1;
                    ajaxModifyMessage(objectToGetQuery(msm));
                }
                th.appendChild(checkBox);
            }
            else{
                th.innerHTML = row[key];
            }
            tr.appendChild(th);
        }
        tr.onclick = function(){
            renderMessageDetails(row);
        };
        table.appendChild(tr);
    }

    document.getElementById(container).appendChild(table);
}

function renderMessageDetails( msm ){
    
    let padre = document.getElementById('jsMessageDetails');
    padre.innerHTML ="";

    let sender = document.createElement('input')
    sender.type ="text";
    sender.value = msm['sender'];
    padre.appendChild(sender);

    let title = document.createElement('input')
    title.type ="text";
    title.value = msm['title'];
    padre.appendChild(title);

    let body = document.createElement('textarea');
    body.innerHTML = msm['body'];
    padre.appendChild(body);
}

function renderUsers( users , container ){
    let padre = document.getElementById(container);
    padre.innerHTML  ="";
    
    let select = document.createElement('select');
    select.name = 'destination';
    for (const usu of users) {
        let option = document.createElement('option');
        option.value = usu['ID'];
        option.innerHTML = usu['username'];
        select.appendChild(option);
    }
    padre.appendChild(select);
}

window.onload = function () {
    this.ajaxMessages().then(messeges => { this.renderTable(messeges,'jsTableMessage') });
    this.ajaxUsers().then( user => { renderUsers( user , "jsUsersSelect" ) });
}