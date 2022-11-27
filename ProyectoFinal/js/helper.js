function open_hub() {
    window.open('../renderizados/hub.php', "_self");
}

function open_login() {
    window.open('../renderizados/login.php', "_self");
}

function cargar_perfil(id, nombre, apellido, usuario, email, contrasena) {
    var formulario = document.getElementById('perfil-form');
    const template = `<div name="info-card" id="info-card" class="info-card">
    <div class="id-card">
        <span>Id:</span>
        <input type="text" name="info-id" id="info-id" class="info-id" value="${id}" readonly>
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
    <div class="user-card">
        <span>Usuario:</span>
        <input type="text" name="info-user" id="info-user" class="info-user" value="${usuario}" readonly>
    </div>
    <div class="password-card">
        <span>Contrasena:</span>
        <input type="text" name="info-pass" id="info-pass" class="info-pass" value="${contrasena}">
    </div>
</div>
<input type="submit" id="actualizar" name="actualizar" class="actualizar">`
formulario.innerHTML += template;
}

function cargar_publicaciones(usuario, contenido, imagen) {
    var midle_content = document.getElementById('midle-content');
    if (imagen!= "") {
        const template = `<div name="publicacion" id="publicacion" class="publicacion">
        <form action="">
                        <div name="pub-name" id="pub-name" class="pub-name">
                            <a href=""><span style="font-weight: bold; font-size: 14pt;">${usuario}</span></a>
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
                    </form>
    <div name="pub-coments" id="pub-coments" class="pub-coments">
        <div name="comented" id="comented" class="comented">
            <div name="one-coment" id="one-coment" class="one-coment">
                <a href="" style="font-weight: bold; font-size: 16pt;">Regis Rivera: </a><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <br>
        <div name="coment-area" id="coment-area" class="coment-area">
            <form action="">
                <input type="text" name="coment" id="coment" class="coment" placeholder="Deja tu comentario"><br><br>
                <input type="submit" name="comentar" id="comentar" class="comentar" value="Comentar">
            </form>
        </div>
    </div>
</div>`
midle_content.innerHTML += template;
    } else {
        const template = `<div name="publicacion" id="publicacion" class="publicacion">
        <form action="">
                        <div name="pub-name" id="pub-name" class="pub-name">
                            <a href=""><span style="font-weight: bold; font-size: 16pt;">${usuario}</span></a>
                            <br><br>
                        </div>
                        <div name="pub-content" id="pub-content" class="pub-content">
                            <p>${contenido}</p>
                            <br>
                        </div>
                    </form>
    <div name="pub-coments" id="pub-coments" class="pub-coments">
        <div name="comented" id="comented" class="comented">
            <div name="one-coment" id="one-coment" class="one-coment">
                <a href="" style="font-weight: bold; font-size: 16pt;">Regis Rivera: </a><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <br>
        <div name="coment-area" id="coment-area" class="coment-area">
            <form action="">
                <input type="text" name="coment" id="coment" class="coment" placeholder="Deja tu comentario"><br><br>
                <input type="submit" name="comentar" id="comentar" class="comentar" value="Comentar">
            </form>
        </div>
    </div>
</div>`
midle_content.innerHTML += template;
    }
}
