function open_hub() {
    window.open('../renderizados/hub.php', "_self");
}

function open_login() {
    window.open('../renderizados/login.php', "_self");
}


function cargar_perfil(id, nombre, apellido, usuario, email) {
    var formulario = document.getElementById('perfil-info');
    const template = `<form action="perfil.php" id="perfil-form" method="post">
    <div name="info-card" id="info-card" class="info-card">
        <div class="id-card">
            <span>Id:</span>
            <input type="text" name="info-id" id="info-id" class="info-id" value="${id}" readonly>
        </div>
        <div class="user-card">
            <span>Usuario:</span>
            <input type="text" name="info-user" id="info-user" class="info-user" value="${usuario}" readonly>
        </div>
        <div class="nombre-card">
            <span>Nombre:</span>
            <input type="text" name="info-nombre" id="info-nombre" class="info-nombre" value="${nombre}">
        </div>
        <div class="apellido-card">
            <span>Apellido:</span>
            <input type="text" name="info-apellido" id="info-apellido" class="info-apellido2" value="${apellido}">
        </div>
        <div class="email-card">
            <span>Email:</span>
            <input type="email" name="info-email" id="info-email" class="info-email" value="${email}">
        </div>
    </div>
    <input type="submit" id="actualizar" name="actualizar" class="actualizar" value="Actualizar datos">
</form><hr><br>
<form action="perfil.php" id="perfil-form" method="post">
    <div name="info-card" id="info-card" class="info-card">
        <div class="id-card">
            <span>Id:</span>
            <input type="text" name="info-id" id="info-id" class="info-id" value="${id}" readonly>
        </div>
        <div class="user-card">
            <span>Usuario:</span>
            <input type="text" name="info-user" id="info-user" class="info-user" value="${usuario}" readonly>
        </div>
        <div class="password-card">
            <span>Contrasena actual:</span>
            <input type="password" name="info-pass1" id="info-pass1" class="info-pass1">
        </div>
        <div class="password-card">
            <span>Contrasena nueva:</span>
            <input type="password" name="info-pass2" id="info-pass2" class="info-pass2">
        </div>
    </div>
    <input type="submit" id="actualizar2" name="actualizar2" class="actualizar2" value="Cambiar contrasena">
</form>`
formulario.innerHTML += template;
}

function cargar_publicaciones(usuario, contenido, imagen, pub_id) {
    var midle_content = document.getElementById('midle-content');
    if (imagen!= "") {
        const template = `<div name="publicacion" id="publicacion" class="publicacion">
        <form action="publicacion.php" method="post">
                        <div name="pub-name" id="pub-name" class="pub-name">
                            <input type="hidden" name="pub_id" value="${pub_id}" style="width:30px ; font-size: 8pt; height:12px; background-color: #50D8D7; border:none;"></input>
                            <button type="submit" style="font-size: 14pt; background-color: #50D8D7; padding: 0px; border:none;">${usuario}</button>
                            <input type="submit" class="abrir-publicacion" name="abrir-publicacion" value="Abrir publicacion"></input>
                            <br><br>
                        </div>
                        <div name="pub-content" id="pub-content" class="pub-content">
                            <p>${contenido}</p>
                            <br>
                            <div>
                                <a href=""><img src="../archivo/${imagen}"></a>
                                <br>
                            </div>
                        </div>
                    </form><br>
    <div name="pub-coments" id="pub-coments" class="pub-coments">
        <h3>Comentarios</h3><hr><br>
        <div name="comented" class="comented" id="${pub_id}" class="comented">
            
        </div>
        <hr>
        <div name="coment-area" id="coment-area" class="coment-area">
            <form action="hub.php" method="post">
                <input type="hidden" name="pub_id" id="pub_id" value="${pub_id}" style="width:30px ; font-size: 8pt; height:12px; background-color: #50D8D7; border:none;"></input>
                <input type="text" name="coment" id="coment" class="coment" placeholder="Deja tu comentario"><br><br>
                <input type="submit" name="comentar" id="comentar" class="comentar" value="Comentar">
            </form>
        </div>
    </div>
</div>`
midle_content.innerHTML += template;
    } else {
        const template = `<div name="publicacion" id="publicacion" class="publicacion">
        <form action="publicacion.php" method="post">
                        <div name="pub-name" id="pub-name" class="pub-name">
                            <input type="hidden" name="pub_id" id="pub_id" value="${pub_id}" style="width:30px ; font-size: 8pt; height:12px; background-color: #50D8D7; border:none;"></input>
                            <button type="submit" style="font-size: 14pt; background-color: #50D8D7; padding: 0px; border:none;">${usuario}</button>
                            <input type="submit" class="abrir-publicacion" name="abrir-publicacion" value="Abrir publicacion"></input>
                            <br><br>
                        </div>
                        <div name="pub-content" id="pub-content" class="pub-content">
                            <p>${contenido}</p>
                            <br>
                        </div>
                    </form><br>
    <div name="pub-coments" id="pub-coments" class="pub-coments">
    <h3>Comentarios</h3><hr><br>
        <div name="comented" id="${pub_id}" class="comented">
            
        </div>
        <hr>
        <div name="coment-area" id="coment-area" class="coment-area">
            <form action="hub.php" method="post">
                <input type="hidden" name="pub_id" value="${pub_id}" style="width:30px ; font-size: 8pt; height:12px; background-color: #50D8D7; border:none;"></input>
                <input type="text" name="coment" id="coment" class="coment" placeholder="Deja tu comentario"><br><br>
                <input type="submit" name="comentar" id="comentar" class="comentar" value="Comentar">
            </form>
        </div>
    </div>
</div>`
midle_content.innerHTML += template;
    }
}

