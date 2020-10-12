<?php
// Si no se ha enviado una petición mediante AJAX se retornará a página inicio
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    require_once '../models/warehouse.php';
    $persona    = new warehouse();
    $paginacion = array();
    $paginacion = $persona->getPagination();
    echo ceil($paginacion['filasTotal'] / $paginacion['filasPagina']);
} else {
    header('Location:../');
}