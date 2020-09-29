<?php
//header('Access-Control-Allow-Origin: *');
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
    <h1>Hello, <?php echo $urlcurrent?>!</h1>
    <button>Consultar Sunat</button>
    <input type="file" id="file-input" />
    <h3>Contenido del archivo:</h3>
    <pre id="contenido-archivo"></pre>
    <?php
    $ArchivoLeer = "./../../data/NDEBITO01_27092020.txt";
    if(touch($ArchivoLeer)){
      //
      $archivoID = fopen($ArchivoLeer, "r");
      //
      while( !feof($archivoID)){
        $linea = fgets($archivoID, 1024);
        //
        print "<p>".$linea."</p>";
      }
      //
      fclose($archivoID);
    }
    //CONSULTA SUNAT
    /*
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.sunat.gob.pe/ol-ti-itconsultaunificadalibre/consultaUnificadaLibre/consultaIndividual?numRuc=20370715107&codComp=01&numeroSerie=FF04&numero=124540&codDocRecep&numDocRecep&fechaEmision=26/09/2020&monto=4181.00&codigo=TQFR",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "Cookie: f5avraaaaaaaaaaaaaaaa_session_=DHHDHFEFDOONJJLECCDPKLFCMKHKKBNCEOFFIBOAOEFDMGEJLMCNIOFHEHOBFALGIDIDJLEMNPJNLNFPFFOAFHGBGFLIMMIOELFMMDMKICOEICGCHBIPPOGEFFFLFBKC; TS01d23cbd=019edc9eb84eb1e333cf4dd6fade481d66afaa3b5d536cf5966c444c17f98861e563485b7e621b543fa4e447ee95d4b60240366ee69db63609cefebc4c5c8bb69fb8284e92; ITCONSULTAUNIFICADALIBRESESSION=XbLaeYTGu2lwB8gfd7jWUUVtCJV1GsysgedLvdlB-5jkno1HeOg2ych6vz7sWWH2cchGdVU6Ahbpj2I4QzRTVG4RVBR6IOQihI1MCXQYbcQv-2hd42EdbokEHOrAc_YKRrDpXwYu6SSu-mZdY8TnbHnLPQmSS8Q2C6pbrCVMrlmn0KwAox9MfKaWdRymh1JOrvxXiksKUfwjEP7EKpE11B7HMRJ6ClxpIoDYpAAwvVBhT2pWhIEUikC1leW9O38B!1484195530!1415101546; TS0103674e=019edc9eb8cdf24961109d6e1626d7852700346061c84b2c8a329f64170f8fd30db2999c13def6143bf642c24ddb33f638f4dc6df918ed9cdd24150b2d6bf07bececd809209b5733ae5b0c1ca212430ecf4331bd739e70e398a2e136cd103431fb82aa74a9"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;*/
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    
    <script>
      var = csunat;
      fetch('./get_data.php')
  .then(response => response.json())
  .then(data => csunat = data);

  console.log(csunat);
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