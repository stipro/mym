<?php
print_r($_POST);
    if($_POST){
        //CONSULTA 1 X 1
        $jedcsunat = json_encode($_POST);
        $jddcsunat = json_decode($jedcsunat);
        //var_dump($jddcsunat);
        //var_dump($jddcsunat->numRuc);
        
        $codigo = 'TQFR';
        $numRuc = $jddcsunat->numRuc;
        $codComp = $jddcsunat->codComp;
        $numeroSerie = $jddcsunat->numeroSerie;
        $numero = $jddcsunat->numero;
        $codDocRecep = '';
        $numDocRecep = '';
        $fechaEmision = $jddcsunat->fechaEmision;
        $monto = $jddcsunat->monto;        
        $curl = curl_init();
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
              "Cookie: f5avraaaaaaaaaaaaaaaa_session_=NOKNBPEMKNNFFMLKABJCPPFAPDEFLCPFCINJOBBJBIKLJHMDEMHGCIMNLGMDOBPGCODDNPAHOEGOBFGDIBIAGEPGLAMBOLOPAJFOKHILPCGIKDMHIBBKJNIEDFICGIDC; ITCONSULTAUNIFICADALIBRESESSION=4D70qWgifXDISe_lMN2mc8CsAH1UMsv2t5-mMQEKdCLRaUOVQQWG2hxy9BSBAPZUx8PYzy0qnAPDVCZXySceh8AJ-KEFe_lABH2YWosVeXe0ibnvWg3-xBgGo378x0QdTQCoYgXx5b6r_w5T-_jXPZFY1mmoPTRJEddN32br002RTVkU3Sn1YT2f6PlHDoh7aSi8eWSlRLu6KulMJU0WGcP_JV91i-xS9PBGAQTUNVFqjTuwJ9mTPbkayGmKxKhE!-774181940!1724517599; TS01129fe7=014dc399cb33c455bc76177e2ce75b04cc5ccabf591455b3efd50d700a6f07e3357f9988b16117c51e6fa7b7348d6fa34cc3f4608684337317bcc495d2433fec2128afcb8afaef0829f204743e689cce3ba429f506"
            ),
          ));
          sleep(1);
          $response = curl_exec($curl);
          
          curl_close($curl);
          $dresponse = json_decode($response);
          var_dump($dresponse);
          
        /*
        //ENVIO POR LISTADO
        $alds = array();
        $jlds = $_POST;
        $jelds = json_encode($_POST);
        $c = 0;
        $codigo = 'TQFR';
        //RECORREMOS EL ARRAY
        foreach($jlds as $key){
            ++$c;
            $numRuc = $key['numRuc'];
            $codComp = $key['codComp'];
            $numeroSerie = $key['numeroSerie'];
            $numero = $key['numero'];
            $codDocRecep = '';
            $numDocRecep = '';
            $fechaEmision = $key['fechaEmision'];
            $monto = $key['monto'];
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
            //EJECUTAMOS
            $response = curl_exec($curl);
            //CERRAMOS            
            //CONVERTIMOS JSON A VARIABLE PHP
            $dresponse = json_decode($response);
            //GUARDAMOS EN ARRAY
            $alds[$c] = array($dresponse);
            //echo ($dresponse);            
        }
        curl_close($curl);
        //var_dump($alds);
        $jelds = json_encode($alds);
        echo $jelds;*/
        
        //ENVIO UNO * UNO
        /*
        $numRuc = $_POST[1]['numRuc'];
        $codComp = $_POST[1]['codComp'];
        $numeroSerie = $_POST[1]['numeroSerie'];
        $numero = $_POST[1]['numero'];
        $codDocRecep = '';
        $numDocRecep = '';
        $fechaEmision = $_POST[1]['fechaEmision'];
        $monto = $_POST[1]['monto'];
        
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
        //EJECUTAMOS
        $response = curl_exec($curl);
        //CERRAMOS
        curl_close($curl);
        //CONVERTIMOS JSON A VARIABLE PHP
        $dresponse = json_decode($response);
        echo ($dresponse);
        */
    }
    else{
        echo 'No se recibio ningun dato';
    }

?>