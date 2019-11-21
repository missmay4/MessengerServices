
function renderTable(datas, container) {
    let keys = ['seen', 'PhotoProfile', 'sender', 'title', 'sendingTime'];
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
            else if (key == 'PhotoProfile') {
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

            document.getElementById('jsResponseMessage').onclick = function (evt) {
                evt.preventDefault();
                loadTab2();
                selectResponseUser(msm['IDSender'], msm['title']);
            }
        };
        contain.appendChild(tr)
    }
}

function selectResponseUser(idUserResponse, mailTitle) {

    let select = document.getElementById('jsSendDestMess');
    let options = select.children;

    for (const select of options) {
        if (select.value == idUserResponse) {
            select.selected = "true";
        }
    }

    let title = document.getElementById('jsSendTitleMessage');
    console.log(title)
    title.value = "RE : " + mailTitle;


}

function loadTab1() {
    document.getElementById('jsLinkTab1').classList.add('active')
    document.getElementById('jsLinkTab2').classList.remove('active')
    document.getElementById('jsTab1').classList.add('active')
    document.getElementById('jsTab2').classList.remove('active')
}
function loadTab2() {
    document.getElementById('jsLinkTab1').classList.remove('active')
    document.getElementById('jsLinkTab2').classList.add('active')
    document.getElementById('jsTab1').classList.remove('active')
    document.getElementById('jsTab2').classList.add('active')
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
    select.id = "jsSendDestMess"
    select.name = 'destination';
    for (const usu of users) {
        let option = document.createElement('option');
        option.value = usu['ID'];
        option.innerHTML = usu['username'];
        select.appendChild(option);
    }
    padre.appendChild(select);
}

function createCard(image, name) {
    var card = document.createElement('div');
    card.className = 'ui card';
    document.body.appendChild(card);

    var img = document.createElement('img');
    img.className = 'image';

    img.src = image;
    caja.appendChild(img);

    var content = document.createElement('div');
    bodyCaja.className = 'content';

    var user = document.createElement('a');
    user.className = 'header';
    user.innerHTML = name;

    content.appendChild(user);
    card.appendChild(content);
    container.appendChild(card);

    return card;

}

function addCard(users, container) {
    var cont = document.getElementById(container);
    var card;

    for (let user of users) {

        card = createCard(
            user.username,
            user.userPhoto
        );
    }


    cont.appendChild(card);

}

window.onload = function () {
<<<<<<< HEAD
    this.ajaxMessages().then(messeges => { this.renderTable(messeges, 'jsTableMessage') });
    setInterval(function () {
        this.ajaxMessages().then(messeges => { console.log(messeges), this.renderTable(messeges, 'jsTableMessage') });
    }, 3000);
    //this.ajaxUsers().then(user => {addCard(user, "joinUsers")});
    this.ajaxUsers().then(user => { renderUsers(user, "jsSendUsersSelect") });

    document.getElementById('jsSendMessageButton').onclick = function (evt) {
        evt.preventDefault();
        let formdata = new FormData();
=======
    this.ajaxMessages().then(messeges => {
        this.renderTable(messeges, 'jsTableMessage')
    });
    setInterval(function () {
        this.ajaxMessages().then(messeges => {
            this.renderTable(messeges, 'jsTableMessage')
        });
    }, 3000);

    this.ajaxUsers().then(user => {
        addCard(user, "joinUsers")
    });
    this.ajaxUsers().then(user => {
        renderUsers(user, "jsSendUsersSelect")
    });

    document.getElementById('jsSendMessageButton').onclick = function () {
        var form = document.getElementById('jsFormMessage');

>>>>>>> 295690ea6c465181588cede0ba29bc3391306aa8

        /* let msm = {
            ID: null,
            sender: null,
            receiver: jsSendDestMess.value,
            title: jsSendTitleMessage.value,
            body: jsSendBodyMessage.value,
            sendingTime: null,
            seen: null,
        } */
<<<<<<< HEAD

        formdata.append('destination', jsSendDestMess.value);
        formdata.append('title', jsSendTitleMessage.value);
        formdata.append('body', jsSendBodyMessage.value);
        formdata.append('file' , document.getElementById('jsFileInput').files[0]);

        ajaxSendMessage(formdata);


        jsSendTitleMessage.value = "";
        jsSendBodyMessage.value = "";
=======
        ajaxSendMessage(new FormData(form));
        document.getElementById('jsSendMessageButton').onclick = function (evt) {

            let formdata = new FormData(document.forms.namedItem('formSendMessage'));

>>>>>>> 295690ea6c465181588cede0ba29bc3391306aa8

            evt.preventDefault();

            ajaxSendMessage(formdata);
            jsSendTitleMessage.value = "";
            jsSendBodyMessage.value = "";


        }
    }
}