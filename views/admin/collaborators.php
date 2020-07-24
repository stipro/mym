<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link rel="stylesheet" href="./../../libs/bootstrap-select/css/bootstrap-select.min.css">
        <!--Open Sans Font [ OPTIONAL ]-->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link rel="stylesheet" href="./../../libs/bootstrap-4.5.0/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<?php
    //Llamo Nav
    include ('../nav.php');
?>
<div class="container-fluid">
    <div class="shadow-sm p-3 mb-2 bg-white rounded">
        <h1>Bienvenido!</h1>
    </div>
        <div class="card text-left">
            <div class="card-header">
                colaborador
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btn_modal_ccollaborator">
                Nuevo
                </button>
            </div>
            <div class="card-body">
            <!--<h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                <div class="form-row">
                <div class="col">
                    <!-- Almacen -->
                    <div class="form-group">                                        
                    <label for="filAlm"><strong>Almacen</strong></label>
                    <select id="filAlm" class="selectpicker form-control" data-live-search="true">
                        <option data-tokens="">Selecciona un Almacen</option>
                        <option data-tokens="Recepción">Recepción</option>
                        <option data-tokens="Sistemas">Sistemas</option>
                    </select>
                    </div>
                </div>
                <div class="col">
                    <!-- Producto -->
                    <div class="form-group">                                        
                    <label for="filCodNom"><strong>Proveedor</strong></label>
                    <select id="filCodNom" class="selectpicker form-control" data-live-search="true">
                        <option data-tokens="">Selecciona o busque un Producto</option>
                        <option data-tokens="Lapicero">Lapicero</option>
                        <option data-tokens="Borrador">Borrador</option>
                        <option data-tokens="Papel">Papel</option>
                    </select>
                    </div>
                    </div>
                </div>

            <form>
                <div class="row">
                <div class="col-sm">
                    <!---->
                    <div class="form-group">                                        
                    <label for="filcat"><strong>Filtrar por categoria</strong></label>
                    <select id="filcat" class="selectpicker form-control" data-live-search="true">
                        <option data-tokens="">Selecciona una categoría</option>
                        <option data-tokens="Accesorios">Accesorios</option>
                        <option data-tokens="Equipos">Equipos</option>
                        <option data-tokens="Repuestos">Repuestos</option>
                    </select>
                    </div>

                </div>
                <div class="col-sm">
                    <!---->
                    <div class="form-group">                                        
                    <label for="filrango"><strong>Rango de Fecha</strong></label>
                    <input id="filrango" class="form-control"  type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
                    </div>

                </div>
                </div>
            </form>

            <hr>
            <div id="div_tabla">
            </div>
            </div>
            <div class="card-footer text-muted">
            <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </nav>
            </div>
        </div>
    </div>
<script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="./../../assets/js/jquery-ui.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-select/js/popper.min.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-4.5.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-select/js/i18n/defaults-es_ES.min.js" type="text/javascript"></script>
<div id="modal-requested" class="">
<?php
    include ("./collaborator_create.php");
?>
</div>
</body>
</html>