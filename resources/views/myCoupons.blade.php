<!doctype html>
<html lang="{{ app()->getLocale() }}">
<!DOCTYPE html>
<html>
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
        <!-- Login and Register buttons -->
        <div class="header_right">
            <div class="login">
                <ul id="logReg" class="ocult">
                    <li><a href="#" data-toggle="modal" data-target="#myModal4"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Login</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal5"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Register</a></li>
                </ul>
                <p id="nombreUsuario"></p>
                <a href="#" onclick="logout()"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Logout</a>

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
                        <li class="menu__item"><a href="home" class="menu__link">Home</a></li>
                        <li class="menu__item menu__item--current"><a href="/codes" class="menu__link">My Coupons</a></li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
</div>

<!-- List of all active cupons -->
<div class="capacity">
    <div class="container">
        <h3>Consult all your promotional codes</h3>
        <br>
        <div id="cupones"></div>
    </div>
</div>

<script>
    //Redirect to home if not login
    if (sessionStorage.getItem("usuario") == null) {
        location.href="home";
    } else {
        //Show username
        $("#nombreUsuario").html("<b style='color:white'>Hi, " + sessionStorage.getItem("usuario")+"</b>");
    }

    //Logout function
    function logout () {
        //Remove login and register buttons
        $("#logReg").removeClass('ocult');

        //Hide username
        $("#nombreUsuario").addClass('ocult');

        //Session variables of login
        sessionStorage.removeItem("usuario");
        sessionStorage.removeItem("id");

        //Redirect to home
        location.href = "home";

    }
</script>

<!-- Script that executes a request to the WS to check login and registration -->
<script src="js/login.js"></script>

<!-- Script that executes a request to WS to obtain the user's promotional codes -->
<script src="js/obtenCodigosUsuario.js"></script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>
</html>

