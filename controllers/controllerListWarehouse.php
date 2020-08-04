<?php
    require_once ('./../models/warehouse.php');
    $producto = new Producto();
    //$data    = array();
    echo $producto->ConsultaSimple();
?>