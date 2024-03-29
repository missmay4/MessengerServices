/**
 * Render a Card with a user
 */
function renderCard(users) {
    console.log(users)

    var card = document.createElement('div');
    card.className = 'blue card';
    var content = document.createElement('div');
    content.className = 'content';
    card.appendChild(content);

    if(users['userPhoto'] != null){
        var img = document.createElement('img');
        //img.className = 'right floated mini ui image';
        img.className = 'ui small circular image';
        img.src = "img/profile_photo/" + users['userPhoto'];
        content.appendChild(img);
    }
    
    if(users['username'] != null){
        var header = document.createElement('div');
        header.className = 'ui header';
        header.innerHTML = users['username'];
        content.appendChild(header);
    }
    if(users['email'] != null){
        var meta = document.createElement('div');
        meta.className = 'ui info message';
        meta.appendChild(card);
        meta.innerHTML = users['email'];
        content.appendChild(meta);
    }
    if(users['age'] != null){
        var age = document.createElement('p');
        age.className = 'ui blue message';
        age.appendChild(card);
        age.innerHTML = '<b>Age:</b> ' + users['age'];
        content.appendChild(age);
    }
    if(users['address'] != null){
        var add = document.createElement('p');
        add.className = 'ui teal message';
        add.appendChild(card);
        add.innerHTML = '<b>Address:</b> ' + users['address'];
        content.appendChild(add);
    }

    if(users['hobbies'] != null){
        var hob = document.createElement('p');
        hob.className = 'ui blue message';
        hob.appendChild(card);
        hob.innerHTML = '<b>Hobbies:</b> ' + users['hobbies'];
        content.appendChild(hob);
    }

    return card;
}


window.onload = () => {
    ajaxUsers().then(users => {
        for (const key in users) {
            joinUsers.appendChild(
                renderCard(users[key])
            )
        }
    })
}