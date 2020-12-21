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
    <!--Estilo Tabla [ REQUIRED ]
    <link href="./../../assets/css/table.css" rel="stylesheet">-->

    <!-- Fecha -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">-->
    <!--Estilo Boton Animado [ REQUIRED ]-->
    <link href="./../../assets/css/btn-animado.css" rel="stylesheet">
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
  <div class="row justify-content-md-center ">
    <div class="col-sm ">      
      <fieldset>
        <legend>Consulta Directo Base Datos</legend>
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Elegir Fecha</label>
            <input type="text" name="daterange" value="12/01/2020 - 12/12/2020" />
            <small id="emailHelp" class="form-text text-muted">Puedes seleccionar un dia o un rango de dias</small>
          </div>
          <button type="button" id="btnConBDatos" class="btn btn-success">Consultar</button>
        </form>
      </fieldset>      
    </div>
    <div class="col-sm">
      <fieldset>
        <legend>Consulta por Archivo de carpeta en el Servidor</legend>
        <form>
          <button type="button" id="btnConSunat" class="btn btn-success">Consultar</button>
        </form>
      </fieldset>      
    </div>
    <div class="col-sm">
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
    </div>
  </div>
</div>
  <h3>Contenido del archivo:</h3>
  <pre id="contenido-archivo"></pre>
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
    <div class="csaSunat">

    </div>
    
  <div>
    <div>
      Mostrar
      <select name="sizeTable" id="sizeTable">
        <option value="10" selected>10</option> 
        <option value="25">25</option>
        <option value="50">50</option>
      </select>
      Entradas
    </div>
    <div>
      <button type="button" id="btnSCM" class="btn btn-success">Consultar MASIVO SUNAT</button>
    </div>
    <div>
      <button type="button" id="btnSRM" class="btn btn-success">Registrar MASIVO BDATOS</button>
    </div>
  </div>

    <div class="table-responsive-md">
        <table id="table-Sunat"class="table table-hover table table-bordered" role="table">
            <caption>Consulta a Sunat</caption>
            <thead class="thead-dark" role="rowgroup">
              <tr role="row">
                <th scope="col" role="columnheader"><div class="celltable"><input type="checkbox" onClick="toggle(this)"/></div></th>
                <th scope="col">#</th>
                <th scope="col" role="columnheader"><div class="celltable">RUC</div></th>
                <th scope="col" role="columnheader"><div class="celltable">T. COMPROBANTE</div></th>
                <th scope="col" role="columnheader"><div class="celltable">SERIE</div></th>
                <th scope="col" role="columnheader"><div class="celltable">N° COMPROBANDO</div></th>
                <th scope="col" role="columnheader"><div class="celltable">F. EMISION</div></th>
                <th scope="col" role="columnheader"><div class="celltable">I. TOTAL</div></th>
                <th scope="col" role="columnheader"><div class="celltable">E. ENVIO</div></th>
                <th scope="col" role="columnheader"><div class="celltable">E. SUNAT</div></th>
                <th scope="col" role="columnheader"><div class="celltable">E. REGISTRO</div></th>
                <th scope="col" role="columnheader">ACCIONES</th>
                    <!--
                    <th scope="col" role="columnheader"><div class="celltable">Estado del comprobante a la fecha de la consulta</div></th>
                    <th scope="col" role="columnheader"><div class="celltable">Estado del contribuyente a la fecha de emisión</div></th>
                    <th scope="col" role="columnheader"><div class="celltable">Condición de domicilio a la fecha de emisión</div></th>
                    -->
              </tr>
            </thead>
            <tbody id="drcsunat" role="rowgroup">
            
                <tr role="row">
                    <th scope="row">-</th>
                    <td role="cell">-</td>
                    <td role="cell">-</td>
                    <td role="cell">-</td>
                    <td role="cell">-</td>
                    <td role="cell">-</td>
                    <td role="cell">-</td>
                    <td role="cell">-</td>
                    <td role="cell">-</td>
                    <td role="cell">-</td>
                </tr>
            </tbody>
            <!--
            <tfoot>
                <tr>
                    <th scope="row">4</th>
                    <th scope="row">Promedio</th>
                    <th scope="row">Promedio</th>
                    <th class="pie-elem">1 h 24 min</th>
                    <th class="pie-elem">1 h 22 min</th>
                    <th class="pie-elem">1 h 24 min</th>
                    <th class="pie-elem">1 h 22 min</th>
                </tr>
            </tfoot>-->
        </table>
    </div>
    
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="circle">
        <circle cx="8" cy="8" r="7.5"></circle>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" id="arrow">
        <path d="M2.7008908,5.37931459 L2.7008908,5.37931459 C2.9224607,5.60207651 3.2826628,5.60304283 3.50542472,5.38147293 C3.52232305,5.36466502 3.53814843,5.34681177 3.55280728,5.32801875 L5.34805194,3.02646954 L5.34805194,10.3480519 C5.34805194,10.7081129 5.63993903,11 6,11 L6,11 C6.36006097,11 6.65194806,10.7081129 6.65194806,10.3480519 L6.65194806,3.02646954 L8.44719272,5.32801875 C8.6404327,5.57575732 8.99791646,5.61993715 9.24565503,5.42669716 C9.26444805,5.41203831 9.28230129,5.39621293 9.2991092,5.37931459 L9.2991092,5.37931459 C9.55605877,5.12098268 9.57132199,4.70855346 9.33416991,4.43193577 L6.75918715,1.42843795 C6.39972025,1.00915046 5.76841509,0.960656296 5.34912761,1.32012319 C5.31030645,1.35340566 5.27409532,1.38961679 5.24081285,1.42843795 L2.66583009,4.43193577 C2.42867801,4.70855346 2.44394123,5.12098268 2.7008908,5.37931459 Z"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" id="check">
            <path id="test" d="M4.76499011,6.7673683 L8.2641848,3.26100386 C8.61147835,2.91299871 9.15190114,2.91299871 9.49919469,3.26100386 C9.51164115,3.27347582 9.52370806,3.28637357 9.53537662,3.29967699 C9.83511755,3.64141434 9.81891834,4.17816549 9.49919469,4.49854425 L5.18121271,8.82537365 C4.94885368,9.05820878 4.58112654,9.05820878 4.34876751,8.82537365 L2.50080531,6.97362503 C2.48835885,6.96115307 2.47629194,6.94825532 2.46462338,6.93495189 C2.16488245,6.59321455 2.18108166,6.0564634 2.50080531,5.73608464 C2.84809886,5.3880795 3.38852165,5.3880795 3.7358152,5.73608464 L4.76499011,6.7673683 Z"></path>
    </symbol>
