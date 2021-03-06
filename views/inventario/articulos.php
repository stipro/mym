<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link rel="stylesheet" href="./../../libs/bootstrap-select/css/bootstrap-select.min.css">
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link rel="stylesheet" href="./../../libs/bootstrap-4.5.0/css/bootstrap.min.css">
    <!--Stylesheet [ REQUIRED ]-->
    <link href="./../../assets/css/base.css" rel="stylesheet">
    <title>Articulos - Inventario</title>
</head>
<body>
<?php
    //Llamo Nav
    include ('../nav.php');
?>
<div class="container-fluid">
    <div class="shadow-sm p-3 mb-2 bg-white rounded">
        <h2>Bienvenido al modulo Articulos - Inventario</h2>
    </div>
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-fill bd-highlight">
                    <h4>Articulos</h4> 
                </div>
                <div class="p-2 flex-fill bd-highlight d-flex justify-content-end">
                    <button type="button" id="btn_mdl_article" class="btn btn-primary">
                        Nuevo
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!--<h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
            <div class="form-row">
                <div class="col">
                    <!-- Almacen -->
                    <div id="conprim" class="form-group">                                        
                        <label for="filAlm"><strong>Almacen</strong></label>
                        <select id="filAlm" class="selectpicker form-control" data-live-search="true">
                        </select>
                    </div>
                </div>
                <div class="col">
                    <!-- Producto -->
                    <div class="form-group">                                        
                        <label for="filCodNom"><strong>Proveedor</strong></label>
                        <select id="filCodNom" data-required='nombre' class="selectpicker form-control" data-live-search="true">
                            <option data-tokens="">Selecciona o busque un Producto</option>
                            <option data-tokens="Lapicero">Lapicero</option>
                            <option data-tokens="Borrador">Borrador</option>
                            <option data-tokens="Papel">Papel</option>
                        </select>
                    </div>
                </div>
            </div>
            <form>
                <div class="row">
                    <div class="col-sm">
                        <!---->
                        <div class="form-group">                                        
                            <label for="filcat"><strong>Categoria</strong></label>
                            <select id="filcat" class="selectpicker form-control" data-live-search="true">
                                <option data-tokens="">Selecciona una categoría</option>
                                <option data-tokens="Accesorios">Accesorios</option>
                                <option data-tokens="Equipos">Equipos</option>
                                <option data-tokens="Repuestos">Repuestos</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <!---->
                        <div class="form-group">                                        
                            <label for="filrango"><strong>Rango de Fecha</strong></label>
                            <input id="filrango" class="form-control"  type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
                        </div>
                    </div>
                </div>
            </form>
            <hr>
        </div>
    </div>
    <div class="table-responsive" id="idtableArticle">
    </div>
</div>
<script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<?php
    include ("./article_create.php");
?>
<div id="modal-requested">

</div>
<script>
//valDAlmacen = idalmacen.dataset.require;
//Ejecutamos cuando pagina este lista
$( document ).ready(function() {
    console.log( "document loaded" );
    //GET DATA TABLE
    dtableArticle('');
    //GET DATA ALMACEN
    dataWarehouse('');
    //GET DATA PROVIDER
    dataProvider('');
    //GET DATA CATEGORY
    dataCategory('');
    //GET DATA BRAND
    databrand('');

});
////DOM elements
var itableArticle = document.getElementById("idtableArticle");
//Activamos modal
$(document).on('click', '#btn_mdl_article', function() {
    $('#md_cArticulo').modal('show');
    //GET DATA TABLE
    dtableArticle('');
    //GET DATA ALMACEN
    dataWarehouse('');
    //GET DATA PROVIDER
    dataProvider('');
    //GET DATA CATEGORY
    dataCategory('');
    //GET DATA BRAND
    databrand('');
    
});

//Obtenemos datos de la tabla
const dtableArticle = async (data) => {
    const body = new FormData();
    body.append("data", data);
    const returnArticulo = await fetch("./../../controllers/controllerArticleList.php", { method: "POST", body});
    const resultArticulo = await returnArticulo.json(); //await JSON.parse(returned);
    dataReceivedArticle(resultArticulo);
};
const dataWarehouse = async (data) => {
    const body = new FormData();
    body.append("data", data);
    const returnWarehouse = await fetch("./../../controllers/controllerWarehouseList.php", { method: "POST", body});
    const resultWarehouse = await returnWarehouse.json(); //await JSON.parse(returned);
    handleReturnedDataWarehouse(resultWarehouse);
};
const dataProvider = async (data) => {
    const body = new FormData();
    body.append("data", data);
    const returnProvider = await fetch("./../../controllers/controllerProvidersList.php", { method: "POST", body});
    const resultProvider = await returnProvider.json(); //await JSON.parse(returned);
    handleReturnedDataProvider(resultProvider);
};
const dataCategory = async (data) => {
    const body = new FormData();
    body.append("data", data);
    const returnCategory= await fetch("./../../controllers/controllerCategoriesList.php", { method: "POST", body});
    const resultCategory= await returnCategory.json(); //await JSON.parse(returned);
    handleReturnedDataCategory(resultCategory);
};
const databrand = async (data) => {
    const body = new FormData();
    body.append("data", data);
    const returnMarca = await fetch("./../../controllers/controllerBrandsList.php", { method: "POST", body});
    const resultMarca = await returnMarca.json(); //await JSON.parse(returned);
    handleReturnedDataBrand(resultMarca);
};
//Si necesitas hacer algo con las respuestas del servidor
//hacelas aqui.
const dataReceivedArticle = (data) => {
    itableArticle.innerHTML = data;
    //$( "#idtableArticle" ).append( data );
}
const handleReturnedDataWarehouse = (data) => {
    $("#filAlm").html(data).selectpicker('refresh');
    $("#cArticle_idselectWarehouse").html(data).selectpicker('refresh');
};
const handleReturnedDataProvider = (data) => {
    $("#filCodNom").html(data).selectpicker('render').selectpicker('refresh');
    $("#cArticle_idselectProvider").html(data).selectpicker('render').selectpicker('refresh');
};
const handleReturnedDataCategory = (data) => {
    $("#filcat").html(data).selectpicker('refresh');
    $("#cArticle_idselectCategory").html(data).selectpicker('refresh');  
};
const handleReturnedDataBrand = (data) => {
    $("#cArticle_idselectBrand").html(data).selectpicker('refresh');
    //$("#filcat").html(data).selectpicker('refresh');
}
const dataUMedida = (data) => {
    //$("#filcat").html(data).selectpicker('refresh');
};
//Si necesitas hacer algo antes de enviar las
//consultas, hacelo aqui.
const beforeSending = () => {
  //console.log("before");
};
//Si necesitas hacer algo despues de que terminen las
//consultas, hacelas aqui.
const afterSending = () => {
  //console.log("after");
};
</script>
<script src="./../../assets/js/jquery-ui.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-select/js/popper.min.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-4.5.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="./../../libs/bootstrap-select/js/i18n/defaults-es_ES.min.js" type="text/javascript"></script>
</body>
</html>