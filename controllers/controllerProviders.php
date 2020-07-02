<?php
//vERIFICACION SI SE RECIBIO DATOS
if($_POST){
    require_once '../models/providers.php';
    if(strlen($intruc) == 11)
    {
        $intruc  = intval($_POST['intRuc']);
        $strnombre = $_POST['varNombre'];
        $strnombre = $_POST['varRazSocial'];
        $strnombre = intval($_POST['intTelefono']);
        $strnombre = intval($_POST['intCelular']);
        $strnombre = $_POST['varCorreo'];
        $strnombre = $_POST['bolestad'];
        $strnombre = $_POST['varDescripcion'];

        $datorecibido = $_POST;
        //VALIDAMOS EL RUC
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