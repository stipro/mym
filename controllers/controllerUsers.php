<?php
declare (strict_types = 1);
//vERIFICACION SI SE RECIBIO DATOS
if($_POST){
    try{
        require_once ('./../models/users.php');
        //Se instacia la clase
        $producto = new Usuario();
        //Guarda datos en variables
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $correo = $_POST['correo'];
        $estado = $_POST['estado'];
        $descripcion = $_POST['descripcion'];
        //$producto->insert($codigo, $nombre, $clave, $correo, $estado, $descripcion);
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