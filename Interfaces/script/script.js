$(document).ready(function() {

    $.getJSON("script/localidades.json",
        function(dato) {
            for (d in dato.localidades) {
                $('#selBuscar').append($("<option></option>").attr("value",
                    d).text(dato.localidades[d].nombre + "/" + dato.localidades[d].provincia.nombre));
            }
        }
    );

    $("#loginCliente").on("click", function() {
        window.location = "cliente.html"
            // $.ajax({
            //     type: "GET",
            //     url: "../login.php",
            //     async: true,
            //     success: function(response) {
            //         window.location = "cliente.html"
            //     },
            //     error: function(obj, error, objError) {
            //         console.log("no se conecta con el servidor");
            //     }
            // });
            // pop_up("../php/index.php");
    });

    $("#loginRestaurante").on("click", function() {
        window.location = "restaurante.html"
    });

    $("#logOut").on("click", function() {
        window.location = "app.html"
    });

    $("#btnBuscar").on("click", function() {
        //window.location = "busqueda.html"
        $.ajax({
            type: "POST",
            url: "restaurante.php",
            contentType: "application/json; charset=utf-8",
            data: null,
            dataType: "json",
            success: function(result) {

                $.each(result, function() {

                    /*$('#selEmpleado').append($("<option></option>").attr("value",
                        this.idempleado).text(this.apellido));*/

                });

            },
            error: function(xhr, status, error) {
                console.log("No ha sido posible cargar las opciones.");
            }
        })
    });

    $("#ver").on("click", function() {
        window.location = "infoRestaurante.html"
    });

    $("#btnAgregar").on("click", function() {
        var numSucursal = $("#numSucursal1").val();
        var direccion = $("#direccion1").val();
        var ciudad = $("#ciudad1").val();
        var telefono = $("#telefono1").val();
        var email = $("#email1").val();
        var tds = '<tr>';
        tds += '<td><div class=\"media border p-3\"><img src=\"imagen/restaurante.jpg\" alt=\"sucursal\" class=\"mr-3 mt-3 rounded-circle\" width=\"80\" height=\"80\"><div class=\"media-body\"><p>' + numSucursal + '</p><p>' + direccion + '</p><p>' + ciudad + '</p><p>' + telefono + '</p><p>' + email + '</p></div></div></td>';
        tds += '</tr>';
        $("#tablaSucursales").append(tds);
    });

    $("#selectSucursal1:selected").on("click", function() {
        $("#btnModificar").on("click", function() {
            var numSucursal = $("#numSucrsal1").val();
            var direccion = $("#direccion1").val();
            var ciudad = $("#ciudad1").val();
            var telefono = $("#telefono1").val();
            var email = $("#email1").val();
            var tds = '<tr>';
            tds += '<td><div class=\"media border p-3\"><img src=\"imagen/restaurante.jpg\" alt=\"sucursal\" class=\"mr-3 mt-3 rounded-circle\" width=\"80\" height=\"80\"><div class=\"media-body\"><p>' + numSucursal + '</p><p>' + direccion + '</p><p>' + ciudad + '</p><p>' + telefono + '</p><p>' + email + '</p></div></div></td>';
            tds += '</tr>';
            $("#tablaSucursales").append(tds);
        });
    });

    $("#btnQuitar").on("click", function() {
        $("#selectSucursal:selected").remove();
    });

    function pop_up(pagina) {
        var opciones = "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
        window.open(pagina, "", opciones);
    }


});