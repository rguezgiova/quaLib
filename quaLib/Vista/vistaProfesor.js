/**
 * Función que crea una petición según la acción
 * @param form que realiza la petición
 */
function peticion(form) {
    let url = form.getAttribute('action');

    fetch(url, {
        body: new FormData(form),
        method: 'post'
    }).then(response => response.text())
        .then(data => {
            try {
                var respuesta = JSON.parse(data);
            } catch (exception) {
                console.log('Error al intentar parsear: ' + data);
            }
            let operacion = form.elements['operacion'].value;
            if (respuesta['response'] === true) {
                switch (operacion) {
                    case "insertar":
                        accion = 'insertado';
                        break;
                    case "modificar":
                        accion = 'modificado';
                        break;
                    case "eliminar":
                        accion = 'eliminado';
                        break;
                }
                alert('Alumno ' + accion + ' correctamente');
                location.reload();
            } else {
                alert('Error en ' + operacion);
            }
        });
}

/**
 * Función que crea el formulario
 * @param inputs para el formulario
 * @param operacion a realizar
 */
function crearForm(inputs, operacion) {
    let form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '../Controlador/ControladorProfesor.php');
    let op = document.createElement('input');
    op.setAttribute('name', 'operacion');
    op.setAttribute('value', operacion);
    form.append(op);

    if (operacion === 'eliminar') {
        let inputTmp = document.createElement('input');
        inputTmp.setAttribute('name', inputs[0].name);
        inputTmp.setAttribute('value', inputs[0].value);
        form.appendChild(inputTmp);
    } else {
        for (let input of inputs) {
            if (input.name !== 'margen') {
                let inputTmp = document.createElement('input');
                inputTmp.setAttribute('name', input.name);
                inputTmp.setAttribute('value', input.value);
                form.appendChild(inputTmp);
            }
        }
    }
    peticion(form);
}

/**
 * Función que elimina una fila
 * @param id de la fila
 */
function eliminar(id) {
    let tmpArray = [];
    let input = document.createElement('input');
    input.name = 'id';
    input.value = id;
    tmpArray.push(input);
    crearForm(tmpArray, 'eliminar');
}

/**
 * Función que modifica una fila
 * @param id de la fila
 */
function modificar(id) {
    let fila = document.getElementById(id);
    let inputs = fila.getElementsByTagName('input');
    cambiarFila(inputs);
    let botonModificar = document.getElementById('modificar_'+id);
    botonModificar.innerHTML = 'Guardar';
    let listener = function() {
        cambiarFila(inputs, true, 'white');
        this.innerHTML = 'Modificar';
        this.removeEventListener('click', listener);
        crearForm(inputs, 'modificar');
    }
    botonModificar.addEventListener('click', listener);
}

/**
 * Función que inserta un nuevo valor
 */
function insertar() {
    let inputs = document.getElementById('insertar').getElementsByTagName('input');
    crearForm(inputs, 'insertar');
}

/**
 * Función que cambia el color a una fila si se está modificando
 * @param inputs a modificar
 * @param readOnly tipo
 * @param background color de fondo
 */
function cambiarFila(inputs, readOnly = false, background = 'lightblue') {
    for (let input of inputs) {
        if (input.name !== name) {
            input.readOnly = readOnly;
            input.style.backgroundColor = background;
        }
    }
}

function pintarNotas() {
    let parcial1 = document.getElementById("parcial1").value;
    let parcial2 = document.getElementById("parcial2").value;
    let parcial3 = document.getElementById("parcial3").value;
    let notaMedia = document.getElementById("nota").value;

    if (parcial1 > 5 || parcial2 > 5 || parcial3 > 5 || notaMedia > 5) {

    }
}