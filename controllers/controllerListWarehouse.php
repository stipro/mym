<?php
    require_once ('./../models/warehouse.php');
    $warehouse = new Warehouse();
    $data    = array();
    $pagina      = $_POST['pagina'] ?? 1;
    //el resultado de una busqueda
    $termino     = $_POST['termino'] ?? '';
    if ($termino != '') {
        $data = $warehouse->getSearch($termino);
    } else {
        $data = $warehouse->getAll();
    }
    echo $warehouse->showTable($data);
?>