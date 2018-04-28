<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>HoteLinking</title>
    <!-- For smartphones -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/numscroller-1.0.js"></script>

    <!-- fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>

</head>

<body>
<!-- Header -->
<div class="header wow zoomIn" style="height: 50px;">
    <div class="container">
        <!-- login and register buttons -->
        <div class="header_right">
            <div class="login">
                <ul id="logReg">
                    <li><a href="#" data-toggle="modal" data-target="#myModal4"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Login</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal5"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Register</a></li>
                </ul>
                <p id="nombreUsuario" class="ocult"></p>
                <a id="logout" href="#" onclick="logout()" class="ocult"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Logo and nav -->
<div class="header-bottom ">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo grid">
                    <div class="grid__item color-3">
                        <h1><a class="link link--nukun" href="home"><i></i>HOTE<span>L</span>INKING</a></h1>
                    </div>
                </div>
            </div>

            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="menu menu--horatio">
                    <ul class="nav navbar-nav menu__list">
                        <li class="menu__item menu__item--current"><a href="home" class="menu__link">Home</a></li>
                        <li class="menu__item"><a href="codes" class="menu__link">My Coupons</a></li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
</div>

<!-- Get code button -->
<div class="capacity">
    <div class="container">
        <h3>Get your promotional codes</h3>
        <br>
        <h1 class="t-button">
            <center><a id="obtenerCodigo" href="#"><span class="label label-success">Get Code</span></a></center>
        </h1>
    </div>
</div>

<!-- Login PopUp -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button id="closeModal4" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login-right">
                        <h3>Login</h3>
                        <form action="#" method="post" id="loginUs">
                            <div class="sign-in">
                                <h4>Email :</h4>
                                <input id="mailLogin" type="email" name="Type here" required>
                            </div>
                            <div class="sign-in">
                                <h4>Password :</h4>
                                <input id="passLogin" type="password" name="Password" required>
                            </div>
                            <div class="sign-in">
                                <input id="loginBut" type="submit" value="Login" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Register PopUp -->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button id="closeModal5" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login-bottom">
                        <h3>Register</h3>
                        <form id="registerUs" action="#" method="post">
                            <div class="sign-in">
                                <h4>Username :</h4>
                                <input id="usReg" type="text" name="Type here" value="" required>
                            </div>

                            <div class="sign-in">
                                <h4>Email :</h4>
                                <input id="mailReg" type="email" name="Type here" value="" required>
                            </div>

                            <div class="sign-in">
                                <h4>Password:</h4>
                                <input id="passReg" type="password" name="Password" value="" required>
                            </div>

                            <div class="sign-in">
                                <input id="submitReg" type="submit" value="Register" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Replace login and register buttons to put username and Logout -->
<script>
    if (sessionStorage.getItem("usuario") != null) {
        //Quitamos los botones de login y registro
        $("#logReg").addClass('ocult');

        //Mostramos el nombre del usuario
        $("#nombreUsuario").html("<b style='color:white'>Hi, " + sessionStorage.getItem("usuario") +"</b>");
        $("#nombreUsuario").removeClass('ocult');
        $("#logout").removeClass('ocult');
    }

    //Función para desloguear al usuario
    function logout () {
        //Quitamos los botones de login y registro
        $("#logReg").removeClass('ocult');

        //Mostramos el nombre del usuario
        $("#nombreUsuario").addClass('ocult');

        //Marcamos que ha iniciado sesión
        sessionStorage.removeItem("usuario");
        sessionStorage.removeItem("email");

        //Redireccionamos a la Home
        location.href = "home";

    }
</script>

<!-- Script que ejecuta una petición al WS para comprobar login y registro -->
<script src="js/login.js"></script>

<!-- Script que ejecuta una petición al WS para obtener el código promocional -->
<script src="js/obtenCodigo.js"></script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>
</html>

