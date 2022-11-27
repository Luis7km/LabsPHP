function open_hub() {
    window.open('../renderizados/hub.php', "_self");
}

function cargar_publicaciones(usuario, contenido, imagen) {
    var midle_content = document.getElementById('midle-content');
    if (imagen!= "") {
        const template = `<div name="publicacion" id="publicacion" class="publicacion">
    <div name="pub-name" id="pub-name" class="pub-name">
        <a href=""><span>${usuario}</span></a>
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
    <div name="pub-coments" id="pub-coments" class="pub-coments">
        <div name="comented" id="comented" class="comented">
            <div name="one-coment" id="one-coment" class="one-coment">
                <a href="">Regis Rivera: </a><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
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
    <div name="pub-name" id="pub-name" class="pub-name">
        <a href=""><span>${usuario}</span></a>
        <br><br>
    </div>
    <div name="pub-content" id="pub-content" class="pub-content">
        <p>${contenido}</p>
        <br>
    </div>
    <div name="pub-coments" id="pub-coments" class="pub-coments">
        <div name="comented" id="comented" class="comented">
            <div name="one-coment" id="one-coment" class="one-coment">
                <a href="">Regis Rivera: </a><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
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
