<?php
declare (strict_types = 1);
//vERIFICACION SI SE RECIBIO DATOS
if($_POST){
    var_dump($_POST);
    function validar_requerido(string $texto): bool
    {
        return !(trim($texto) == '');
    }
    function validar_entero(string $numero): bool
    {
        return (filter_var($numero, FILTER_VALIDATE_INT) === FALSE) ? False : True;
    }
    $errores = [];
    $stralmacen = isset($_POST['dt_almacen']) ? $_POST['dt_almacen'] : null;
    $strmarca = isset($_POST['dt_marca']) ? $_POST['dt_marca'] : null;
    $strnombre = isset($_POST['dt_nombre']) ? $_POST['dt_nombre'] : null;
    $strstock = isset($_POST['dt_stock']) ? $_POST['dt_stock'] : null;
    $strprovedor = $_POST['dt_proveedor'];
    $strcategoria = $_POST['dt_categoria'];
    $strcodigo = $_POST['dt_codigo'];
    $fotprecio = $_POST['precio'];
    $strcaracteristica = $_POST['dt_caracteristica'];
    $strumedida = $_POST['dt_umedida'];
    $strdescripcion = $_POST['descripcion'];
    $strdateRegistro = $_POST['dateRegistro'];
    //
    if (!validar_requerido($stralmacen)) {
        $errores[] = 'El campo Almacen es obligatorio.';
    }
    if (!validar_requerido($strmarca)) {
        $errores[] = 'El campo Marca es obligatorio.';
    }

    if (!validar_requerido($strnombre)) {
        $errores[] = 'El campo Nombre es obligatorio.';
    }
    if (!validar_entero($strstock)) {
        $errores[] = 'El campo de Stock debe ser un número.';
    }
    //VALIDADOR

    var_dump($errores);
    if(count($errores) != 0){
        echo 'Esta vacio';
    }
    else{
        echo 'No esta vacio';
        
        require_once ('./../models/article.php');   
        //Se instacia la clase
        $producto = new Producto();
        $producto->insert(
            $stralmacen,
            $strprovedor,
            $strmarca,
            $strcategoria,
            $strcodigo, 
            $strnombre,
            $fotprecio,
            $fotstock,
            $strcaracteristica,
            $strumedida,
            $strdescripcion,
            $strdateRegistro
        );
    }
    echo 'Se recibio datos';
}
else{
    echo "Nose recibio DATOS";  
}
?>