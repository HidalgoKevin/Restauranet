$(document).ready(function() {
    $("#loginCliente").on("click", function() {
        window.location = "cliente.html"
    });

    $("#loginRestaurante").on("click", function() {
        window.location = "restaurante.html"
    });

    $("#logOff").on("click", function() {
        window.location = "app.html"
    });

    $("#btnBuscar").on("click", function() {
        window.location = "busqueda.html"
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
});