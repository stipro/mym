<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Fecha -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="container py-4">
  <div class="row">
    <div class="col-md-12">
        <h2>Module</h2>
        <nav class="d-flex justify-content-end">
        <div class="nav nav-tabs" id="nav-tab" role="group">
            <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Consulta DB Principal</a>
            <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Consulta Archivo Servidor</a>
            <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Consulta Seleccion de Archivo</a>
        </div>
        </nav><!--
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">.1.</div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">.2.</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">.3.</div>
        </div>
        <div class="btn-group" class="nav nav-tabs" role="group" role="tablist" aria-label="Basic example">
            <button type="button" class="btn btn-outline-primary" data-target="#tab1" data-toggle="tab">Consulta DB Principal</button>
            <button type="button" class="btn btn-outline-primary" data-target="#tab2" data-toggle="tab">Consulta Archivo Servidor</button>
            <button type="button" class="btn btn-outline-primary" data-target="#tab3" data-toggle="tab">Consulta Seleccion de Archivo</button>
        </div>
      <ul id="tabs" class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link small text-uppercase active" data-target="#tab1" data-toggle="tab">Consulta DB Principal</a></li>
        <li class="nav-item"><a class="nav-link small text-uppercase" data-target="#tab2" data-toggle="tab">Consulta Archivo Servidor<span style="margin-top:4px" class="ml-2 float-right badge badge-pill badge-warning">10</span></a></li>
        <li class="nav-item"><a class="nav-link small text-uppercase" data-target="#tab3" data-toggle="tab">Consulta Seleccion de Archivo<span style="margin-top: 4px" class="ml-2 float-right badge badge-pill badge-danger">75</span></a></li>
      </ul>-->
      <br>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row container d-flex justify-content-center">
            <div class="col-md-12">
                <div class="col-sm"> 
                    <fieldset>
                        <legend>Consulta Directo Base Datos</legend>
                        <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Elegir Fecha</label>
                            <input id="date_range" class="form-control icdateconsult" type="text" name="daterange" value="02/01/2021 - 12/01/2021" />
                            <small id="emailHelp" class="form-text text-muted">Puedes seleccionar un dia o un rango de dias</small>
                        </div>
                        <!--
                        <label for="start">Start date:</label>
                            <input class="form-control icdateconsult" type="date" id="start" name="trip-start"
                                value="2020-12-21">-->
                        <!-- UNIDAD -->
                        <div class="form-row">
                            <div class="form-group col-sm">                                        
                                <label for="sUnidad"><strong>Unidad</strong></label>
                                <select id="sUnidad" class="selectpicker form-control" data-live-search="true">
                                <option data-tokens="">Selecciona un Almacen</option>
                                <option data-tokens="AQP" selected>AREQUIPA</option>
                                <option data-tokens="LIMA">LIMA</option>
                                <option data-tokens="*">TODOS</option>
                                <option data-tokens="TRANSPORTE">TRANSPORTE</option>
                                </select>
                                <small id="" class="form-text text-muted">Puede seleccionar sola una opción</small>
                            </div>
                            <!-- Almacen -->
                            <div class="form-group col-sm">                                        
                                <label for="sCanal"><strong>Canal</strong></label>
                                <select id="sCanal" class="selectpicker form-control" data-live-search="true">
                                <option data-tokens="">Selecciona un canal</option>
                                <option data-tokens="04">FARMA</option>
                                <option data-tokens="01">CONSUMO</option>
                                <option data-tokens="06">INSTITUCIONES</option>
                                <option data-tokens="TODOS">TODOS</option>
                                <option data-tokens="02">TRANSPORTE</option>
                                <option data-tokens="07">LICITACION</option>
                                </select>
                                <small id="" class="form-text text-muted">Puede seleccionar sola una opción</small>
                            </div>
                            <!-- Almacen -->
                            <div class="form-group col-sm">                                        
                                <label for="sTipDoc"><strong>Tip. Doc</strong></label>
                                <select id="sTipDoc" class="selectpicker form-control" data-live-search="true">
                                <option data-tokens="">Selecciona el tipo de Doc.</option>
                                <option data-tokens="FF">FACTURA</option>
                                <option data-tokens="BB">BOLETA</option>
                                <option data-tokens="C">N. CREDITO</option>
                                <option data-tokens="D">N. DEBITO</option>
                                </select>
                                <small id="" class="form-text text-muted">Puede seleccionar sola una opción</small>
                            </div>
                        </div>
                        <!--<button type="button" id="btnConBDatos" class="btn btn-success">Consultar</button>-->
                        </form>
                    </fieldset>      
                </div>
                <div>
                    <div class="">
                        <div class="">
                            <div class="d-inline-flex p-2 bd-highlight">
                            Mostrar
                            </div>
                            <div class="d-inline-flex p-2 bd-highlight">
                            <select class="selectpicker form-control" name="sizeTable" id="sizeTable">
                                <option value="10" selected>10</option> 
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                            </div>
                            <div class="d-inline-flex p-2 bd-highlight">
                            Entradas
                            </div>
                        </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" id="btnConBDatos" class="btn btn-success">Consultar</button>
                    <button type="button" id="btnSCM" class="btn btn-success">Consultar MASIVO SUNAT</button>
                    <button type="button" id="btnSRM" class="btn btn-success">Registrar MASIVO BDATOS </button>
                    </div>    
                </div>
                <nav aria-label="Page navigation example">
                    <ul id="tablepag" class="pagination justify-content-end">
                    </ul>
                </nav>
                <div class="table-responsive-md">
                    <table id="table-Sunat" class="table table-hover table table-bordered" role="table">
                        <caption>Consulta a Sunat</caption>
                        <thead class="thead-dark" role="rowgroup"><tr id="theadSunat" role="row"><th scope="col" role="columnheader" data-title="selectcheck">
                        <div class="celltable"><input type="checkbox" onClick="toggle(this)"/></div>
                        </th><th scope="col" data-title="#">#
                        </th><th scope="col" role="columnheader" data-title="RUC"><div class="celltable">RUC</div>
                        </th><th scope="col" role="columnheader" data-title="T_COMPROBANTE"><div class="celltable">T. COMPROBANTE</div>
                        </th><th scope="col" role="columnheader" data-title="SERIE"><div class="celltable">SERIE</div>
                        </th><th scope="col" role="columnheader" data-title="N_COMPROBANDO"><div class="celltable">N° COMPROBANDO</div>
                        </th><th scope="col" role="columnheader" data-title="F_EMISION"><div class="celltable">F. EMISION</div>
                        </th><th scope="col" role="columnheader" data-title="I_TOTAL"><div class="celltable">I. TOTAL</div>
                        </th><th scope="col" role="columnheader" data-title="E_ENVIO"><div class="celltable">E. ENVIO</div>
                        </th><th scope="col" role="columnheader" data-title="E_SUNAT"><div class="celltable">E. SUNAT</div>
                        </th><th scope="col" role="columnheader" data-title="E_REGISTRO"><div class="celltable">E. REGISTRO</div>
                        </th><th scope="col" role="columnheader" data-title="ACCIONES">ACCIONES</th></tr></thead>
                            <tbody id="drcsunat" role="rowgroup">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="row">-</th>
                                    <th scope="row">-</th>
                                    <th scope="row">-</th>
                                    <th scope="row">-</th>
                                    <th scope="row">-</th>
                                    <th scope="row">-</th>
                                    <th scope="row">-</th>
                                    <th scope="row">-</th>
                                    <th class="pie-elem">-</th>
                                    <th class="pie-elem">-</th>
                                    <th class="pie-elem">-</th>
                                    <th class="pie-elem">-</th>
                                </tr>
                            </tfoot>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row container d-flex justify-content-center">
                <fieldset>
                    <legend>Consulta por Archivo de carpeta en el Servidor</legend>
                    <form>                        
                        <div class="form-group">
                        <button type="button" id="btnConSunat" class="btn btn-success">Consultar</button>
                        <small id="" class="form-text text-muted">Seleccionara el archivo</small>
                        </div>
                    </form>
                </fieldset>
                <div>
                    <h3>Contenido del archivo:</h3>
                    <pre id="contenido-archivo"></pre>
                </div>
                <?php
                    $alsunat = array();
                    $adsunar = array();
                    $c = 0;
                    //URL DEL ARCHIVO
                    $ArchivoLeer = "./../../data/05102020.txt";
                    if(touch($ArchivoLeer)){
                        $archivoID = fopen($ArchivoLeer, "r");   
                        while( !feof($archivoID)){
                            //SUMA EL CONTADOR
                            $c++;
                            //DATO
                            $linea = fgets($archivoID, 1024);
                            //SEPARAMOS POR EL SIGNO |
                            $porciones = explode("|", $linea);
                            //QUITAMOS EL SIGNO \n, \r
                            $pmonto = explode("\n", $porciones[5]);
                            $psmonto = explode("\r", $pmonto[0]);
                            $plmonto = $psmonto[0];
                            //$alsunat[$c]['monto'] = (float) $alsunat[$c]['monto'];
                            $alsunat[$c] = array("numRuc"=>$porciones[0], "codComp"=>$porciones[1],"numeroSerie"=>$porciones[2], "numero"=>$porciones[3], "fechaEmision"=>$porciones[4],"monto"=>$plmonto);
                        }
                    //CERRAMOS
                    fclose($archivoID);
                    }
                    //var_dump($alsunat);
                    $jelsunat = json_encode($alsunat);
                ?>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="row container d-flex justify-content-center">
                <fieldset>
                    <legend>Consulta por Archivo de carpeta en el Servidor</legend>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Seleccione Archivo</label>
                            <input class="btn btn-success" value="ES" type="file" id="file-input" style=" width: 132px; overflow:hidden;"/>
                        </div>
                        <button type="button" id="btnConSunatCli" class="btn btn-success">Consultar</button>
                        <small id="emailHelp" class="form-text text-muted">Solo con archivos TXT</small>
                    </form>
                </fieldset>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>        
<script>
    $(document).ready(function () {
    $("#example").DataTable({ "ordering": false });
    });
</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
