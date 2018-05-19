function consultarAdministrador() {
    $(document).ready(function () {

        $.post('../../Business/administradorAction.php', {

            accionAdministrador: 'consultarAdministrador',
        },
                function (responseText) {


                });
    });
}

var id = 0;
function actualizarAdministrador(idadministrador) {

    id = idadministrador;
    //  $('#popup2').modal('open');

}
function actualizar() {
    $(document).ready(function () {

        $.post('../Business/administradorAction.php', {

            accionAdministrador: 'actualizarAdministrador',
            cedula: document.getElementById("cedula").value,
            nombre: document.getElementById("nombre").value,
            primerapellido: document.getElementById("primerApellido").value,
            segundoapellido: document.getElementById("segundoApellido").value,
            idadministrador: id,
        },
                function (responseText) {
                    alert(responseText);
                    var url = "../View/perfilAdministradorView.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {},
                        success: function (datos) {
                            $('#principal').html(datos);
                        }
                    });
                });
    });
}



