

function ocultarMensaje() {
    var color = document.getElementById('js-msj').style.color;

    if (color == 'black' || color == '') {
        color = 'white';
    } else {
        color = 'black';
    }

    document.getElementById('js-msj').style.color = color;
}