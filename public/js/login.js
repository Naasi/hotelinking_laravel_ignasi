//Login form submit
$("#loginUs").submit(function (e) {
    e.preventDefault();

    //Request to WS to validate user
    $.ajax({
        async: true,
        url: "user/check/" + document.getElementById("mailLogin").value + "/" + document.getElementById("passLogin").value,
        method: "GET",
        success: function(result){

            //Get results
            var response = JSON.parse(result);

            //If user don't exist
            if (response == '') {
                alert("This user don't exist");

            } else {

                //Close PopUp
                document.getElementById('closeModal4').click();

                //Remove buttons of login and register
                $("#logReg").addClass('ocult');

                //Show username and option of logout
                $("#nombreUsuario").html("<b style='color:white'>Hola, " + response[0].user+"</b>");
                $("#nombreUsuario").removeClass('ocult');
                $("#logout").removeClass('ocult');

                //Fill session variables with username and id
                sessionStorage.setItem("usuario", response[0].user);
                sessionStorage.setItem("id", response[0].id);
            }
        },
    
        //Server error
        error: function (err) {
            alert("Se ha producido un error con el servidor, por favor, inténtelo de nuevo más tarde");
        }
    });
});

//Register form submit
$("#registerUs").submit(function (e) {
    e.preventDefault();

    //Request to WS to register user
    $.ajax({
        async: true,
        url: "user/insert/" + document.getElementById("usReg").value + "/" + document.getElementById("mailReg").value + "/" + document.getElementById("passReg").value,
        method: "GET",
        success: function(result){
            alert(result);

        },
    
        //Server Error
        error: function (err) {
            alert("Se ha producido un error con el servidor, por favor, inténtelo de nuevo más tarde");
        }
    });
});