</svg>
    <!-- JQUERY -->
    <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
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
var btnSCM = document.getElementById("btnSRM");

/* Se agrega el evento al elemento */
btnSRM.addEventListener("click", getcboxbtnSRM);

/* Función que se gatilla al hacer click en el elemento BOTON */
function getcboxSCM() {
  var i = 0;
  var checkActivos = [];
  console.log('CONSULTA MASIVO');
  $("input[type=checkbox]:checked").each(function(){ 
  //console.log($(this).val());
  checkActivos.push($(this).val());
  
  /*
  $(this).closest('td').siblings().each(function(){

    // obtenemos el texto del td 
    console.log($(this).text());
  });*/
  });
  //console.log(checkActivos);
  preDataSCM(checkActivos);
}

/* Función que se gatilla al hacer click en el elemento BOTON */
function getcboxbtnSRM() {
  var i = 0;
  var checkContador = [];
  var checkATxt = []
  console.log('REGISTRO MASIVO');
  $("input[type=checkbox]:checked").each(function(){
    checkContador.push($(this).val());
    $(this).closest('td').siblings().each(function(){
    // obtenemos el texto del td 
    console.log($(this).text());
    
    checkATxt.push($(this).text());
    });
/*
  console.log($(this).val());
  checkActivos.push($(this).val());
*/
console.log(checkContador);

  });
  console.log(checkATxt);
  checkContador.forEach(getTrId);
  function getTrId(elemento, indice){
    console.log( "Indice: " + indice + " Valor: " + elemento );
    var elementodivi = elemento.split('_');
    var idtr = elementodivi[1];
    console.log($('#row_' + idtr).length);
  }
}

