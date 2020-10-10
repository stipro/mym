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
        if($rptApiSunat);
        {
            //$sunat = new Sunat();
            $jdrptSunat = json_decode($rptApiSunat, true);
            $porciones = explode('"', $jdrptSunat);
            //CONVERT STRING TO ARRAY
            $arptSunat = array("numRuc"=>$porciones[21], "codComp"=>$porciones[13],"numeroSerie"=>$porciones[9], "numero"=>$porciones[5], "fechaEmision"=>$porciones[17],"monto"=>$porciones[33],"estadoCp"=>$porciones[37], "estadoRuc"=>$porciones[41], "condDomiRuc"=>$porciones[45]);
            //$jsonlol = json_decode($rptApiSunat);
            var_dump($arptSunat);
            //$sunat->insert($arptSunat);
            
            //var_dump($rptApiSunat);
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