var contador = 1

function agregarInput() {
    contador++
    var div = document.createElement('div')
    div.innerHTML = "<input type='text' id='dato" + contador + "' required placeholder='Nombre del dato' oninput='actualizarDato(" + contador + ")' autocomplete='off'><input type = 'text' name = '' id = 'valor" + contador + "' required placeholder = 'Ingrese el dato' autocomplete='off'><button type='button' class='menos' onclick='eliminarInput(" + contador + ")'>-</button>"
    div.setAttribute("id", "input" + contador)
    console.log(div)
    document.getElementById('inputContainer').appendChild(div)
}

function eliminarInput(numero) {
    document.getElementById("input" + numero).remove();
}

function actualizarDato(numero) {
    dato = document.getElementById("dato" + numero).value
    document.getElementById("valor" + numero).setAttribute("name", dato);
}