function preDataSCM(date){
  console.log(date);

  date.forEach(miFuncion);
 
function miFuncion(elemento, indice) {
    console.log( "Indice: " + indice + " Valor: " + elemento );
    bdato = elemento;
    //DIVIDIMOS PARA BUSCAR EL DATO
    var elementodivi = elemento.split('_');
    console.log(typeof elementodivi);
    console.log(elementodivi);
    console.log(elementodivi[1]);
    //CAPSULAMOS EL DATO A BUSCAR
    elemabusc = elementodivi[1];
    console.log(tableData);
    //BUSCAMOS DATOS SELECCIONADOS  
    var buscar = tableData.find(function(cnumero){ return cnumero.cnumero == elemabusc + '  ';});
    if(buscar){
      console.log(buscar);
      var monto = buscar['nimporte']
      var numero = buscar['cnumero'].trim();
      var cserie = buscar['cserie'];
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
        console.log(queryformatSunat);
        //SE ENVIA DATOS A LA FUNCION
        makeRequests(queryformatSunat);
    }
    else
    {
      console.log('No se encontro');
    }
}
function convertDateFormat(string) {
        var info = string.split('-').reverse().join('/');
        return info;
   }
  //var valorcnumero = valor.split(" ");
  //console.log(valorcnumero[0]);

  /*
  ltableData = tableData.trim();
  console.log(ltableData  );
  */
  

  
}
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
// FECHA
  $(function() {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left'
    }, function(start, end, label) {
      dateStart = start.format('YYYY-MM-DD');
      dateEnd = end.format('YYYY-MM-DD');
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      var sizeTable = document.getElementById('sizeTable');
      var sizeTableoption = sizeTable.options[sizeTable.selectedIndex];
      sizeTablevalue = sizeTableoption.value;
      console.log("Tamaño" + sizeTablevalue);
      borrarTable()
      //GET DATA TABLE
      dtableDEmitidos(dateStart, dateEnd, sizeTablevalue);
    });
  });
  //CONSULTA BASE DATOS DE LA EMPRESA
  const dtableDEmitidos = async (dateuno, datedos, size) => {
    console.log('Se hara consulta con este rango de fecha : ' + dateuno + 'Fecha Fin ' + datedos);
    const body = new FormData();
    var data = {
      "accion" : '1',
      "dateuno" : dateuno,
      "datedos" : datedos,
      "size" : size,
    };
    body.append("data", JSON.stringify(data));  
    const returnSunat = await fetch("./../../controllers/controllerSunat.php", { method: "POST", body});
    const resultSunat = await returnSunat.json(); //await JSON.parse(returned);
    handleReturnedDocEmiSunat(resultSunat);
  };
  const handleReturnedDocEmiSunat = (data) => {
    //rJParse = JSON.parse(data);
    tableData = data['result'];
    //console.log(tableData);
    
    createTable(tableData);
    //$("#cArticle_idselectBrand").html(data).selectpicker('refresh');
    //$("#filcat").html(data).selectpicker('refresh');
  }
  function borrarTable() {
    let tableBody = document.getElementById('drcsunat');
    
    /*
    let table = document.getElementById('table-Sunat');
    table.removeChild(tableBody);
    */
    //document.getElementById('drcsuat').innerHTML = '';
    tableBody.innerHTML = '';
  }
  //GENERANDO CUERPO DE TABLA
  function createTable(tableData) {
    
    let tableBody = document.getElementById('drcsunat');
    //let table = document.getElementById('table-Sunat');
    var numruc = '20370715107';
    var tipCom = '01';
    var stateSunat = '-';
    var stateBD = '-';
    var consultSunat = 'Consultar 📝';
    var sendSunat = 'Enviar a Sunat 📨';
    //BOTON ANIMADO
    var txtPEstado = 'No consultado';
    var txtSEstado = 'Consultando';
    var txtTEstado = 'Activo';
    c = 0;
    //i = 0;
    //tableBody.parentNode.removeChild(tableBody);
    console.log(tableData);
    const tabBody = document.createElement('tbody');
    tabBody.setAttribute("id", "drcsunat");
    tabBody.setAttribute("role", 'rowgroup');
    
    //tableBody.removeChild(primerParrafo);
    tableData.forEach(function(obj) {
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
      console.log(i);
      //var numero = dcsnat['data']['numero'].trim();
      idSpanSestado = tableData[i]['cnumero'].trim();
      console.log(tableData[i]);
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
      cellnumruc.appendChild(document.createTextNode(numruc));
      celldtipdoc.appendChild(document.createTextNode(tipCom));
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
      celldastateSunat.appendChild(aSConsult);
      spanBD.appendChild(document.createTextNode(stateBD));
      celldastateDb.appendChild(spanBD);
      cellCheck.appendChild(ipt);
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
          row.appendChild(cell);
        }
        else{
          //console.log('no');
          cell.appendChild(document.createTextNode(elementdos));
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
    
    console.log('Hola Fecha seleccionado es : ' + dateStart + ' hasta' +  dateEnd);
  });
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
    console.log(dcsnat);
    var codComp;
    var numeroSerie = dcsnat['data']['numeroSerie'];
    var numero = dcsnat['data']['numero'].trim();
    console.log(numero);
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
      if(dcsnat['data']['estadoCp'] == "1"){
        estadoCp = 'ACEPTADO';
        ctcsunat = 'class="table-success"';
        textSpestadoSunat.innerHTML = estadoCp;
        textSpestadoSunat.className += "label label-table label-success";
      }
      else{
        estadoCp = 'NO EXISTE';
        ctcsunat = 'class="table-danger"';
        textSpestadoSunat.innerHTML = estadoCp;
        textSpestadoSunat.className = "label label-table label-danger";
      }
      ecsnat = '<tr ' + ctcsunat + ' role="row">';
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
        ecsnat+='</tr>';
        //innerHTML += ecsnat; 
        //trSTFila.insertAdjacentElement('afterend', ecsnat);
        $( ecsnat ).insertAfter( '#row_' + numero );
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
            "accion" : '0',
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
</body>
</html>