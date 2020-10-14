<?php
// declare (strict_types = 1);
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if ($_POST) {
    //var_dump($_POST);
    //$dataSoli = $_POST['data']; 
    //echo 'Se recibio '.$dataSoli;
    require_once './../models/categories.php';
    $category = new Category();
    $data    = array();
    // Paginación
    $paginacion  = array();
    // Para versiones de PHP inferiores a la 7
    // $pagina      = isset($_POST['pagina']) ? $_POST['pagina'] : 1;
    $pagina      = $_POST['pagina'] ?? 1;
    // Para versiones de PHP inferiores a la 7
    // $termino     = isset($_POST['termino']) ? $_POST['termino'] : '';
    $termino     = $_POST['termino'] ?? '';
    $paginacion  = $category->getPagination();
    $filasTotal  = $paginacion['filasTotal'];
    $filasPagina = $paginacion['filasPagina'];

    $empezarDesde = ($pagina - 1) * $filasPagina;

    if ($termino != '') {
        $data = $category->getSearch($termino);
    } else {
        $data = $category->getNombre('categorias');
        //$data = $category->getAll($empezarDesde, $filasPagina);
    }
    $result = $category->showSelect($data);
    //echo($result);
    echo json_encode($result);

} else {
    echo 'no se recibio datos !!  vete de esta pagina rctm';
    // Retornar a inicio
    //header('Location:../');
}