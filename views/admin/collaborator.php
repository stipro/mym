<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--Open Sans Font [ OPTIONAL ]-->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link rel="stylesheet" href="./../../libs/bootstrap-4.5.0/css/bootstrap.min.css">
        <!--Nifty Stylesheet [ REQUIRED ]-->
        <link href="./../../assets/css/nifty.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg navbar-fixed">
            <!--NAVBAR-->
        <!--===================================================-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img src="./../../assets/icons/icons-1.0.0-alpha5/search.svg" alt="" width="32" height="32" title="Notificacion">
            <img src="./../../assets/icons/icons-1.0.0-alpha5/bell.svg" alt="" width="32" height="32" title="Notificacion">
            <img src="./../../assets/icons/icons-1.0.0-alpha5/person.svg" alt="" width="32" height="32" title="usuario">
            <img src="./../../assets/icons/icons-1.0.0-alpha5/three-dots-vertical.svg" alt="" width="32" height="32" title="configuracion">
            

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo "$inicio.php" ?>">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Comisiones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo $comision."/main.php" ?>">Inicio</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Inventario
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo $inventario."/main.php" ?>">Inicio</a>
                    <a class="dropdown-item" href="<?php echo $inventario."/products.php" ?>">Producto</a>
                    <a class="dropdown-item" href="<?php echo $inventario."/providers.php" ?>">Proveedor</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Transporte
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo $transporte."/main.php" ?>">Inicio</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <!--===================================================-->
        <!--END NAVBAR-->
    </div>
</body>
</html>