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
        //QUITAMOS EL SIGNO \n
        $pmonto = explode("\n", $porciones[5]);
        //$alsunat[$c]['monto'] = (float) $alsunat[$c]['monto'];
        $alsunat[$c] = array("numRuc"=>$porciones[0], "codComp"=>$porciones[1],"numeroSerie"=>$porciones[2], "numero"=>$porciones[3], "fechaEmision"=>$porciones[4],"monto"=>$pmonto[0]);
      }
      //CERRAMOS
      fclose($archivoID);
    }
    var_dump($alsunat);
    $jelsunat = json_encode($alsunat);    
    ?>
    <div class="csaSunat">

    </div>
    <!-- JQUERY -->
    <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    
    <script>  
      var jpdata;
      let adata = [];
      gdata = [];
      //var jslsunat = JSON.stringify(<?php echo $jelsunat ?>);
      //var jplsunat = JSON.parse(jslsunat);
      //console.log(jplsunat)
      //OBTENGO EL OBJETO OBTENIDO DE TXT
      adata = <?php echo $jelsunat ?>;
      //IMPRIMO POR CONSOLA EL DATO
      console.log(adata);
      //
      console.log(adata[1]);
      apdato = adata[1];
      //DECLARAMOS EL CONTADOR A 0
      var c = 0;
      //RECORREMOS EL OBJETO
      //CONSULTA INDIVIDUAL
      for (const property in adata) {
        
        console.log(c);
        c++;
        //console.log(`${property}: ${jplsunat[property]['numero']}`);
        gdata = adata[c];
        console.log(gdata)
        //console.log(Object.values(adata));
        //const olsunat = JSON.stringify(jplsunat[1]);
        var jqxhr = $.ajax({        
          beforeSend: function(){
              alertPrimary = '<div class="alert alert-primary" role="alert">';
              alertPrimary+= 'A simple primary alert—check it out!';
              alertPrimary+= '</div>';
              $("#respuesta").empty().append(alertPrimary);
          },
          url: './get_data.php',
          type: 'POST',
          data: gdata,
        })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
      //jpdata = JSON.parse(data);
      console.log(data);
    })
    //SI OCURRE UN ERROR
    .fail(function() {
        console.log( "error" );
    })
    //EJECUTA AL TERMINAR LA FUNCION YA SEHA ERROR O EXITO
    .always(function() {
        console.log( "completado" );
    });
    // Hacer otra cosa aquí ...
    // Asignar otra función de completado para la petición de más arriba
    jqxhr.always(function() {
    console.log( "completado segundo" );
    });
      }
      /*
      var jqxhr = $.ajax({
        
        beforeSend: function(){
            alertPrimary = '<div class="alert alert-primary" role="alert">';
            alertPrimary+= 'A simple primary alert—check it out!';
            alertPrimary+= '</div>';
            $("#respuesta").empty().append(alertPrimary);
        },
        url: './get_data.php',
        type: 'POST',
        data: apdato,
    })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
      /*
      jpdata = JSON.parse(data);
      //var jpdata = JSON.parse(jsdata);
        console.log(jpdata);
        //console.log(jdata['data']['estadoCp']);
        if(jpdata['data']['estadoCp'] == "1"){
          console.log("Estado: ACEPTADO");
        }
        else{
          console.log("Estado: NO EXISTE");
        }
        //console.log(jdata['data']['estadoRuc']);
        if(jpdata['data']['estadoRuc'] == "00"){
          console.log("Estado Contribuyente: ACTIVO");
        }
        else{
          console.log("Estado Contribuyente: -");
        }
        //console.log(jdata['data']['condDomiRuc']);
        if(jpdata['data']['estadoRuc'] == "00"){
          console.log("Estado Contribuyente: HABIDO");
        }
        else{
          console.log("Estado Contribuyente: -");
        }
        //console.log(jdata['rpta']);
        $("#csaSunat").append("<br>texto añadido al final del párrafo.");
        
    })
    //SI OCURRE UN ERROR
    .fail(function() {
        console.log( "error" );
    })
    //EJECUTA AL TERMINAR LA FUNCION YA SEHA ERROR O EXITO
    .always(function() {
        console.log( "completado" );
    });
    // Hacer otra cosa aquí ...
    // Asignar otra función de completado para la petición de más arriba
    jqxhr.always(function() {
    console.log( "completado segundo" );
    });
    */
    /*
    function leerArchivo(e) {
    var archivo = e.target.files[0];
      if (!archivo) {
        return;
      }
      var lector = new FileReader();
      lector.onload = function(e) {
        var contenido = e.target.result;
        mostrarContenido(contenido);
        console.log(contenido);
      };
      lector.readAsText(archivo);
    }

    function mostrarContenido(contenido) {
      var elemento = document.getElementById('contenido-archivo');
      
      elemento.innerHTML = contenido;
    }
    document.getElementById('file-input')
      .addEventListener('change', leerArchivo, false);*/
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>