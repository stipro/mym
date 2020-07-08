<?php
declare (strict_types = 1);
//vERIFICACION SI SE RECIBIO DATOS
if($_POST){
    require_once ('./../models/products.php');

        $producto = new Producto();
        $strcodigo = $_POST['codigo'];
        $strnombre = $_POST['nombre'];
        $fotprecio = $_POST['precio'];
        $fotstock = $_POST['stock'];
        $strDescripcion = $_POST['descripcion'];
        $producto->insert($strcodigo, 
                            $strnombre,
                            $fotprecio,
                            $fotstock,
                            $strDescripcion);
        echo 'Se recibio datos';
    
}
else{
    echo "Nose recibio DATOS";
}
?>