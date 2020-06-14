<?php
//OBTENEMOS URL
$urlobtained = $_SERVER["REQUEST_URI"];
//SEPARACION URL
$urlseparate = explode("/", $urlobtained);
//ALMACENAMOS NOMBRE DE MODULO
$urlcurrent = $urlseparate[3];
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Hello, <?php echo $urlcurrent?>!</title>
  </head>
<body>
<?php
  //Llamo Nav
  include ('../nav.php');
?>
    <div class="container-fluid">
        <div class="shadow p-3 mb-5 bg-white rounded">
            <h2>Modulo Comisiones</h2>

            <!-- SELECCIONAR ARCHIVO -->
            <div id="alert_rpta_group" class="d-flex flex-column justify-content-center">

            </div>
            <div class="shadow p-3 mb-5 bg-white rounded">
                <div id="ajaxArchUpload" class="d-flex flex-column justify-content-center">
                    
                </div>
                <div class="form-group">
                    <label for="">HERRAMIENTAS</label>
                    <div>
                        <div id="pruebadd" class="btn-group" role="group" aria-label="Button group">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal">
                                Archivos
                            </button>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal">
                                Reportes
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group was-validated">
                    <label for="customFileLang">Excel</label>
                    <!--<div class="input-group mb-3">-->
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Archivos (xlsx)</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFileLang" lang="es" required>
                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label> 
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="customFileLang">Subir</span>
                        </div>
                    </div>
                    <div class="invalid-feedback"> Elegir un archivo Excel </div>
                    <div id="contprogArchExcel">
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-month-input">Seleccionar Año y Mes</label>
                    <div class="custom-file">
                        <input id="damoArchExcel" class="form-control" type="month" value="" id="example-month-input" disabled>
                    </div>
                </div>


                <div class="btn-group" role="group" aria-label="Button group">
                    
                </div>
                <div class="form-group d-flex flex-row">
                    <div class="col d-flex align-items-center justify-content-stard">

                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <!--PONER disabled BOTON -->
                            <button id="btnactionsExcel" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acciones 
                            </button>
                            <div class="dropdown-menu">
                                <a id="agenerarReport" class="dropdown-item active" href="#generarExcelModal" data-toggle="modal">Generar Reporte</a>
                                <a id="a" class="dropdown-item disabled" href="#">Visualizar Reporte</a>
                                <a id="a" class="dropdown-item disabled" href="#">Modificar Reporte</a>
                                <a id="a" class="dropdown-item disabled" href="#">Descargar Reporte</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item disabled" href="#">Eliminar Reporte</a>
                            </div>
                        </div>
                    </div>
                    <!---->
                    <div class="col d-flex align-items-center justify-content-end"> 

                        <div class="d-flex justify-content-end">
                            <button type="button" id="btn_insert_excel" class="btn btn-primary" id="btnregistrarExcel" disabled>Registrar</button>
                        </div> 
                    </div>
                </div>



            </div>
            <!-- EXCEL IMPORTAR-->

            <!--CONTENEDO FOOTER-->
            <div class="container form-group">                      
                <!--DIVIMOS ESPACION (2) -->
                <div class="row">
                    <div class="col d-flex align-items-center justify-content-center">
                        <div class="form-group">
                            <label for="customSwitch1">Visualizar Tabla</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" disabled id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                        </div>
                    </div>
                </div>
            <!---->
            </div>
            <!--CARGAR -->
            <!--res (respuesta) -->
            <div id="gentablaajax" class="d-flex flex-column justify-content-center">

            </div>
            <div class="cont-exceltable">
                <table id="exceltable" class="table table-hover"></table>
            </div>
            <!---->
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>