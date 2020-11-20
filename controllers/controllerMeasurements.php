<?php
declare (strict_types = 1);
//vERIFICACION SI SE RECIBIO DATOS
if($_POST){
    try{
        require_once ('./../models/measurements.php');
        //Se instancia la clase
        $measurements = new Measurements();
    }
    catch (Exception $e) {
        echo "Se ha producion una excepción. Los detalles son los siguientes:";
        var_dump($e);
    }
    // Obtener el nuevo código de respuesta
    //var_dump(http_response_code());
}
else{
    echo "Nose recibio DATOS";  
}
?>