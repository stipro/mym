<?php
//vERIFICACION SI SE RECIBIO DATOS
if($_POST){
    require_once '../models/providers.php';
    $opcion  = $_POST['opcion'];
    $id      = intval($_POST['id']);
    $codigo = $_POST['codigo'];
    $datorecibido = $_POST;
    var_dump($datorecibido);
}
else{
    echo "Nose recibio DATOS";
}
?>