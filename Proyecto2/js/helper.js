var respuesta;
function obtener_id(id_json) {
    $.ajax({
        type: "POST",
        url: "http://localhost/proyecto2/class/leer_editable.php",
        dataType: "json",
        data: JSON.stringify({ id: id_json }),
        dataType: "json",
        contentType: "application/json",
        success: function(data){  
            //console.log(data['records'][0]['id']);
            generar(
                data['records'][0]['id'],
                data['records'][0]['titulo'],
                data['records'][0]['fecha'],
                data['records'][0]['hora'],
                data['records'][0]['ubicacion'],
                data['records'][0]['correo'],
                data['records'][0]['repeticion'],
                data['records'][0]['tipo'],
            );
        }
    });
}

function eliminar(id_json) {
    $.ajax({
        type: "POST",
        url: "http://localhost/proyecto2/class/eliminar_act.php",
        dataType: "json",
        data: JSON.stringify({ id: id_json }),
        dataType: "json",
        contentType: "application/json",
    });
}

function crear(titulo, fecha, hora, ubicacion, correo, repeticion, tipo) {
    $.ajax({
        type: "POST",
        url: "http://localhost/proyecto2/class/crear_act.php",
        dataType: "json",
        data: JSON.stringify({ 
            titulo: titulo,
            fecha: fecha,
            hora: hora,
            ubicacion: ubicacion,
            correo: correo,
            repeticion: repeticion,
            tipo: tipo,
             }),
        dataType: "json",
        contentType: "application/json"
    });
}

function actualizar(id, titulo, fecha, hora, ubicacion, correo, repeticion, tipo) {
    $.ajax({
        type: "POST",
        url: "http://localhost/proyecto2/class/actualizar_act.php",
        dataType: "json",
        data: JSON.stringify({
            id: id, 
            titulo: titulo,
            fecha: fecha,
            hora: hora,
            ubicacion: ubicacion,
            correo: correo,
            repeticion: repeticion,
            tipo: tipo,
             }),
        dataType: "json",
        contentType: "application/json"
    });
}

function generar(idP, tituloP, fechaP, horaP, ubicaP, correoP, repeP, tipoP) {
    const opciones = ['Deporte', 'Estudio', 'Trabajo', 'Fiesta', 'Reunion', 'Viaje', 'Super Mercado'];
    var form_cont = "form_cont";
    let salto1 = document.createElement("br");
    let salto2 = document.createElement("br");
    let salto3 = document.createElement("br");
    let salto4 = document.createElement("br");
    let salto5 = document.createElement("br");
    let salto6 = document.createElement("br");
    let salto7 = document.createElement("br");
    let salto8 = document.createElement("br");
    let salto9 = document.createElement("br");
    let salto10 = document.createElement("br");
    let salto11 = document.createElement("br");
    let salto12 = document.createElement("br");
    let salto13 = document.createElement("br");
    let salto14 = document.createElement("br");
    let salto15 = document.createElement("br");
    let salto16 = document.createElement("br");
    let title = document.createElement("label");
    title.setAttribute('value', "Detalle de actividad")
    let form = document.createElement("form");
    form.setAttribute('method', "post");
    form.setAttribute('action', "editar.php");
    let idtext = document.createElement("label");
    idtext.innerHTML = "<span>Id </span>"
    let titulotext = document.createElement("label");
    titulotext.innerHTML = "<span>Titulo </span>";
    let fechatext = document.createElement("label");
    fechatext.innerHTML = "<span>Fecha </span>";
    let horatext = document.createElement("label");
    horatext.innerHTML = "<span>Hora </span>";
    let ubicaciontext = document.createElement("label");
    ubicaciontext.innerHTML = "<span>Ubicacion </span>";
    let correotext = document.createElement("label");
    correotext.innerHTML = "<span>Correo </span>";
    let repeticiontext = document.createElement("label");
    repeticiontext.innerHTML = "<span>Repeticion </span>";
    let tipotext = document.createElement("label");
    tipotext.innerHTML = "<span>Tipo </span>";
    let espacio = document.createElement("label");
    espacio.innerHTML = "<span>  </span>";
    let id = document.createElement("input");
    id.setAttribute('type', "text");
    id.setAttribute('name', "id");
    id.setAttribute('value', idP);
    id.setAttribute('readonly', true);
    let titulo = document.createElement("input");
    titulo.setAttribute('type', "text");
    titulo.setAttribute('name', "titulo");
    titulo.setAttribute('value', tituloP);
    let fecha = document.createElement("input");
    fecha.setAttribute('type', "date");
    fecha.setAttribute('name', "fecha");
    fecha.setAttribute('value', fechaP);
    let hora = document.createElement("input");
    hora.setAttribute('type', "time");
    hora.setAttribute('name', "hora");
    hora.setAttribute('value', horaP);
    let ubicacion = document.createElement("input");
    ubicacion.setAttribute('type', "text");
    ubicacion.setAttribute('name', "ubicacion");
    ubicacion.setAttribute('value', ubicaP);
    let correo = document.createElement("input");
    correo.setAttribute('type', "text");
    correo.setAttribute('name', "correo");
    correo.setAttribute('value', correoP);
    let repeticion = document.createElement("input");
    repeticion.setAttribute('type', "text");
    repeticion.setAttribute('name', "repeticion");
    repeticion.setAttribute('value', repeP);
    let tipo = document.createElement("select");
    tipo.setAttribute('type', "select");
    tipo.setAttribute('name', "tipo");
    tipo.setAttribute('value', tipoP);
    let actualizar = document.createElement("input");
    actualizar.setAttribute('type', "submit");
    actualizar.setAttribute('name',"actualizar");
    actualizar.setAttribute('value',"Actualizar");
    let eliminar = document.createElement("input");
    eliminar.setAttribute('type', "submit");
    eliminar.setAttribute('name',"eliminar");
    eliminar.setAttribute('value',"Eliminar");

    title.innerHTML = "<h1>Detalle de actividad</h1>";

    form.appendChild(idtext);
    form.appendChild(id);
    form.appendChild(salto1);
    form.appendChild(salto2);
    form.appendChild(titulotext);
    form.appendChild(titulo);
    form.appendChild(salto3);
    form.appendChild(salto4);
    form.appendChild(fechatext);
    form.appendChild(fecha);
    form.appendChild(salto5);
    form.appendChild(salto6);
    form.appendChild(horatext);
    form.appendChild(hora);
    form.appendChild(salto7);
    form.appendChild(salto8);
    form.appendChild(ubicaciontext);
    form.appendChild(ubicacion);
    form.appendChild(salto9);
    form.appendChild(salto10);
    form.appendChild(correotext);
    form.appendChild(correo);
    form.appendChild(salto11);
    form.appendChild(salto12);
    form.appendChild(repeticiontext);
    form.appendChild(repeticion);
    form.appendChild(salto13);
    form.appendChild(salto14);
    form.appendChild(tipotext);
    form.appendChild(tipo);
    form.appendChild(salto15);
    form.appendChild(salto16);
    for (let i = 0 ; i<opciones.length; i++) {
        const opc = document.createElement("option");
        opc.textContent = opciones[i];
        if (opc.textContent == tipoP) {
            opc.setAttribute('selected', 'selected');
        }
        tipo.appendChild(opc);
    }
    form.appendChild(actualizar);
    form.appendChild(espacio);
    form.appendChild(eliminar);
    document.getElementById(form_cont).appendChild(title);
    document.getElementById(form_cont).appendChild(form);
}