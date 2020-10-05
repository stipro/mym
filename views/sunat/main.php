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
    <!--Estilo Tabla [ REQUIRED ]-->
    <link href="./../../assets/css/table.css" rel="stylesheet">
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
    <h1>Hello, <?php echo $urlcurrent?>!</h1>
    <button>Consultar Sunat</button>
    <input value="ES" type="file" id="file-input" />
    <h3>Contenido del archivo:</h3>
    <pre id="contenido-archivo"></pre>
    <?php
    $alsunat = array();
    $adsunar = array();
    $c = 0;
    //URL DEL ARCHIVO
    $ArchivoLeer = "./../../data/NDEBITO01_27092020.txt";
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
                <tr role="row">
                    <th scope="row">2</th>
                    <td role="cell">The</td>
                    <td role="cell">Tick</td>
                    <td role="cell">Crimefighter Sorta</td>
                    <td role="cell">The</td>
                    <td role="cell">Tick</td>
                    <td role="cell">Crimefighter Sorta</td>
                    <td role="cell">Crimefighter Sorta</td>
                </tr>
                <tr role="row">
                    <th scope="row">3</th>
                    <td role="cell">Jokey</td>
                    <td role="cell">Smurf</td>
                    <td role="cell">Giving Exploding Presents</td>
                    <td role="cell">Jokey</td>
                    <td role="cell">Smurf</td>
                    <td role="cell">Giving Exploding Presents</td>
                    <td role="cell">Giving Exploding Presents</td>
                </tr>
                <tr role="row">
                    <th scope="row">4</th>
                    <td role="cell">Cindy</td>
                    <td role="cell">Beyler</td>
                    <td role="cell">Sales Representative</td>
                    <td role="cell">Cindy</td>
                    <td role="cell">Beyler</td>
                    <td role="cell">Sales Representative</td>
                    <td role="cell">Sales Representative</td>
                </tr>
                <tr role="row">
                    <th scope="row">5</th>
                    <td role="cell">Captain</td>
                    <td role="cell">Cool</td>
                    <td role="cell">Tree Crusher</td>
                    <td role="cell">Captain</td>
                    <td role="cell">Cool</td>
                    <td role="cell">Tree Crusher</td>
                    <td role="cell">Tree Crusher</td>
                    <!--<td role="cell">Under the couch</td>-->
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
    
    <script>  
      //Si necesitas hacer algo con las respuestas del servidor
      //hacelas aqui.
      const handleReturnedData = (data) => {
        /*
        dcsnat = '<tr role="row">' +
                  '<th scope="row">1</th>'+
                  '<td role="cell">James</td>'+
                  '<td role="cell">Matman</td>'+
                  '<td role="cell">Chief Sandwich Eater</td>'+
                  '<td role="cell">James</td>'+
                  '<td role="cell">Matman</td>'+
                  '<td role="cell">Chief Sandwich Eater</td>'+
                  '<td role="cell">Chief Sandwich Eater</td>'+
                '</tr>';*/
        var dcsnat = JSON.parse(data);
        ecsnat = '<tr role="row">';
        ecsnat+='<th scope="row">1</th>';
        var codComp;
        if(dcsnat['data']['codComp'] == "08"){
          codComp = 'N. DEBITO';
        }
        else{
          codComp = 'NO EXISTE';
        }
        ecsnat+='<td role="cell">' + codComp + '</td>';
        var numeroSerie = dcsnat['data']['numeroSerie'];
        var numero = dcsnat['data']['numero'];
        ecsnat+='<td role="cell">' + numeroSerie + ' - ' + numero + '</td>';
        var fechaEmision = dcsnat['data']['fechaEmision'];
        ecsnat+='<td role="cell">' + fechaEmision + '</td>';
        var monto = dcsnat['data']['monto'];
        ecsnat+='<td role="cell">' + monto + '</td>';
        var estadoCp;
        if(dcsnat['data']['estadoCp'] == "1"){
          estadoCp = 'ACEPTADO';
        }
        else{
          estadoCp = 'NO EXISTE';
        }
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
        
        console.log(dcsnat);

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
      };

      const makeRequests = async (data) => {
        beforeSending();
        for (const prop in data) {
          const body = new FormData();
          body.append("data", JSON.stringify(data[prop]));
          const returned = await fetch("./get_data.php", { method: "POST", body });
          const result = await returned.json();//await JSON.parse(returned);
          handleReturnedData(result);
        }
        afterSending();
      };

      let adata = <?php echo $jelsunat ?>;

      console.log(adata[1]);
      //adata = JSON.parse(adata);
      console.log(typeof adata);
      makeRequests(adata);
   
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>