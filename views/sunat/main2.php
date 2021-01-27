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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Estilo Tabla [ REQUIRED ]
    <link href="./../../assets/css/table.css" rel="stylesheet">-->
    <!-- Fecha -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    
    <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">-->
    <!--Estilo Boton Animado [ REQUIRED ]-->
    <link href="./../../assets/css/btn-animado.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--Estilo Tabla [ REQUIRED ]-->
    <link href="./../../assets/css/base.css" rel="stylesheet">
    <!-- Titulo de la pagina / pestaña -->
    <title>Hello, <?php echo $urlcurrent?>!</title>
  </head>
<body>
<?php
  //Llamo Nav
  include ('../nav.php');
?>
  <h1>Hello, <?php echo $urlcurrent?>!</h1><div class="container-fluid">
  <div id="rpts-sunat">
  </div>
  <div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-outline-primary">Consulta DB Principal</button>
    <button type="button" class="btn btn-outline-primary">Consulta Archivo Servidor</button>
    <button type="button" class="btn btn-outline-primary">Consulta Seleccion de Archivo</button>
  </div>
  <div class="row justify-content-md-center ">
    <div class="col-sm ">      
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
          <div class="form-group">                                        
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
          <div class="form-group">                                        
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
          <div class="form-group">                                        
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
          <!--<button type="button" id="btnConBDatos" class="btn btn-success">Consultar</button>-->
        </form>
      </fieldset>      
    </div>
    <div class="col-sm">
      <div class="d-flex flex-column bd-highlight mb-3">
        <fieldset>
          <legend>Consulta por Archivo de carpeta en el Servidor</legend>
          <form>
            <button type="button" id="btnConSunat" class="btn btn-success">Consultar</button>
          </form>
        </fieldset>
      </div>
      <div class="d-flex flex-column-reverse bd-highlight">
        <fieldset>
          <legend>Consulta por selección de Archivo</legend>
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Seleccione Archivo</label>
              <input class="btn btn-success" value="ES" type="file" id="file-input" style=" width: 132px; overflow:hidden;"/>
              <small id="emailHelp" class="form-text text-muted">Solo con archivos TXT</small>
            </div>
            <button type="button" id="btnConSunatCli" class="btn btn-success">Consultar</button>
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
    <div>
  </div>
