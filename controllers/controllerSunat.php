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
        $array = array();
        $rptApiSunat = $sunat->getApiSunat($jedcsunat);
        if($rptApiSunat);
        {
            //$sunat = new Sunat();
            $array = json_decode($rptApiSunat, true);
            //$porciones = explode("|", $prueba);
            //CONVERT STRING TO ARRAY
            //$alsunat[$c] = array("numRuc"=>$porciones[0], "codComp"=>$porciones[1],"numeroSerie"=>$porciones[2], "numero"=>$porciones[3], "fechaEmision"=>$porciones[4],"monto"=>$plmonto);
            $jsonlol = json_decode($rptApiSunat);
            var_dump($jsonlol);
            var_dump($array);
            //$strnombre = $jedcsunat['nombre'];
        }
        //echo $rptApiSunat;
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