function cargar_publicacion(usuario, contenido, imagen, pub_id) {
    var midle_content = document.getElementById('midle-content');
    if (imagen!= "") {
        const template = `<div name="publicacion" id="publicacion" class="publicacion">
        <form action="publicacion.php" method="post">
                        <div name="pub-name" id="pub-name" class="pub-name">
                            <input type="hidden" name="pub_id" value="${pub_id}" style="width:30px ; font-size: 8pt; height:12px; background-color: #50D8D7; border:none;"></input>
                            <button type="submit" style="font-size: 14pt; background-color: #50D8D7; padding: 0px; border:none;">${usuario}</button>
                            <br><br>
                        </div>
                        <div name="pub-content" id="pub-content" class="pub-content">
                            <p>${contenido}</p>
                            <br>
                            <div>
                                <a href=""><img src="../archivo/${imagen}"></a>
                                <br>
                            </div>
                        </div>
                    </form><br>
    <div name="pub-coments" id="pub-coments" class="pub-coments">
        <h3>Comentarios</h3><hr><br>
        <div name="comented" class="comented" id="${pub_id}" class="comented">
            
        </div>
        <hr>
        <div name="coment-area" id="coment-area" class="coment-area">
            <form action="publicacion.php" method="post">
                <input type="hidden" name="pub_id" id="pub_id" value="${pub_id}" style="width:30px ; font-size: 8pt; height:12px; background-color: #50D8D7; border:none;"></input>
                <input type="text" name="coment" id="coment" class="coment" placeholder="Deja tu comentario"><br><br>
                <input type="submit" name="comentar" id="comentar" class="comentar" value="Comentar">
            </form>
        </div>
    </div>
</div>`
midle_content.innerHTML += template;
    } else {
        const template = `<div name="publicacion" id="publicacion" class="publicacion">
        <form action="publicacion.php" method="post">
                        <div name="pub-name" id="pub-name" class="pub-name">
                            <input type="hidden" name="pub_id" id="pub_id" value="${pub_id}" style="width:30px ; font-size: 8pt; height:12px; background-color: #50D8D7; border:none;"></input>
                            <button type="submit" style="font-size: 14pt; background-color: #50D8D7; padding: 0px; border:none;">${usuario}</button>
                            <br><br>
                        </div>
                        <div name="pub-content" id="pub-content" class="pub-content">
                            <p>${contenido}</p>
                            <br>
                        </div>
                    </form><br>
    <div name="pub-coments" id="pub-coments" class="pub-coments">
    <h3>Comentarios</h3><hr><br>
        <div name="comented" id="${pub_id}" class="comented">
            
        </div>
        <hr>
        <div name="coment-area" id="coment-area" class="coment-area">
            <form action="publicacion.php" method="post">
                <input type="hidden" name="pub_id" value="${pub_id}" style="width:30px ; font-size: 8pt; height:12px; background-color: #50D8D7; border:none;"></input>
                <input type="text" name="coment" id="coment" class="coment" placeholder="Deja tu comentario"><br><br>
                <input type="submit" name="comentar" id="comentar" class="comentar" value="Comentar">
            </form>
        </div>
    </div>
</div>`
midle_content.innerHTML += template;
    }
}

function cargar_comentarios(usuario, comentario, pub_id) {
    var comentarios = document.getElementById(pub_id);
    const template = 
    `<div name="one-coment" id="one-coment" class="one-coment">
        <a href="" style="font-weight: bold; font-size: 16pt;">${usuario}: </a><br><br><p>${comentario}</p>
    </div><br><br>`
    comentarios.innerHTML += template;
}
