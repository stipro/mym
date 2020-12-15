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
      <button type="button" id="" class="btn btn-success">Consultar SUNAT</button>
    </div>
    <div>
      <button type="button" id="" class="btn btn-success">Registrar</button>
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
            <!--
                <tr role="row">
                    <th scope="row">1</th>
                    <td role="cell">James</td>
                    <td role="cell">Matman</td>
                    <td role="cell">Chief Sandwich Eater</td>
                    <td role="cell">James</td>
                    <td role="cell">Matman</td>
                    <td role="cell">Chief Sandwich Eater</td>
                    <td role="cell">Chief Sandwich Eater</td>
                </tr>-->
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
    <!-- JQUERY -->
    <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
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
      //GET DATA TABLE
      dtableDEmitidos(dateStart, dateEnd, sizeTablevalue);
    });
  });
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
  //GENERANDO CUERPO DE TABLA
  function createTable(tableData) {
    
    //let tableBody = document.getElementById('drcsunat');
    let tableBody = document.getElementById('drcsunat');
    var numruc = '20370715107';
    var numruc = '20370715107';
    var tipCom = '01';
    var stateSunat = '-';
    var stateBD = '-';
    var consultSunat = 'Consultar 📝';
    var sendSunat = 'Enviar a Sunat 📨';
    c = 0;
    //tableBody.parentNode.removeChild(tableBody);
    console.log(tableData);
    //tableBody.removeChild(primerParrafo);
    tableData.forEach(function(obj) {
      c++;
      //CREAMOS ETIQUETA
      const cellCheck = document.createElement('td'); 
      const ipt = document.createElement('input');  
      const row = document.createElement('tr');      
      const celld = document.createElement('td');
      const cellnumruc = document.createElement('td');
      const celldtipdoc = document.createElement('td');
      const celldastateSunat = document.createElement('td');
      const celldastateDb = document.createElement('td');
      const spanConsult = document.createElement('span');
      const spanBD = document.createElement('span');
      const spanSend = document.createElement('span');
      const celldacciones = document.createElement('td');
      const btnaconsult = document.createElement('a');
      const btnaSendSunat = document.createElement('a');

      //AGREGAMOS TYPE O TIPO A ETIQUETA
      ipt.type = "checkbox";
      ipt.name = "dinamico";
      //c=c-1;
      btnaconsult.setAttribute("data-json", c);
      btnaconsult.setAttribute("data-nComprobante", c);
      //AGREGAMOS CLASE A ETIQUETA
      btnaconsult.className = "btn btn-warning btnConsul";
      btnaSendSunat.className = "btn btn-warning";
      spanConsult.className = "label label-table label-success";
      spanBD.className = "btn btn-warning";
      //AGREGARMOS TEXTO O CONTENIDO A LA ETIQUETA
      celld.appendChild(document.createTextNode(c));
      cellnumruc.appendChild(document.createTextNode(numruc));
      celldtipdoc.appendChild(document.createTextNode(tipCom));
      spanConsult.appendChild(document.createTextNode(stateSunat));
      spanBD.appendChild(document.createTextNode(stateBD));
      celldastateSunat.appendChild(spanConsult);
      celldastateDb.appendChild(spanBD);
      cellCheck.appendChild(ipt);
      btnaconsult.appendChild(document.createTextNode(consultSunat+c));
      btnaSendSunat.appendChild(document.createTextNode(sendSunat));
      celldacciones.appendChild(btnaconsult);
      celldacciones.appendChild(btnaSendSunat);
    //CONSULTAR SUNAT INDIVIDUAL
    btnaconsult.addEventListener('click', obtenerValores);
    
    function obtenerValores(e) {
        //OBTENEMOS VALOR DATA
        dataJson = btnaconsult.getAttribute('data-json');
        id = dataJson - 1; 
        //console.log('Usted esta en la funcion ' + id);
        //console.log(tableData);
        console.log(tableData[id]);
        docConsultaIndividual = tableData[id];
          cserie = docConsultaIndividual['cserie']
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
          var numero = docConsultaIndividual['cnumero'].trim()
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
          console.log(queryformatSunat);
        makeRequests(queryformatSunat);
    }
    //
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
      console.log(obj);
      Object.keys(obj).forEach(function(key) {
        var cell = document.createElement('td');
        //console.log(c);
        element = key, obj[key];
        elementdos = obj[key];
        console.log(element);
        console.log(elementdos);
        if(element == 'benviado'){
          //console.log('si');
          //elementdos = '';
          //cell.appendChild(document.createTextNode(elementdos));
          if(elementdos){
            spanSend.className = "label label-table label-success";
            elementdos = 'ENVIADO';
            console.log('verdad');
          }else{
            spanSend.className = "label label-table label-danger";
            console.log('falso');
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
      tableBody.appendChild(row);
    });
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
    var drcsunat = document.getElementById('drcsunat');
    var tableSunat = document.getElementById('table-Sunat');

    var ecsnat;
    var ctcsunat;
    var dcsnat = JSON.parse(data);
    var codComp;
    var numeroSerie = dcsnat['data']['numeroSerie'];
    var numero = dcsnat['data']['numero'];
    var fechaEmision = dcsnat['data']['fechaEmision'];
    var monto = dcsnat['data']['monto'];
    var validatorDocnum = dcsnat['data']['codComp']
    console.log(validatorDocnum);
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
      }*/
      console.log('se convertio');
      console.log(codComp);
      var estadoCp;
      if(dcsnat['data']['estadoCp'] == "1"){
        estadoCp = 'ACEPTADO';
        ctcsunat = 'class="table-success"';
      }
      else{
        estadoCp = 'NO EXISTE';
        ctcsunat = 'class="table-danger"';
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
        $("#drcsunat").append(ecsnat);
        
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
            //consola.log('llego a 5 consultas');
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
          handleReturnedData(result);
        }
        afterSending();
      };   
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>