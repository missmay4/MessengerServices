
function crearContenido(image, name) {
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

    return card;

}

function crearContenedores(card) {

    for (let cont of card) {

        crearContenido(
            cont.username,
            cont.userPhoto
        );
    }

}