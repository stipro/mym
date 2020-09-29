<?php
  $curl = curl_init();
    $numRuc = '20370715107';
    $codComp = '01';
    $numeroSerie = 'FF04';
    $numero = '124540';
    $codDocRecep = '';
    $numDocRecep = '';
    $fechaEmision = '26/09/2020';
    $monto = '4181.00';
    $codigo = 'TQFR';
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.sunat.gob.pe/ol-ti-itconsultaunificadalibre/consultaUnificadaLibre/consultaIndividual?numRuc=$numRuc&codComp=$codComp&numeroSerie=$numeroSerie&numero=$numero&codDocRecep&numDocRecep&fechaEmision=$fechaEmision&monto=$monto&codigo=$codigo",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array(
      "Cookie: f5avraaaaaaaaaaaaaaaa_session_=JIGCMBIKALCMINIJPKEMHJIFBOOCBGLKOJGCJDIMFDIMHLJCLEDOEGMBCBKLPIBIEKMDLDOLKOEJKJMDGMFAONKPCJFIAHAOIFPBJHNOLFKCBDBGCLJHBGIDHDPHMBFF; ITCONSULTAUNIFICADALIBRESESSION=FjHbqLKlE8et1jL0qY_nFlergor1NxqPlhzCFuY_gKMbVOlueMsu0j9fCFhQ1IpNNq5aVw4n8VuA5_CzMoiCmWbG4IQK8RyAtZlnxobSR7D7Na3qsY_IG96anurYO0Y0l0o_E_opZ0tUxwGggXfVHGC7AAhNCDx0JYOCGP_f5ALt5u36K3fi_gpBiKrLj-9CT9v1377FvkRTOG7GnZ9M7hCI6wCvXdV_J50n9hSFSW_jqR6xpLKxnM7NndEfd1qm!1484195530!1415101546; TS0103674e=019edc9eb8a87537691a42dc458b3e1daff18e3c32661d722c9fb443996479e6bb5275f3ac1e38b6b4cceb5d360e2586492c5119c0a4e8a57d468579f1bc0bae33096bade83984f4412b51ed741ab5d3d6501d195f"
    ),
  ));
  
  $response = curl_exec($curl);
  
  curl_close($curl);
  echo $response;
?>