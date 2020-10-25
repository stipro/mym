<?php
//declare (strict_types = 1);
//vERIFICACION SI SE RECIBIO DATOS
if($_POST){
    //OBTENEMOS TODO ERRORES
    try{
        function validar_requerido(string $texto): bool
        {
            return !(trim($texto) == '');
        }
        function validar_entero(string $numero): bool
        {
            return (filter_var($numero, FILTER_VALIDATE_INT) === FALSE) ? False : True;
        }
        require_once ('./../models/articles.php');   
        //Se instacia la clase
        $articulo = new Article();
        $errores = array();
        $rpt;
        $stralmacen = isset($_POST['dt_almacen']) ? $_POST['dt_almacen'] : null;
        $strmarca = isset($_POST['dt_marca']) ? $_POST['dt_marca'] : null;
        $strnombre = isset($_POST['dt_nombre']) ? $_POST['dt_nombre'] : null;
        $fotstock = isset($_POST['dt_stock']) ? $_POST['dt_stock'] : null;
        $strprovedor = intval($_POST['dt_provedor']);
        $strcategoria = $_POST['dt_categoria'];
        $strcodigo = $_POST['dt_codigo'];
        $fotprecio = floatval($_POST['dt_precio']);
        $strcaracteristica = $_POST['dt_caracteristica'];
        $strdescripcion = $_POST['dt_descripcion'];
        $strumedida = $_POST['dt_umedida'];
        $strdateregistro = $_POST['dateRegistro'];
        //
        if (!validar_requerido($stralmacen)) {
            $errores[] = 'El campo <strong>Almacen</strong> es obligatorio.';
        }
        if (!validar_requerido($strmarca)) {
            $errores[] = 'El campo <strong>Marca</strong> es obligatorio.';
        }
        if (!validar_requerido($strnombre)) {
            $errores[] = 'El campo <strong>Nombre</strong> es obligatorio.';
        }
        if (!validar_entero($fotstock)) {
            $errores[] = 'El campo de <strong>Stock</strong> debe ser un número.';
        }
        //VALIDADOR
        if(count($errores) != 0){
            $rpt = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Datos requeridos!</h4>
            <hr>
            <ul>'; foreach ($errores as $error) { $rpt .= '<li>' . $error . '</li>'; } $rpt .='</ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        echo  $rpt;
        }
        else{
            $rptInsert = $articulo->insert(
                $strprovedor, 
                intval($strcategoria), 
                intval($strmarca), 
                $strcodigo, 
                $strnombre, 
                $fotprecio, 
                intval($fotstock), 
                $strcaracteristica, 
                $strdescripcion, 
                intval($strumedida),
                $strdateregistro);
        }
    }
    catch (Exception $e) {
        echo "Se ha producion una excepción. Los detalles son los siguientes:";
        var_dump($e);
    }
}
else{
    echo "Nose recibio DATOS";  
}
?>