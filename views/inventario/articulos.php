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
    <title>Articulos - Inventario</title>
</head>
<body>
<?php
    //Llamo Nav
    include ('../nav.php');
?>
<div class="container-fluid">
    <div class="shadow-sm p-3 mb-2 bg-white rounded">
        <h2>Bienvenido al modulo Articulos - Inventario</h2>
    </div>
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-fill bd-highlight">
                    <h4>Articulos</h4> 
                </div>
                <div class="p-2 flex-fill bd-highlight d-flex justify-content-end">
                    <button type="button" id="btn_mdl_article" class="btn btn-primary">
                        Nuevo
                    </button>
                </div>
            </div>
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
                            <option data-tokens="">Selecciona un Almacen<option>
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
        </div>
    </div>
</div>

<script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="./../../assets/js/jquery-ui.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-select/js/popper.min.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-4.5.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-select/js/i18n/defaults-es_ES.min.js" type="text/javascript"></script>
<?php
    include ("./article_create.php");
?>
<div id="modal-requested">

</div>
<script>
$(document).on('click', '#btn_mdl_article', function() {
        $('#md_cArticulo').modal('show');
});
</script>
</body>
</html>