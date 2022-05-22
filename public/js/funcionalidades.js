const d = document,
    $autorizar = d.getElementById("btn-autorizar"),
    $correo = d.getElementById("btn-correo"),
    $eliminar = d.getElementById("btn-eliminar");

// función para marcar todas las casillas
const marcarTodo = (condicion) => {
    const marcado = d.querySelectorAll(".marcado");
    marcado.forEach((el) => {
        el.checked = condicion;
    });
};

d.addEventListener("click", (e) => {
    // comprobamos si ha marcado la casilla todos
    if (e.target.id === "todos") {
        // si ha marcado, le pasamos true a la función marcado
        if (e.target.checked) {
            marcarTodo(true);

            // si no, le pasamos false
        } else {
            marcarTodo(false);
        }
    }

    // si el click se produce en el botón autorizar...
    if (e.target.id === "btn-autorizar") {
        // prevenimos el comportamiento por defecto del botón
        e.preventDefault();

        // recogemos las casillas marcadas
        const arrayChecked = d.querySelectorAll(".marcado");

        // aquí almacenaremos los ids de las empresas que vamos a autorizar
        const arrayId = [];

        // recorremos el array con las casillas marcadas y almacenamos los ids
        arrayChecked.forEach((el) => {
            if (el.checked) {
                arrayId.push(el.value);
            }
        });
        //console.log($autorizar.className.length);

        // en esta variable guardamos el enlace
        const sin = $autorizar.className.substring(
            0,
            $autorizar.className.length - 2
        );
        //console.log(sin);

        // esta es la url final URL + IdEmpresa
        let url = sin + "/" + arrayId;
        //console.log(url);

        // redirigimos a esa url
        location = url;
        //console.log(arrayId);
    }

    // si el click se produce en el botón correo...
    if (e.target.id === "btn-correo") {
        const arrayChecked = d.querySelectorAll(".marcado");

        const arrayId = [];

        arrayChecked.forEach((el) => {
            if (el.checked) {
                arrayId.push(el.value);
            }
        });
        console.log($correo.className.length);
        const sin = $correo.className.substring(
            0,
            $correo.className.length - 2
        );
        console.log(sin);
        let url = sin + "/" + arrayId;
        //console.log(url);

        location = url;
    }

    // si el click se produce en el botón eliminar...
    if (e.target.id === "btn-eliminar") {
        const arrayChecked = d.querySelectorAll(".marcado");

        const arrayId = [];

        arrayChecked.forEach((el) => {
            if (el.checked) {
                arrayId.push(el.value);
            }
        });
        console.log($eliminar.className.length);
        const sin = $eliminar.className.substring(
            0,
            $eliminar.className.length - 2
        );
        //console.log(sin);
        let url = sin + "/" + arrayId;
        //console.log(url);

        location = url;
    }
});
