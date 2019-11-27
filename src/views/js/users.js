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

    var meta = document.createElement('div');
    meta.className = 'meta';
    meta.appendChild(card);
    meta.innerHTML = users['email'];

    var img = document.createElement('img');
    img.className = 'right floated mini ui image';
    img.src = "img/profile_photo/" + users['userPhoto'];

    var header = document.createElement('div');
    header.className = 'header';
    header.innerHTML = users['username'];

    
    content.appendChild(img);
    content.appendChild(header);
    content.appendChild(meta);

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