<?php
$modules = array(
    "0" => array(
        "id_modulo" => "1",
        "nombre_modulo" => "admin",
        "estado_modulo" => "1",
        "url_modulo" => "views/admin")
    "1" => array(
        "id_modulo" => "2",
        "nombre_modulo" => "comsion",
        "estado_modulo" => "1",
        "url_modulo" => "views/comision")
    "2" => array(
        "id_modulo" => "3",
        "nombre_modulo" => "inventario",
        "estado_modulo" => "1",
        "url_modulo" => "views/inventario",
        "submenus" => array(
            "1" => "Inicio",
            "2" => "Existencia",
            "3" => "Articulo",
            "4" => "Salida",
            "5" => "Entrada",
            "6" => "Asignacion",
        ))
    "3" => array(
        "id_modulo" => "4",
        "nombre_modulo" => "sunat",
        "estado_modulo" => "1",
        "url_modulo" => "views/sunat",
        "submenu" => array(
            "1" => "Inicio",
            "2" => "Validaciones",
            "3" => "Envio Automatico",
            "4" => "Envio Manual",
        ))
    "4" => array(
        "id_modulo" => "5",
        "nombre_modulo" => "transporte",
        "estado_modulo" => "1",
        "url_modulo" => "views/transporte")
    );
var_dump($modules);
?>