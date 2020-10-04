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
      //Si necesitas hacer algo con las respuestas del servidor
      //hacelas aqui.
      const handleReturnedData = (data) => {

      };

      //Si necesitas hacer algo antes de enviar las
      //consultas, hacelo aqui.
      const beforeSending = () => {

      };

      //Si necesitas hacer algo despues de que terminen las
      //consultas, hacelas aqui.
      const afterSending = () => {

      };

      const makeRequests = async (data) => {
        beforeSending();
        for (const req of  data) {
          const returned = await fetch("./get_data.php", { method: "POST", body: JSON.stringify(req)});
          const result = await JSON.parse(returned);
          handleReturnedData(result);
        }
        afterSending();
      };

      let adata = <?php echo $jelsunat ?>;
      makeRequests(JSON.parse(adata));
   
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>