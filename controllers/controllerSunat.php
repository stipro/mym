<?php
header('Content-type: application/json; charset=utf-8');
//COMPROBAMOS RECEPCION
if($_POST){
    //OBTENEMOS TODO ERRORES
    try{
        $object = $_POST['data'];
        $dataSunat = json_decode($object,true);
        $accion = $dataSunat['accion'];
        //0 = CONSULTAR RANGO FECHA BD PRINCIPAL
        //1 = CONSULTAR SUNAT
        //2 = INSERTAR DB
        if($accion == '1')
        {
            require_once ('./../models/sunat.php');
            $sunat = new Sunat();
            //echo 'es 0';
            //REQUERIMOS ARCHIVO
            //Se instacia la clase
            $dataSunatDoc = $dataSunat['doc'];
            //var_dump($dataSunatDoc);
            $jedcsunat = json_encode($dataSunatDoc);
            //var_dump($jedcsunat);
            //$rptApiSunat = $sunat->getApiSunat($jedcsunat);
            $rptApiSunat = $sunat->getApiSunat($dataSunatDoc);
            //$jdrptSunat = json_decode($rptApiSunat);
            //var_dump($jdrptSunat);
            //var_dump($rptApiSunat);
            if($rptApiSunat)
            {
                echo $rptApiSunat;
                $jdrptSunat = json_decode($rptApiSunat);
                //var_dump($jdrptSunat);
                $porciones = explode('"', $jdrptSunat);
                //var_dump($porciones);
                //Preparacion Datos
                $numRuc = $porciones[21];
                $codComp = $porciones[13];
                $numSerie = $porciones[9];
                $numero = intval($porciones[5]);
                //CAMBIAMOS FORMATO DE FECHA
                $datepart = explode('/', $porciones[17]);
                $fechaEmision = $datepart[2].'/'.$datepart[1].'/'.$datepart[0];
                //DECLAAMOS FLOAT MONTO
                $monto = floatval($porciones[33]);
                $estadoCp = $porciones[37];
                $estadoRuc = $porciones[41];
                $condDomiRuc = $porciones[45];
                //CONVERT STRING TO ARRAY
                //$arptSunat = array("numRuc"=>$numRuc, "codComp"=>$codComp, "numeroSerie"=>$numSerie, "numero"=>$numero, "fechaEmision"=>$fechaEmision,"monto"=>$monto,"estadoCp"=>$estadoCp, "estadoRuc"=>$estadoRuc, "condDomiRuc"=>$condDomiRuc);
                //$jsonlol = json_decode($rptApiSunat);
                //SEND PARAMETERS
                /*
                $rptInsert = $sunat->insert($numRuc, $codComp, $numSerie, $numero, $fechaEmision, $monto, $estadoCp, $estadoRuc, $condDomiRuc);
                    //echo $rptInsert;
                if($rptInsert){
                    echo $rptApiSunat;
                    //echo $jdrptSunat;
                }
                */
                //$strnombre = $jedcsunat['nombre'];
            }
            else{
                $rptServidor = array(
                    "rpta" => "1",
                    "text" => "No responde servidor correctamente",
                );
                
                echo json_encode($rptServidor);
            }
        }
        elseif($accion == '2'){
            require_once ('./../models/sunat.php');
            $sunat = new Sunat();
            $dataSunatDoc = $dataSunat['doc'];
            //ARRAY DEL DATO RECIBIDO
            //var_dump($dataSunatDoc);
            //PREPARANDO
            //PASO DESGLOSAR LOS DATOS EN CADA SU VARIABLE

            $numRuc = (int)$dataSunatDoc['RUC'];
            $codComp = (int)$dataSunatDoc['T_COMPROBANTE'];
            $numSerie = $dataSunatDoc['SERIE'];
            $numero = (int)$dataSunatDoc['N_COMPROBANDO'];
            $fechaEmision = $dataSunatDoc['F_EMISION'];
            $monto = (float)$dataSunatDoc['I_TOTAL'];
            if($dataSunatDoc['E_SUNAT'] == 'NO CONSULTADO'){
                $dataSunatDoc['E_SUNAT'];
                $estadoCp = '-';
                $estadoRuc = '-';
                $condDomiRuc = '-';
                $obseDoc = '-';
            }else{
                $estados = explode('|', $dataSunatDoc['E_SUNAT']);  
                $estadoCp = $estados[0];
                $estadoRuc = $estados[1];
                $condDomiRuc = $estados[2];
                $obseDoc = $estados[3];
            }
            $estadoEnvio = $dataSunatDoc['E_ENVIO'];
            $fechaRegistro = $dataSunatDoc['F_REGISTRO'];
            //echo json_encode($dataSunatDoc);
            //echo 'saldras del controller para entrar al modelo';
            //Se pasara los datos a registrar
            //PASO LAS VARIBLES AL INSERT
            $rptServidor = $sunat->insert($numRuc, $codComp, $numSerie, $numero, $fechaEmision, $monto, $estadoCp, $estadoRuc, $condDomiRuc, $obseDoc, $estadoEnvio, $fechaRegistro);
            echo json_encode($rptServidor);
        }
        else{
            //REQUERIMOS ARCHIVO
            require_once ('./../models/sunat.php');
            //Se instacia la clase
            $sunat = new Sunat();
            $dataSunatDoc = $dataSunat['doc'];
            $fechainicio = $dataSunatDoc['fechainicio'];
            $fechafin    = $dataSunatDoc['fechafin'];
            //$fechainicio = date('Y-m-d', strtotime($dataSunat['fechainicio']));
            //$fechafin = date('Y-m-d', strtotime($dataSunat['fechafin']));
            $unidad      = $dataSunatDoc['unidad'];
            //$unidadSQL = $unidad == "LIMA" ? '003' : 'falso';
            $canal       = $dataSunatDoc['canal'];
            $canalSQL = $canal == "" ? 'FALSE1' : $canal;
            $TipDoc    = $dataSunatDoc['tipdoc'];
            $TipDocSQL = $TipDoc == "" ? 'FALSE2' : $TipDoc;
            $tamano    = $dataSunatDoc['tamano'];
            $offset    = $dataSunatDoc['offset'];
            $pagina = $dataSunatDoc['pagina'];
            //echo $fechainicio == $fechafin ? "soy un true" : "ups! soy false";
            if($fechainicio == $fechafin){
                $sunat->getdateSunat($fechainicio);
            }
            else{
                //$dateone = date('Y-m-d', strtotime($dataSunat['dateuno']));
                //$datetwo = date('Y-m-d', strtotime($dataSunat['datedos']));
                //$sizeTable = $dataSunat['size'];
                $rptConsulta = $sunat->getdocDB($fechainicio, $fechafin, $unidad, $canalSQL, $TipDocSQL, $tamano, $offset);
                $cantconsult = $sunat->getPagination($fechainicio, $fechafin, $canalSQL, $TipDocSQL, $tamano);
                //$rptConsulta = $sunat->getdateSunat($fechainicio, $fechafin);
                $serieSQL = $TipDocSQL . $canalSQL;
                //var_dump($serieSQL);
                if($rptConsulta){
                    //echo json_encode($cantconsult);
                    $array = [
                        "consulta" => $rptConsulta,
                        "paginacion" => $cantconsult,
                        "npagina" => $pagina,
                    ];
                    echo json_encode($array);
                }
                else{
                    echo json_encode('No hay datos');
                }   
            }
        }
    }
    catch (Exception $e) {
        //echo "Se ha producion una excepción. Los detalles son los siguientes:" 
        echo 'Error'. $e;
    }
}
else{
    echo 'No se recibio ningun dato';
}

?>