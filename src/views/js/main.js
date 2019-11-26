/**
 * Print a table with Messages in a container
 */
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
                    ajaxModifyMessage(msm);
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
        /**
         * On click on tr change the message to 
         * seen update in database 
         * render message details 
         */
        tr.onclick = function () {
            let msm = row;
            msm.seen = 1
            ajaxModifyMessage(msm);
            renderMessageDetails(row);
            /**
             * On click make response 
             * to a mesage
             */
            document.getElementById('jsResponseMessage').onclick = function (evt) {
                evt.preventDefault();
                loadTab2();
                selectResponseUser(msm['IDSender'], msm['title']);
            }
        };
        contain.appendChild(tr)
    }
}
/**
 * Manage a response to a message
 */
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

/**
 * Change to tab 1
 */
function loadTab1() {
    document.getElementById('jsLinkTab1').classList.add('active')
    document.getElementById('jsLinkTab2').classList.remove('active')
    document.getElementById('jsTab1').classList.add('active')
    document.getElementById('jsTab2').classList.remove('active')
}
/**
 * Change  to tab 2
 */
function loadTab2() {
    document.getElementById('jsLinkTab1').classList.remove('active')
    document.getElementById('jsLinkTab2').classList.add('active')
    document.getElementById('jsTab1').classList.remove('active')
    document.getElementById('jsTab2').classList.add('active')
}
/**
 * Render a Message details
 * @param { Message } msm 
 */
function renderMessageDetails(msm) {
    console.log(msm);
    let sender = document.getElementById('jsSenderMessage');
    sender.value = msm['sender'];

    let title = document.getElementById('jsTitleMessage')
    title.value = msm['title'];

    let body = document.getElementById('jsBodyMessage');
    body.innerHTML = msm['body'];

    document.getElementById('jsAtachment').onclick = function (evt) {
        console.log("Downloading", msm['ID'])
        ajaxAttachment(msm['ID']);

        evt.preventDefault();
    }



}
/**
 * Render select with all users of the application
 * to send messages 
 */
function renderUsers(users, container) {
    let padre = document.getElementById(container);
    padre.innerHTML = "";

    let select = document.createElement('select');
    select.id = "jsSendDestMess";
    select.name = 'destination';
    select.multiple = true;
    for (const usu of users) {
        let option = document.createElement('option');
        option.value = usu['ID'];
        option.innerHTML = usu['username'];
        select.appendChild(option);
    }
    padre.appendChild(select);
}

/* function addCard(users, container) {
    var cont = document.getElementById(container);
    var card;

    for (let user of users) {

        card = createCard(
            user.username,
            user.userPhoto
        );
    }


    cont.appendChild(card);

} */

/**
 * Main
 */
window.onload = function () {
    /**
     * Ajax to get Messages
     */
    this.ajaxMessages().then(messeges => {
        this.renderTable(messeges, 'jsTableMessage')
    });
    /**
     * Print messages tables each 3000 ms
     */
    setInterval(function () {
        this.ajaxMessages().then(messeges => {
            this.renderTable(messeges, 'jsTableMessage')
        });
    }, 3000);
    this.ajaxUsers().then(user => {
        renderUsers(user, "jsSendUsersSelect")
    });
    /**
     * Send a mail by ajax 
     */
    document.getElementById('jsSendMessageButton').onclick = function (evt) {
        var form = document.getElementById('jsFormMessage');
        let formdata = new FormData();
        evt.preventDefault();

        let users = jsSendDestMess.options;

        for (const dest of users) {
            if (dest.selected) {
                formdata.append('destination', dest.value);
                formdata.append('title', jsSendTitleMessage.value);
                formdata.append('body', jsSendBodyMessage.value);
                formdata.append('file', document.getElementById('jsFileInput').files[0]);

                ajaxSendMessage(formdata);
                formdata = new FormData();
            }
        }

        jsSendTitleMessage.value = "";
        jsSendBodyMessage.value = "";

    }
}