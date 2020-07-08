<?php
    require_once ('./../models/products.php');
    $producto = new Producto();
    $data    = array();
    echo $producto->showTable($data);
?>