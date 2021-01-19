<?php
header('Content-type: application/json; charset=utf-8');
//COMPROBAMOS RECEPCION
if($_POST){
    //OBTENEMOS TODO ERRORES
    try{
        $object = $_POST['data'];
        $dataSunat = json_decode($object,true);
        //var_dump($dataSunat);
        $accion = $dataSunat['accion'];
        //0 = CONSULTAR RANGO FECHA BD PRINCIPAL
        //1 = CONSULTAR SUNAT
        //2 = INSERTAR DB
        if($accion == '0')
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
                    "rpta" => "0",
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
            $estados = explode('|', $dataSunatDoc['E_SUNAT']);  
            $estadoCp = $estados[0];
            $estadoRuc = $estados[1];
            $condDomiRuc = $estados[2];
            $obseDoc = $estados[3];
            $estadoEnvio = $dataSunatDoc['E_ENVIO'];
            $fechaRegistro = $dataSunatDoc['F_REGISTRO'];
            //echo json_encode($dataSunatDoc);
            //echo 'saldras del controller para entrar al modelo';
            //Se pasara los datos a registrar
            //PASO LAS VARIBLES AL INSERT
            echo $sunat->insert($numRuc, $codComp, $numSerie, $numero, $fechaEmision, $monto, $estadoCp, $estadoRuc, $condDomiRuc, $obseDoc, $estadoEnvio, $fechaRegistro);
        }
        else{
            //REQUERIMOS ARCHIVO
            require_once ('./../models/sunat.php');
            //Se instacia la clase
            $sunat = new Sunat();
            //echo $variable ? "soy un true" : "ups! soy false";
            if($dataSunat['dateuno'] == $dataSunat['datedos']){
                $dateone = $dataSunat['dateuno'];
                $sunat->getdateSunat($dateone);
            }
            else{
                $dateone = date('Y-m-d', strtotime($dataSunat['dateuno']));
                $datetwo = date('Y-m-d', strtotime($dataSunat['datedos']));
                $sizeTable = $dataSunat['size'];
                $rptConsulta = $sunat->getdateSunat($dateone, $datetwo, $sizeTable);
                if($rptConsulta){
                    echo json_encode($rptConsulta);
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