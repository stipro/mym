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
            <input type="text" name="daterange" value="10/11/2020 - 10/20/2020" />
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
    <div class="table-responsive-md">
        <table class="table table-hover" role="table">
            <caption>Consulta a Sunat</caption>
            <thead class="thead-dark" role="rowgroup">
                <tr role="row">
                    <th scope="col">#</th>
                    <th scope="col" role="columnheader">Tipo de comprobante</th>
                    <th scope="col" role="columnheader">Serie y número de comprobante</th>
                    <th scope="col" role="columnheader">Fecha de emisión</th>
                    <th scope="col" role="columnheader">Importe tota</th>
                    <th scope="col" role="columnheader">Estado del comprobante a la fecha de la consulta</th>
                    <th scope="col" role="columnheader">Estado del contribuyente a la fecha de emisión</th>
                    <th scope="col" role="columnheader">Condición de domicilio a la fecha de emisión</th>
                </tr>
            </thead>
            <tbody id="drcsunat" role="rowgroup">
                <tr role="row">
                    <th scope="row">1</th>
                    <td role="cell">James</td>
                    <td role="cell">Matman</td>
                    <td role="cell">Chief Sandwich Eater</td>
                    <td role="cell">James</td>
                    <td role="cell">Matman</td>
                    <td role="cell">Chief Sandwich Eater</td>
                    <td role="cell">Chief Sandwich Eater</td>
                </tr>
            </tbody>
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
            </tfoot>
        </table>
    </div>
    <!-- JQUERY -->
    <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
  $(function() {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left'
    }, function(start, end, label) {
      dateStart = start.format('YYYY-MM-DD');
      dateEnd = end.format('YYYY-MM-DD');
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      //GET DATA TABLE
      dtableDEmitidos(dateStart, dateEnd);
    });
  });
  const dtableDEmitidos = async (dateuno, datedos) => {
    console.log('Se hara consulta con este rango de fecha : ' + dateuno + 'Fecha Fin ' + datedos);
    const body = new FormData();
    var data = {
      "accion" : '1',
      "dateuno" : dateuno,
      "datedos" : datedos,
    };
    body.append("data", JSON.stringify(data));  
    const returnSunat = await fetch("./../../controllers/controllerSunat.php", { method: "POST", body});
    const resultSunat = await returnSunat.json(); //await JSON.parse(returned);
    handleReturnedDocEmiSunat(resultSunat);
  };
  const handleReturnedDocEmiSunat = (data) => {
    //rJParse = JSON.parse(data);
    createTable(data);
    //console.log(data);
    //$("#cArticle_idselectBrand").html(data).selectpicker('refresh');
    //$("#filcat").html(data).selectpicker('refresh');
  }
  //GENERANDO CUERPO DE TABLA
  function createTable(tableData) {
    let tableBody = document.getElementById('drcsunat');
    var tipCom = '01';
    c = 0;
    tableData.forEach(function(obj) {
      var row = document.createElement('tr');
      c++;
      var celld = document.createElement('td');
      var celldtipdoc = document.createElement('td');
      celld.appendChild(document.createTextNode(c));
      celldtipdoc.appendChild(document.createTextNode(tipCom));
      row.appendChild(celld);
      row.appendChild(celldtipdoc);
      Object.keys(obj).forEach(function(key) {
        var cell = document.createElement('td');
        
        console.log(c);
        element = key, obj[key];
        elementdos = obj[key];
        //console.log(element);
        
        cell.appendChild(document.createTextNode(elementdos));
        //celld.appendChild(cell);
        row.appendChild(cell);
        //console.log(key, obj[key]);
        console.log(obj[key]);
      });
      
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
    var ecsnat;
    var ctcsunat;
    var dcsnat = JSON.parse(data);
    var codComp;
    var numeroSerie = dcsnat['data']['numeroSerie'];
    var numero = dcsnat['data']['numero'];
    var fechaEmision = dcsnat['data']['fechaEmision'];
    var monto = dcsnat['data']['monto'];
    if(dcsnat['data']['codComp'] == "08"){
      codComp = 'N. DEBITO';
    }
      else{
        codComp = 'NO EXISTE';
      }
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
      ecsnat+='<td role="cell">' + numeroSerie + ' - ' + numero + '</td>';
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
      const makeRequests = async (doc) => {
        beforeSending();
        let ccontador = 0;
        let climite = 5;
        //RECORRE LISTA
        for (const prop in doc) {
          ccontador++;
          console.log(ccontador);
          if(ccontador == climite){
            climite = (climite + 5);
            console.log(climite);
            await sleep(2000);
            //consola.log('llego a 5 consultas');
          }
          console.log(doc);
          const body = new FormData();
          
          var data = {
            "accion" : '0',
            "doc" : doc[prop]
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