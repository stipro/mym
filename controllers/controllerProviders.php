<?php
//vERIFICACION SI SE RECIBIO DATOS
if($_POST){
    require_once '../models/providers.php';
    /*
    
    $id      = intval($_POST['id']);
    $codigo = $_POST['codigo'];*/

    $datorecibido = $_POST;
    $intruc  = $_POST['intRuc'];
    //VALIDAMOS EL RUC
    if(strlen($intruc) == 11)
    {
        echo "ruc valido";
    }
    else{
        echo "ruc invalido";
    }
    var_dump($datorecibido);
}
else{
    echo "Nose recibio DATOS";
}
?>