<?php
  $alsunat = array();
  $adsunar = array();
  $c = 0;
    //URL DEL ARCHIVO
    $ArchivoLeer = "./../../data/05102020.txt";
    if(touch($ArchivoLeer)){
      //
      $archivoID = fopen($ArchivoLeer, "r");
      //      
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
      <thead class="thead-dark" role="rowgroup"><tr id="theadSunat" role="row"><th scope="col" role="columnheader" data-title="selectcheck"><div class="celltable"><input type="checkbox" onClick="toggle(this)"/></div>
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
                        <!--
                                          <th scope="col" role="columnheader" data-title="selectcheck"><div class="celltable"><input type="checkbox" onClick="toggle(this)"/></div></th>
                <th scope="col" data-title="#">#</th>
                <th scope="col" role="columnheader" data-title="RUC"><div class="celltable">RUC</div></th>
                <th scope="col" role="columnheader" data-title="T_COMPROBANTE"><div class="celltable">T. COMPROBANTE</div></th>
                <th scope="col" role="columnheader" data-title="SERIE"><div class="celltable">SERIE</div></th>
                <th scope="col" role="columnheader" data-title="N_COMPROBANDO"><div class="celltable">N° COMPROBANDO</div></th>
                <th scope="col" role="columnheader" data-title="F_EMISION"><div class="celltable">F. EMISION</div></th>
                <th scope="col" role="columnheader" data-title="I_TOTAL"><div class="celltable">I. TOTAL</div></th>
                <th scope="col" role="columnheader" data-title="E_ENVIO"><div class="celltable">E. ENVIO</div></th>
                <th scope="col" role="columnheader" data-title="E_SUNAT"><div class="celltable">E. SUNAT</div></th>
                <th scope="col" role="columnheader" data-title="E_REGISTRO"><div class="celltable">E. REGISTRO</div></th>
                <th scope="col" role="columnheader" data-title="ACCIONES">ACCIONES</th>
                    <th scope="col" role="columnheader"><div class="celltable">Estado del comprobante a la fecha de la consulta</div></th>
                    <th scope="col" role="columnheader"><div class="celltable">Estado del contribuyente a la fecha de emisión</div></th>
                    <th scope="col" role="columnheader"><div class="celltable">Condición de domicilio a la fecha de emisión</div></th>
                    -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="./../../assets/js/btn-animado.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
//CHECKBOX
//SELECCION / DESELECCIONA CHECKBOX
function toggle(source) {
  checkboxes = document.getElementsByName('dinamico');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
/* Capturamos ID del Boton 'Consultar MASIVO SUNAT' */
var btnSCM = document.getElementById("btnSCM");

/* Se agrega el evento al elemento */
btnSCM.addEventListener("click", getcboxSCM);

/* Capturamos ID del Boton 'Registrar MASIVO SUNAT' */  
var btnSRM = document.getElementById("btnSRM");

/* Se agrega el evento al elemento */
btnSRM.addEventListener("click", getcboxbtnSRM);

/* Función que se gatilla al hacer click en el elemento BOTON */
function getcboxSCM() {
  var i = 0;
  var checkActivos = [];
  console.log('CONSULTA MASIVO');
  $("input[type=checkbox]:checked").each(function(){ 
    checkActivos.push($(this).val());
    /*
    $(this).closest('td').siblings().each(function(){
      // obtenemos el texto del td 
      console.log($(this).text());
    });*/
  });
  console.log(checkActivos);
  validacionConsulta = checkActivos.length == 0  ? 'No hay datos, no se procede a consultar' : 'Si hay datos, se procede a consultar';
  console.log(validacionConsulta);
  preDataSCM(checkActivos);
}
function preDataSCM(date){
  date.forEach(miFuncion);
function miFuncion(elemento, indice) {
  console.log("En el índice " + indice + " hay este valor: " + elemento);
  if(elemento == 'on'){
    console.log('es on');
  }
  else{
    var fdocESunat = document.getElementById(elemento).innerHTML;
    console.log(fdocESunat);
    if(fdocESunat == 'ACEPTADO'){
      console.log('Ya esta aceptado');
    }
    else{
      console.log('No Esta consultado');
      bdato = elemento;
      //DIVIDIMOS PARA BUSCAR EL DATO
      var elementodivi = elemento.split('_');
      //console.log(typeof elementodivi);
      //console.log(elementodivi);
      //console.log(elementodivi[1]);
      //CAPSULAMOS EL DATO A BUSCAR
      elemabusc = elementodivi[1];
      //console.log(tableData);
      //BUSCAMOS DATOS SELECCIONADOS  
      var buscar = tableData.find(function(cnumero){ return cnumero.cnumero == elemabusc + '  ';});
      if(buscar){
        //console.log(buscar);
        var monto = buscar['nimporte']
        var numero = buscar['cnumero'].trim();
        var cserie = buscar['cserie'];
        var validatorDoc = cserie.charAt(1);
        var codcomp;
        var numRuc = '20370715107';
        //VALIDADOR TIPO DE DOCUMENTO
        switch (validatorDoc) {
          case 'F':
            //console.log('FACTURA');
            codcomp = '01';
            break;
          case 'B':
            //console.log( "Indice: " + indice + " Valor: " + elemento );
            //console.log('BOLETA');
            codcomp = '03';
            break;
          case 'C':
            //console.log('NOTA DE CREDITO');
            codcomp = '07';
            break;
          case 'D':
            //console.log('NOTA DE DEBITO');
            codcomp = '08';
            break;
          default:
            //console.log('Lo lamentamos, por el momento no disponemos de ' + validatorDoc + '.');
        }
        var fechaEmision = convertDateFormat(buscar['dfecemi']);
        var queryformatSunat = {
          "1" : {
              "codComp" : codcomp,
              "fechaEmision" : fechaEmision,
              "monto" : monto,
              "numRuc" : numRuc,
              "numero" : numero,
              "numeroSerie" : cserie,
          },
        };
        //console.log(queryformatSunat);
        //SE ENVIA DATOS A LA FUNCION
        makeRequests(queryformatSunat);
      }
      else
      {
        console.log('No se encontro');
      }
    }    
  }
}
function convertDateFormat(string) {
        var info = string.split('-').reverse().join('/');
        return info;
   }
}
const handlereturnedFins = (data) => {
  contadorFins = contadorFins++;
  console.log(contadorFins);
  //ESTADO
  // 0 = EXITO;
  // 1 = ERROR;
  //TIPO
  console.log(typeof data);
  console.log(data);
  text = data['text']
  if(data['estadorpt'] == '0'){
    document.getElementById("rpts-sunat").innerHTML = '<div class="alert alert-success" role="alert">' + text + '</div>';
  }else{
    document.getElementById("rpts-sunat").innerHTML = '<div class="alert alert-danger" role="alert">' + text + '</div>';
  }
};
/* Función que se gatilla al hacer click en el elemento BOTON */
function getcboxbtnSRM() {
  var i = 0;
  var checkContador = [];
  var checkETxt = [];
  var checkCTxt = [];
  var checkSelect = [];
  var rows = {};
  console.log('REGISTRO MASIVO');
  $("input[type=checkbox]:checked").each(function(){ 
    checkSelect.push($(this).val());
  });
  //console.log(checkSelect);
  //Recorremos todos los checkbox seleccionados
  
  checkSelect.forEach( function(valor, indice, array) {
    //console.log("En el índice " + indice + " hay este valor: " + valor);
    //separamos
    if(valor == 'on'){
      //console.log('Es on');
    }else{
      var elementodivi = valor.split('_');
      //escogemos el texto y limpiados de espacios
      const objectarray = {};
      var children = elementodivi[1].trim();
      thead = document.getElementById('theadSunat');
      NodeList.prototype.forEach = Array.prototype.forEach
      //Guardamos el NodeList en una variable
      var childrenthead = thead.childNodes;
      childrenthead.forEach(function(itemhrow){
        hijosw = itemhrow.getAttribute("data-title");
      });
      //father = document.getElementById(children).parentNode;
      father = document.getElementById('row_' + children);
      NodeList.prototype.forEach = Array.prototype.forEach
      //Guardamos el NodeList en una variable
      var childrentbody = father.childNodes;
      childrentbody.forEach(function(itembrow){
        hijos = itembrow.getAttribute("data-txt");
      });
    //Guardamos el tamaño de la array
      size = thead.childNodes.length;
      for(var r = 0; r < size; r++){
        objectarray[childrenthead[r].getAttribute("data-title")] = childrentbody[r].getAttribute("data-txt");
      }
      var datefront = new Date();
      var mes = datefront.getMonth() + 1  ;
      var getdate = datefront.getFullYear() + '-0' + mes + '-' + datefront.getDate() + ' ' + datefront.getHours() + ':' + datefront.getMinutes() + ':' + datefront.getSeconds()
        if(objectarray['E_SUNAT'] != 'FALSE'){
          //console.log('Si tiene respuesta de Sunat, se procederá a Registrar');
          //console.log(getdate);
          objectarray['F_REGISTRO'] = getdate;
          console.log(objectarray);
          insertStatesSunat(objectarray);
        }else{
          //console.log('Debe tener respuesta de Sunat');
        }
      }
    });
  }

//CONSULTA A SUNAT
const insertStatesSunat = async (objectarray) => {
  console.log(objectarray);
  beforeSending();
  const body = new FormData();
  var data = {
    "accion" : '2',
    "doc" : objectarray
  };
  console.log(data);
  body.append("data", JSON.stringify(data));
  //body.append("data", JSON.stringify(data[prop]));
  const returned = await fetch("./../../controllers/controllerSunat.php", { method: "POST", body });
  const result = await returned.json();//await JSON.parse(returned);
  handlereturnedFins(result);
  afterSending();
}; 

//SELECT 
//DETECAR CAMBIO SELECT
  var selectTable = document.getElementById('sizeTable');
  selectTable.addEventListener('change',
  function(){
    var selectedOption = this.options[selectTable.selectedIndex];
    sizeTablevalue = selectedOption.value;
    //console.log(selectedOption.value + ': ' + selectedOption.text);
    //handleReturnedDocEmiSunat(sizeTablevalue);
    dtableDEmitidos(dateStart, dateEnd, sizeTablevalue)
  });
  // TABLA
  
  $(function() {
    var pressed = false;
    var start = undefined;
    var startX, startWidth;
    
    $("table th").mousedown(function(e) {
        start = $(this);
        pressed = true;
        startX = e.pageX;
        startWidth = $(this).width();
        $(start).addClass("resizing");
    });
    
    $(document).mousemove(function(e) {
        if(pressed) {
            $(start).width(startWidth+(e.pageX-startX));
        }
    });
    
    $(document).mouseup(function() {
        if(pressed) {
            $(start).removeClass("resizing");
            pressed = false;
        }
    });
});

// INPUT FECHA PARA CONSULTAR BASE DATOS
  $(function() {
    $('input[name="daterange"]').daterangepicker({
      "locale": {
            "format": "YYYY/MM/DD",
            "separator": " - ",
            "applyLabel": "Guardar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "Hasta",
            "customRangeLabel": "Personalizar",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Setiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        "startDate": "2021-01-01",
        "endDate": "2021-01-03",
        "opens": "center",
      "opens" : 'left'
    }, function(start, end, label) {
      dateStart = start.format('YYYY-MM-DD');
      dateEnd = end.format('YYYY-MM-DD');
      //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      var sizeTable = document.getElementById('sizeTable');
      var sizeTableoption = sizeTable.options[sizeTable.selectedIndex];
      sizeTablevalue = sizeTableoption.value;
      console.log("Tamaño" + sizeTablevalue);
      //GET DATA TABLE
      //dtableDEmitidos(dateStart, dateEnd, sizeTablevalue);
    });
  });
//
  //CONSULTA BASE DATOS DE LA EMPRESA
  const dtableDEmitidos = async (dateuno, datedos, size) => {
    console.log('Se hara consulta con este rango de fecha : ' + dateuno + 'Fecha Fin ' + datedos);
    const body = new FormData();
    var data = {
      "accion" : '0',
      "dateuno" : dateuno,
      "datedos" : datedos,
      "size" : size,
    };
    body.append("data", JSON.stringify(data));  
    const responsemaindatabase = await fetch("./../../controllers/controllerSunat.php", { method: "POST", body});
    const responsemaindatabaseobject = await responsemaindatabase.json(); //await JSON.parse(returned);
    console.log('se limpiara')
    console.log(typeof responsemaindatabaseobject);
    handleReturnedDocEmiSunat(responsemaindatabaseobject);
  };
  const handleReturnedDocEmiSunat = (data) => {
    //rJParse = JSON.parse(data);
    //console.log(tableData);
    
    createTable(data);
    //$("#cArticle_idselectBrand").html(data).selectpicker('refresh');
    //$("#filcat").html(data).selectpicker('refresh');
  }
  function borrarTable() {
    let tableBody = document.getElementById('drcsunat');
    let tablepag = document.getElementById('tablepag');
    /*
    let table = document.getElementById('table-Sunat');
    table.removeChild(tableBody);
    */
    //document.getElementById('drcsuat').innerHTML = '';
    tableBody.innerHTML = '';
    tablepag.innerHTML = '';
  }
  //GENERANDO CUERPO DE TABLA
  function createTable(data) {
    console.log(data);
    //OBTENIEDO DATOS DE TABLA
    tableData = data['consulta']['result'];
    //OBTENIEDO DATOS DE TABLA
    paginas = data['paginacion']['filasPagina'];
    //OBTENIEDO N° PAGINA
    npagina = data['npagina'];

    //INDICAMOS ETIQUETA A IMPRIMIR
    let tableBody = document.getElementById('drcsunat');
    let tablepag = document.getElementById('tablepag');
    //TABLA
    var numruc = '20370715107';
    var tipCom = '01';
    var stateSunat = 'NO CONSULTADO';
    var stateBD = 'FALSE';
    var consultSunat = 'Consultar 📝';
    var sendSunat = 'Enviar a Sunat 📨';
    //BOTON ANIMADO
    var txtPEstado = 'No consultado';
    var txtSEstado = 'Consultando';
    var txtTEstado = 'Activo';
    c = 0;
    //PAGINACION
    var eliPrevious = document.createElement('li');
    var eliNext = document.createElement('li');
    var eaPrevious = document.createElement('a');
    var eaNext = document.createElement('a');
    var espan = document.createElement('span');
    
    //AGREGANDO CLASE
    //eliPrevious.className = "page-item";
    eliNext.className     = "page-item";
    eaPrevious.className  = "page-link";
    eaNext.className      = "page-link";
    espan.className       = "page-link";
    //AGREGANDO TEXTO
    eaPrevious.appendChild(document.createTextNode('Anterior'));
    eaNext.appendChild(document.createTextNode('Siguiente'));
    //AGRUPANDO
    eliPrevious.appendChild(eaPrevious);
    eliNext.appendChild(eaNext);
    //CREANDO
    console.log('la cantidad de paginas son :' + paginas);
    //tablepag.appendChild(eliPrevious);
    //CREANDO LAS PAGINAS
    console.log('esta en la pagina :' + npagina);
    for (var pi = 1; pi <= paginas; pi++) {

      const eli = document.createElement('li');
      const ea = document.createElement('a');
      console.log('estas en el numero :' + pi);
      var cPrevious = npagina == '1' ? 'page-item disabled' : 'page-item';
      pi == '1' ? eliPrevious.className = cPrevious : 'page-item';
      pi == '1' ? tablepag.appendChild(eliPrevious) : 'page-item';
      var cNext = npagina == paginas ? 'page-item disabled' : 'page-item';
      pi == paginas ? eliNext.className = cNext : 'page-item';
      pi == paginas ? tablepag.appendChild(eliNext) : 'page-item';  
      console.log(cNext);
      //AGREGANDO CLASE
      if(npagina == pi){
        console.log('Es igual');
        eli.className = "page-item active";
        ea.className = "page-link";
      }else{
        console.log('No es igual');
        eli.className = "page-item";
        ea.className = "page-link pagina-inac";
      }
      //AGREGANDO ID
      eli.setAttribute("id", "pag_" + pi);
      //EJECUTO CONSULTA PAGINA
      eli.addEventListener('click', consultpag);
      //FUNCION CONSULTAR PAGINA
      function consultpag(e) {
        //OBTENGO EL ID
        id = eli.getAttribute('id');
        var sid = id.split('_');
        var pagina = sid['1'];
        var calpagina = pagina - 1;
        console.log('Paginacion : ' + id);
        //OBTENIENDO DATOS
        //OBTENEMOS LA FECHA
        console.log('Hola Fecha seleccionado es : ' + dateStart + ' hasta' +  dateEnd);
        //OBTENEMOS UNIDAD
        var idsUnidad = document.getElementById('sUnidad');
        var dtUnidad = idsUnidad.options[idsUnidad.selectedIndex].getAttribute('data-tokens');
        console.log(dtUnidad);
        //OBTENEMOS CANAL
        var idsCanal = document.getElementById('sCanal');
        var dtCanal = idsCanal.options[idsCanal.selectedIndex].getAttribute('data-tokens');
        console.log(dtCanal);
        //OBTENEMOS tipo documentos
        var idsTipDoc = document.getElementById('sTipDoc');
        var dtTipDoc = idsTipDoc.options[idsTipDoc.selectedIndex].getAttribute('data-tokens');
        console.log(dtTipDoc);
        //OBTENEMOS EL TAMAÑO DE CONSULTA
        var idsSizeTable = document.getElementById('sizeTable');
        var dtSizeTable = idsSizeTable.options[idsSizeTable.selectedIndex].getAttribute('value');
        console.log(dtSizeTable);
        console.log(calpagina);
        console.log(dtSizeTable);
        console.log('Se multiplicara');
        var offset = dtSizeTable * calpagina;
        console.log('Total : ' + offset);
        console.log(queryformatDoc);
        var queryformatDoc = {
            "fechainicio" : dateStart,
            "fechafin" : dateEnd,
            "unidad" : dtUnidad,
            "canal"  : dtCanal,
            "tipdoc" : dtTipDoc,
            "tamano" : dtSizeTable,
            "pagina" : pagina,
            "offset" : offset,
        };
        makeRequestsdocEmi(queryformatDoc);
      }
      console.log(pi);
      ea.appendChild(document.createTextNode(pi));
      eli.appendChild(ea);
      tablepag.appendChild(eli);
    }
    tablepag.appendChild(eliNext);
    //i = 0;
    //tableBody.parentNode.removeChild(tableBody);
    console.log(tableData);
    const tabBody = document.createElement('tbody');
    tabBody.setAttribute("id", "drcsunat");
    tabBody.setAttribute("role", 'rowgroup');
    
    //tableBody.removeChild(primerParrafo);
    tableData.forEach(function(obj){
      i++;
      c++;
      //CREAMOS ETIQUETA
      const row = document.createElement('tr');
      //const row = document.createElement('tr');
      const cellCheck = document.createElement('td');
      const ipt = document.createElement('input');
      const info = document.createElement('span');
      const celld = document.createElement('td');
      const cellnumruc = document.createElement('td');
      const celldtipdoc = document.createElement('td');
      const celldastateSunat = document.createElement('td');
      const celldastateDb = document.createElement('td');
      const spanConsult = document.createElement('span');
      //Boton animado
      const aSConsult = document.createElement('a');
      const sSCCAnimacion = document.createElement('span');
      //
      const sSCCPAnimacion = document.createElement('svg');
      const sSCCPAElement = document.createElement('use');
      sSCCPAnimacion.appendChild(sSCCPAElement);
      const sSCCSAnimacion = document.createElement('svg');
      const sSCCSAElement = document.createElement('use');
      sSCCSAnimacion.appendChild(sSCCSAElement);
      const sSCCTAnimacion = document.createElement('svg');
      const sSCCTAElement = document.createElement('use');
      sSCCTAnimacion.appendChild(sSCCTAElement);
      
      const ulSCEstado = document.createElement('ul');
      const ulSCPEstado = document.createElement('li');
      const ulSCSEstado = document.createElement('li');
      const ulSCTEstado = document.createElement('li');
      //
      const spanBD = document.createElement('span');
      const spanSend = document.createElement('span');
      const celldacciones = document.createElement('td');
      const btnaconsult = document.createElement('a');
      const btnaSendSunat = document.createElement('a');
      var i = c - 1;
      //console.log(i);
      //var numero = dcsnat['data']['numero'].trim();
      idSpanSestado = tableData[i]['cnumero'].trim();
      //console.log(tableData[i]);
      //AGREGAMOS TYPE O TIPO A ETIQUETA
      ipt.type = "checkbox";
      ipt.name = "dinamico";
      //c=c-1;
      row.setAttribute("id", "row_" + idSpanSestado);
      ipt.setAttribute("value", "state_" + idSpanSestado);
      
      sSCCPAElement.setAttribute("xlink:href", '#circle');
      sSCCSAElement.setAttribute("xlink:href", '#arrow');
      sSCCTAElement.setAttribute("xlink:href", '#check');

      spanConsult.setAttribute("id", "state_" + idSpanSestado);
      btnaconsult.setAttribute("data-json", c);
      btnaconsult.setAttribute("data-nComprobante", c);
      //AGREGAMOS CLASE A ETIQUETA
      
      btnaconsult.className = "btn btn-success btnConsul";
      btnaSendSunat.className = "btn btn-success";
      aSConsult.className = "activate";
      spanConsult.className = "label label-table label-warning";
      spanBD.className = "label label-table label-warning";
      //AGREGARMOS TEXTO O CONTENIDO A LA ETIQUETA
      celld.appendChild(document.createTextNode(c));
      celld.setAttribute("data-txt", c);
      cellnumruc.appendChild(document.createTextNode(numruc));
      cellnumruc.setAttribute("data-txt", numruc);
      celldtipdoc.appendChild(document.createTextNode(tipCom));
      celldtipdoc.setAttribute("data-txt", tipCom);
      spanConsult.appendChild(document.createTextNode(stateSunat));
      
      // AGREGAMOS TEXTO
      ulSCPEstado.appendChild(document.createTextNode(txtPEstado));
      ulSCSEstado.appendChild(document.createTextNode(txtSEstado));
      ulSCTEstado.appendChild(document.createTextNode(txtTEstado));
      //
      ulSCEstado.appendChild(ulSCPEstado);
      ulSCEstado.appendChild(ulSCSEstado);
      ulSCEstado.appendChild(ulSCTEstado);
      
      sSCCAnimacion.appendChild(sSCCPAnimacion);
      sSCCAnimacion.appendChild(sSCCSAnimacion);
      sSCCAnimacion.appendChild(sSCCTAnimacion);
      /*
      aSConsult.appendChild(sSCCAnimacion);
      aSConsult.appendChild(ulSCEstado);
      */
      celldastateSunat.appendChild(spanConsult);
      celldastateSunat.setAttribute("data-txt", stateSunat);
      celldastateSunat.setAttribute("id", 'cellCont' + idSpanSestado);
      celldastateSunat.appendChild(aSConsult);
      spanBD.appendChild(document.createTextNode(stateBD));
      celldastateDb.appendChild(spanBD);
      celldastateDb.setAttribute("data-txt", stateBD);
      cellCheck.appendChild(ipt);
      cellCheck.setAttribute("data-txt", '0');
      btnaconsult.appendChild(document.createTextNode(consultSunat+c));
      btnaSendSunat.appendChild(document.createTextNode(sendSunat));
      celldacciones.appendChild(btnaconsult);
      celldacciones.appendChild(btnaSendSunat);
    //CONSULTAR SUNAT INDIVIDUAL
    btnaconsult.addEventListener('click', obtenerValores);
    $('.activate').on('click touch', function(e) {
      var self = $(this);
      if(!self.hasClass('loading')) {
        self.addClass('loading');
        setTimeout(function() {
          self.addClass('done');
          setTimeout(function() {
            self.removeClass('loading done');
          }, 1600);
        }, 3200);
      }
    });
      // CONSULTA INDIVIDUAL
  function obtenerValores(e) {
        //OBTENEMOS VALOR DATA
        dataJson = btnaconsult.getAttribute('data-json');
        id = dataJson - 1; 
        //console.log('Usted esta en la funcion ' + id);
        //console.log(tableData);
        console.log(tableData[id]);
        docConsultaIndividual = tableData[id];
        var numero = docConsultaIndividual['cnumero'].trim();
        var cserie = docConsultaIndividual['cserie'];
          /*
          console.log(cserie);
          console.log(cserie.charAt(1));
          */
          var validatorDoc = cserie.charAt(1);
          var codcomp;
          var numRuc = '20370715107';
          //VALIDADOR TIPO DE DOCUMENTO
          switch (validatorDoc) {
            case 'F':
              console.log('FACTURA');
              codcomp = '01';
              break;
            case 'B':
              console.log('BOLETA');
              codcomp = '03';
              break;
            case 'C':
              console.log('NOTA DE CREDITO');
              codcomp = '07';
              break;
            case 'D':
              console.log('NOTA DE DEBITO');
              codcomp = '08';
              break;
            default:
              console.log('Lo lamentamos, por el momento no disponemos de ' + validatorDoc + '.');
          }
          var fechaEmision = convertDateFormat(docConsultaIndividual['dfecemi']);
          
          var queryformatSunat = {
            "1" : {
              "codComp" : codcomp,
              "fechaEmision" : fechaEmision,
              "monto" : docConsultaIndividual['nimporte'],
              "numRuc" : numRuc,
              "numero" : numero,
              "numeroSerie" : docConsultaIndividual['cserie'],
            },
          };
        //onsole.log(queryformatSunat);
        //SE ENVIA DATOS A LA FUNCION
        makeRequests(queryformatSunat);
    }
    //CONVIERTE EN FORMATO ADECUADO
    function convertDateFormat(string) {
        var info = string.split('-').reverse().join('/');
        return info;
   }
      //AGREGAMOS A LA ETIQUETA MADRE
      //row.appendChild(ipt);
      row.appendChild(cellCheck);
      row.appendChild(celld);
      row.appendChild(cellnumruc);
      row.appendChild(celldtipdoc);
      //console.log(obj);
      Object.keys(obj).forEach(function(key) {
        var cell = document.createElement('td');
        //console.log(c);
        element = key, obj[key];
        elementdos = obj[key];
        
        //console.log(element);
        //console.log(elementdos);
        if(element == 'benviado'){
          //console.log('si');
          //elementdos = '';
          //cell.appendChild(document.createTextNode(elementdos));
          if(elementdos){
            spanSend.className = "label label-table label-success";
            elementdos = 'ENVIADO';
            //console.log('verdad');
          }else{
            spanSend.className = "label label-table label-danger";
            //console.log('falso');
            elementdos = 'NO ENVIADO';
          }
          spanSend.appendChild(document.createTextNode(elementdos));
          cell.appendChild(spanSend);
          cell.setAttribute("data-txt", elementdos);
          row.appendChild(cell);
        }
        else{
          //console.log('no');
          cell.appendChild(document.createTextNode(elementdos));
          elementlim = elementdos.trim();
          cell.setAttribute("data-txt", elementlim);
          //celld.appendChild(cell);
          row.appendChild(cell);
          //console.log(key, obj[key]);
          //console.log(obj[key]);
        }
      });
      row.appendChild(celldastateSunat);
      row.appendChild(celldastateDb);
      row.appendChild(celldacciones);
      //tabBody.appendChild(row);
      tableBody.appendChild(row);
    });
    
    //table.appendChild(tabBody);
  }


  //DOM ELEMENTS
  let btnConBDatos = document.getElementById('btnConBDatos');
  //
  btnConBDatos.addEventListener('click', function(){
    if(typeof dateStart === 'undefined'){
      document.getElementById("rpts-sunat").innerHTML = '<div class="alert alert-warning" role="alert">No selecciono una fecha</div>';
    } else {
      document.getElementById("rpts-sunat").innerHTML = '<div class="alert alert-success" role="alert">La consulta es: '+dateStart+' a '+dateEnd+'</div>';
      //OBTENEMOS UNIDAD
      var idsUnidad = document.getElementById('sUnidad');
      var dtUnidad = idsUnidad.options[idsUnidad.selectedIndex].getAttribute('data-tokens');
      console.log(dtUnidad);
      //OBTENEMOS CANAL
      var idsCanal = document.getElementById('sCanal');
      var dtCanal = idsCanal.options[idsCanal.selectedIndex].getAttribute('data-tokens');
      console.log(dtCanal);
      //OBTENEMOS tipo documentos
      var idsTipDoc = document.getElementById('sTipDoc');
      var dtTipDoc = idsTipDoc.options[idsTipDoc.selectedIndex].getAttribute('data-tokens');
      console.log(dtTipDoc);
      var idsSizeTable = document.getElementById('sizeTable');
      var dtSizeTable = idsSizeTable.options[idsSizeTable.selectedIndex].getAttribute('value');
      console.log(dtSizeTable);
      var queryformatDoc = {
          "fechainicio" : dateStart,
          "fechafin" : dateEnd,
          "unidad" : dtUnidad,
          "canal"  : dtCanal,
          "tipdoc" : dtTipDoc,
          "tamano" : dtSizeTable,
          "pagina" : '1',
          "offset" : '0',
      };
      console.log(queryformatDoc);
      makeRequestsdocEmi(queryformatDoc);
    }
  });
  const makeRequestsdocEmi = async (queryformatDoc) => {
    const body = new FormData();
    var data = {
      "accion" : '0',
      "doc" : queryformatDoc
    };
    body.append("data", JSON.stringify(data));  
    const responsemaindatabase = await fetch("./../../controllers/controllerSunat.php", { method: "POST", body});
    const responsemaindatabaseobject = await responsemaindatabase.json(); //await JSON.parse(returned);
    console.log('se limpiara')
    borrarTable()
    console.log(typeof responsemaindatabaseobject);
    handleReturnedDocEmiSunat(responsemaindatabaseobject);
  };
  let prueba = <?php echo $jelsunat ?>;
  //console.log(prueba);
  var contenido;
  var grudoc = [];
  var ogrudoc;
  document.getElementById('file-input').addEventListener('change', leerArchivo, false);
  function leerArchivo(e) {
    var archivo = e.target.files[0];
    if (!archivo) {
      return;
    }
    var lector = new FileReader();
    lector.onload = function(e) {
      var contenido = e.target.result;
      mostrarContenido(contenido);
    };
    lector.readAsText(archivo);
  }

function mostrarContenido(contenido) {
  //SEPARADORES
  var dseparador = '\n';
  var detdocsep = '|';
  //SEPARACION
  var dsunat = contenido.split(dseparador);
  //console.log(typeof dsunat);
  //console.log(dsunat[5]);
  //var dsunat = contenido.split(separador);  
  for (var i=0; i < dsunat.length; i++) {
    //console.log(dsunat[i]);
    var ditemsunat = dsunat[i].split(detdocsep);
    //console.log(ditemsunat);
    if(ditemsunat == ''){ // do stuff
      //console.log('es nulo');
    }
    else{
      var documento = {
      codComp: ditemsunat[1],
      fechaEmision: ditemsunat[4],
      monto: ditemsunat[5],
      numRuc: ditemsunat[0],
      numero: ditemsunat[3],
      numeroSerie: ditemsunat[2]
    };
    }
    grudoc.push(documento);
    //console.log(documento);   
   }
   ogrudoc = Object.assign({}, grudoc);
   console.log(ogrudoc);
   //console.log(grudoc);
  var elemento = document.getElementById('contenido-archivo');
  elemento.innerHTML = contenido;
}

  // Obtener referencia a botón
  // Recuerda: el numeral o # indica id
  const boton = document.querySelector("#btnConSunat");
  // Agregar listener
  boton.addEventListener("click", function(evento){
    // Aquí todo el código que se ejecuta cuando se da click al botón
    console.log(ogrudoc);
    //VERIFICACION DE ARCHIVO SELECCION
      if(ogrudoc == null){
        let adata = <?php echo $jelsunat ?>;
        makeRequests(adata);
      }
      else{
        let adata = ogrudoc;
        makeRequests(adata);
      }
  });
  
  //Si necesitas hacer algo con las respuestas del servidor
  //hacelas aqui.
  const handleReturnedData = (data) => {
    //
    var drcsunat = document.getElementById('drcsunat');
    var tableSunat = document.getElementById('table-Sunat');

    var ecsnat;
    var ctcsunat;
    var dcsnat = JSON.parse(data);

    //console.info(dcsnat.includes('observaciones'));
    console.log('Recibido')
    console.log(dcsnat['data']);
    const aobjtrptsunat = dcsnat['data'];

    var codComp;
    var numeroSerie = dcsnat['data']['numeroSerie'];
    var numero = dcsnat['data']['numero'].trim();
    console.log('idcon'+ numero);

    console.log(numero);
    console.log('cellCont'+ numero);
    var cellContEstSunat = document.getElementById('cellCont'+ numero);
    let textSpestadoSunat = document.getElementById('state_' + numero);
    var fechaEmision = dcsnat['data']['fechaEmision'];
    var monto = dcsnat['data']['monto'];
    var validatorDocnum = dcsnat['data']['codComp']
    /*console.log(validatorDocnum);
    console.log('id celda');*/
    codComp = validatorDocnum;
    /*
    switch (validatorDocnum) {
            case '01':
              console.log('FACTURA');
              codComp = 'FACTURA';
              break;
            case '03':
              console.log('BOLETA');
              codComp = 'BOLETA';
              break;
            case '07':
              console.log('NOTA DE CREDITO');
              codComp = 'N° CREDITO';
              break;
            case '08':
              console.log('N° DEBITO');
              codComp = 'N° DEBITO';
              break;
            default:
              console.log('Lo lamentamos, por el momento no disponemos de ' + validatorDoc + '.');
      }
      console.log('se convertio');
      console.log(codComp);*/
      var estadoCp;
      var idConComprobante = 'id = idcon'+numero;
      if(dcsnat['data']['estadoCp'] == "1"){
        estadoCp = 'ACEPTADO';
        ctcsunat = 'class="table-success"';
        textSpestadoSunat.innerHTML = estadoCp;
        textSpestadoSunat.className += "label label-table label-success";
        cellContEstSunat.setAttribute("data-txt", "estadoCp:1|estadoRuc");
      }
      else{
        estadoCp = 'NO EXISTE';
        ctcsunat = 'class="table-danger"';
        textSpestadoSunat.innerHTML = estadoCp;
        textSpestadoSunat.className = "label label-table label-danger";
        
      }
      ecsnat = '<tr ' + idConComprobante + ' '+ ctcsunat + ' role="row">';
      ecsnat+='<th scope="row">1</th>';
      ecsnat+='<td role="cell">' + codComp + '</td>';
      ecsnat+='<td role="cell">' + numeroSerie + '</td>';
      ecsnat+='<td role="cell">' + numero + '</td>';
      ecsnat+='<td role="cell">' + fechaEmision + '</td>';
      ecsnat+='<td role="cell">' + monto + '</td>';
      ecsnat+='<td role="cell">' + estadoCp + '</td>';
      var estadoRuc;
      if(dcsnat['data']['estadoRuc'] == "00"){
        estadoRuc = 'ACTIVO'
      }
      else{
        estadoRuc = '-';
      }
        ecsnat+='<td role="cell">' + estadoRuc + '</td>';
        var condDomiRuc;
        if(dcsnat['data']['condDomiRuc'] == "00"){
          condDomiRuc = 'HABIDO';
        }
        else{
          condDomiRuc = '-';
        }
        ecsnat+='<td role="cell">' + condDomiRuc +'</td>';
        if (aobjtrptsunat['observaciones']){
            console.log('existe');
            observacionSunat = aobjtrptsunat['observaciones'][0];
            console.log(observacionSunat);
        }
        else{
          console.log('no existe');
          observacionSunat = '-';
        }
        ecsnat+='<td role="cell">' + observacionSunat +'</td>';
        ecsnat+='</tr>';
        cellContEstSunat.setAttribute("data-txt", estadoCp + '|' + estadoRuc + '|' + condDomiRuc + '|' + observacionSunat);
        //innerHTML += ecsnat; 
        //trSTFila.insertAdjacentElement('afterend', ecsnat);
        if ( document.getElementById('idcon'+ numero)) {
          console.log('Si existe');
        }
        else{
          console.log('No existe');
          $( ecsnat ).insertAfter( '#row_' + numero );
        }        
        //var trSTFila = document.getElementById('row_' + numero);
        //trSTFila.insertAdjacentElement('afterend',ecsnat);
        //document.querySelector('#row_' + numero).parentElement.append(ecsnat);
        //$("#drcsunat").append(ecsnat);
        //document.querySelector('#row_' + numero).parent.append(ecsnat);
        //$( '#row_' + numero ).append(ecsnat);
        //drcsunat.appendChild(ecsnat);
        /*
        var i = document.createElement("tr");
        insertAfter(trSTFila,i)
        function insertAfter(trSTFila,i){ 
          if(trSTFila.nextSibling){ 
            trSTFila.parentNode.insertBefore(i,trSTFila.nextSibling); 
          } else { 
            trSTFila.parentNode.appendChild(i); 
          }
        }*/
        
        //el.innerHTML = "test";
        //var div = document.getElementById("foo");
        //insertAfter(trSTFila, el);
        //console.log(dcsnat);

      };
      //Si necesitas hacer algo antes de enviar las
      //consultas, hacelo aqui.
      const beforeSending = () => {
        console.log("before");
      };

      //Si necesitas hacer algo despues de que terminen las
      //consultas, hacelas aqui.
      const afterSending = () => {
        console.log("after");
        //Insertara datos
      };
      function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
      };
      //CONSULTA A SUNAT
      const makeRequests = async (requestSunat) => {
        beforeSending();
        let ccontador = 0;
        let climite = 5;
        console.log(requestSunat);
        /*
        console.log(requestSunat['type']);
        requestType = requestSunat['type'];
        requestData = requestSunat['data'];
        if(requestType == 1){
          console.log('Individual');
          requestDocument = requestData;
        }
        else{
          console.log('Masivo');
          requestDocument = requestData;
        }
        
        //INDICO EL TAMAÑO DEL OBJETO
        
        console.log(Object.keys(requestSunat).length);
        */
        //RECORRE LISTA
        for (const prop in requestSunat) {
          ccontador++;
          //console.log(ccontador);
          if(ccontador == climite){
            climite = (climite + 5);
            //console.log(climite);
            await sleep(2000);
            console.log('llego a 5 consultas');
          }
          //console.log(requestSunat);
          const body = new FormData();
          
          var data = {
            "accion" : '1',
            "doc" : requestSunat[prop]
          };

          console.log(data);
          
          //body.append("data", JSON.stringify(data[prop]));
          body.append("data", JSON.stringify(data));
          const returned = await fetch("./../../controllers/controllerSunat.php", { method: "POST", body });
          const result = await returned.json();//await JSON.parse(returned);
          console.log(typeof result);
          console.log(result);
          handleReturnedData(result);
        }
        afterSending();
      };   
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</body>
</html>