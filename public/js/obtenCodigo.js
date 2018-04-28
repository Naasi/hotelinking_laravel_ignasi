
//When getCode button click
$("#obtenerCodigo").click(function() {
    //Disallow if not login
    if (sessionStorage.getItem("id") == null) {
        alert("Login to get your promotional codes");
    } else {
        //Confirm action and request code to WS
        if (confirm("Are you sure you want to get this promotional code?")) {
            $.ajax({
                async: true,
                url: "codes/generateCode/" + sessionStorage.getItem("id"),
                method: "GET",
                success: function(result){
                    //Si ha ido bien
                    if (result == "1") {
                        alert("Your promotional code has been generated, you can see all the ones you have generated in 'My Coupons'.");
                    //Si ha ido mal
                    } else {
                        alert("Your promotional code request could not be processed");
                    }
                },
            
                //Si se produce un error con el servidor
                error: function (err) {
                    alert("An error has occurred with the server, please try again later.");
                }
            });
        }
    }
});

