<?php
header('Content-type: application/json; charset=utf-8');
//COMPROBAMOS RECEPCION
if($_POST){
    //OBTENEMOS TODO ERRORES
    try{
        //REQUERIMOS ARCHIVO
        require_once ('./../models/sunat.php');
        //Se instacia la clase
        $sunat = new Sunat();
        $jedcsunat = json_decode($_POST['data']);
        $rptApiSunat = $sunat->getApiSunat($jedcsunat);
        var_dump($rptApiSunat);
        if($rptApiSunat)
        {
            
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
            $arptSunat = array("numRuc"=>$numRuc, "codComp"=>$codComp, "numeroSerie"=>$numSerie, "numero"=>$numero, "fechaEmision"=>$fechaEmision,"monto"=>$monto,"estadoCp"=>$estadoCp, "estadoRuc"=>$estadoRuc, "condDomiRuc"=>$condDomiRuc);
            //$jsonlol = json_decode($rptApiSunat);
            //SEND PARAMETERS
            $rptInsert = $sunat->insert($numRuc, $codComp, $numSerie, $numero, $fechaEmision, $monto, $estadoCp, $estadoRuc, $condDomiRuc);
            //echo $rptInsert;
            if($rptInsert){
                echo $rptApiSunat;
                //echo $jdrptSunat;
            }
            //$strnombre = $jedcsunat['nombre'];
        }
        else{
            echo 'No responde servidor correctamente';
        }
    }
    catch (Exception $e) {
        echo "Se ha producion una excepción. Los detalles son los siguientes:";
        var_dump($e);
    }
}
else{
    echo 'No se recibio ningun dato';
}

?>