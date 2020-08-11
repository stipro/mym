<?php
declare (strict_types = 1);
//vERIFICACION SI SE RECIBIO DATOS
if($_POST){
    try{
        require_once ('./../models/warehouse.php');
        //Se instacia la clase
        $warehouse = new Warehouse();
        //Guarda datos en variables
        $strName = $_POST['name'];
        $strDescription = $_POST['description'];
        $blaState = intval($_POST['state']);
        $warehouse->insert($strName, $strDescription, $blaState);
        echo 'Se recibio datos';
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