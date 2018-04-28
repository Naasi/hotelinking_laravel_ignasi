//Petición al WS para obtener todos los códigos promocionales de un usuario
$.ajax({
    async: true,
    url: "codes/userCodes/"+sessionStorage.getItem("id"),
    method: "GET",
    success: function(result){
        //Put the table result on DIV of HTML
        $("#cupones").html(result);
    },

    //If Serever fails
    error: function (err) {
        alert("Se ha producido un error con el servidor, por favor, inténtelo de nuevo más tarde" + err);
    }
});

//Cuando pulsan cualquier botón de canjear
$(document).on('click', '#botonCanjear', function (event) {
    event.preventDefault();

    //Pedimos confirmación, i si es así, hacemos la petición al servidor
    if (confirm("¿Estás seguro que quieres canjear este código?")) {
        $.ajax({
            async: true,
            url: "codes/redeemCode/" + $(this).closest('tr').find("#cod").html(),
            method: "GET",
            success: function(result){
                //Response with status update
                if (result == 1) {
                    alert("Se ha canjeado tu código correctamente'");
                    location.href = "codes";


                } else {
                    alert("No se ha podido canjear tu código promocional " + result);
                }
            },
            
            //Si ocurre un error en el sevidor
            error: function (err) {
                alert("Se ha producido un error con el servidor, por favor, inténtelo de nuevo más tarde");
            }
        });
    }
});