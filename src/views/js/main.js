/**
 * 
 * @param { Array with datas to be printed } datas 
 * @param { Keys of data that will be printed} keys 
 * @param { Container in which the table will be printed } container 
 */
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
                row[key] == 1 ? checkBox.checked : "" ;
                th.appendChild(checkBox);
            }
            else{
                th.innerHTML = row[key];
            }
            tr.appendChild(th);
        }
        table.appendChild(tr);
    }

    document.getElementById(container).appendChild(table);
}

function renderUsers( users , container ){
    let select = document.createElement('select');
    select.name = 'destination';
    for (const usu of users) {
        let option = document.createElement('option');
        option.value = usu['ID'];
        option.innerHTML = usu['username'];
        select.appendChild(option);
    }
    document.getElementById(container).appendChild(select);
}

window.onload = function () {
    this.ajaxMessages().then(messeges => { this.renderTable(messeges,'jsTableMessage') });
    this.ajaxUsers().then( user => { renderUsers( user , "jsUsersSelect" ) });
}