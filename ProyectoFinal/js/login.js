function verificar_usuario(user, pass) {
    var data;
    $.ajax({
        type: "POST",
        url: "http://localhost/proyectofinal/api/login.php",
        async: false,
        dataType: "json",
        data: JSON.stringify({ usuario: user, contrasena: pass }),
        dataType: "json",
        contentType: "application/json",
        success: function(result){
            console.log(result);
            data = result;
        }
    });
    return data;
}
