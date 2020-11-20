<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>NOTIFICACIONES</title>
</head>
<body>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="container">
            <div class="row">
                <div class="col-8">
                Se realizo correctamente el registro.
                </div>
                <div class="col col-lg-2 d-flex justify-content-end d-flex align-items-center">
                <img src="./../assets/icons/icons-1.0.0-alpha5/check-circle.svg" alt="" width="16" height="16" title="Cerrar">
                </div>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <div class="container">
            <div class="row">
                <div class="col-8">
                <h4 class="alert-heading">Datos requeridos!</h4>
                </div>
                <div class="col col-lg-2 d-flex justify-content-end d-flex align-items-center">
                <img src="./../assets/icons/icons-1.0.0-alpha5/info-circle.svg" alt="" width="16" height="16" title="Cerrar">
                </div>
            </div>
        </div>
        <hr>
        <ul>
        <li>El campo de <strong>Stock</strong> debe ser un número.</li>
        <li>El campo <strong>Nombre</strong> es obligatorio.</li>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>