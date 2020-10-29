<!-- Modal -->
<div id="md_cArticulo" class="modal fade" style="overflow-y: scroll;" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-xl">
        <div id="md-collaborator" class="modal-content">
            <div id="md-header_ccollaborator"class="modal-header">
                <h5 class="modal-title" id="mdl_lblArticle">
                    <!--ICONO-->
                    <img src="./../../assets/icons/icons-1.0.0-alpha5/pencil-square.svg" alt="" width="32" height="32" title="title">
                    Creación nuevo Articulo
                </h5>
            </div>
            <div class="modal-body">
                <div id="respuesta">
                </div>
                <div class="container-fluid">
                    <div class="form-row">
                        <!-- Almacen -->
                        <div class="form-group col-sm" id="contAlmacen">
                            <div class="container">
                                <div class="row pb-2">
                                    <label for="cArticle_idselectWarehouse"><strong>Almacen *</strong></label>
                                    <div class="col d-flex justify-content-end">
                                        <button id="btn_mdl_cAlmacen" type="button" class="btn btn-primary p-0">
                                            <img src="./../../assets/icons/icons-1.0.0-alpha5/plus.svg" alt="" width="32" height="32" title="Bootstrap">
                                        </button>
                                    </div>  
                                </div>
                            </div>
                            <select id="cArticle_idselectWarehouse" data-require="nombre" class="selectpicker form-control" data-live-search="true">
                            </select>
                        </div>
                        <!-- Proveedor -->
                        <div class="form-group col-sm">
                            <div class="container">
                                <div class="row pb-2">
                                    <label for="cArticle_idselectProvider"><strong>Proveedor *</strong></label>
                                    <div class="col d-flex justify-content-end">
                                        <button id="btn_mdl_cProveedor" type="button" class="btn btn-primary p-0">
                                            <img src="./../../assets/icons/icons-1.0.0-alpha5/plus.svg" alt="" width="32" height="32" title="Bootstrap">
                                        </button>
                                    </div>                                    
                                </div>
                            </div>                                                               
                            <select id="cArticle_idselectProvider" data-require="nombre" class="selectpicker form-control" data-live-search="true">
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Marca -->
                        <div class="form-group col-sm">
                            <div class="container">
                                <div class="row pb-2">
                                    <label for="cArticle_idselectBrand"><strong>Marca *</strong></label>
                                    <div class="col d-flex justify-content-end">
                                        <button id="btn_md_cMarca" type="button" class="btn btn-primary p-0">
                                            <img src="./../../assets/icons/icons-1.0.0-alpha5/plus.svg" alt="" width="32" height="32" title="Bootstrap">
                                        </button>
                                    </div>  
                                </div>
                            </div>                            
                            <select id="cArticle_idselectBrand" data-require="nombre" class="selectpicker form-control" data-live-search="true">
                            </select>
                        </div>
                        <!-- Categoría -->
                        <div class="form-group col-sm">
                            <div class="container">
                                <div class="row pb-2">
                                    <label for="cArticle_idselectCategory"><strong>Categoría *</strong></label>
                                    <div class="col d-flex justify-content-end">
                                        <button id="btn_md_cCategoria" type="button" class="btn btn-primary p-0">
                                            <img src="./../../assets/icons/icons-1.0.0-alpha5/plus.svg" alt="" width="32" height="32" title="Bootstrap">
                                        </button>
                                    </div>                                    
                                </div>
                            </div>                                                               
                            <select id="cArticle_idselectCategory" class="selectpicker form-control" data-live-search="true">
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="cArticle_idinputCode" class="form-label">Codigo</label>
                            <input type="text" class="form-control" id="cArticle_idinputCode" placeholder="Codigo">
                        </div>
                        <div class="form-group col-sm">
                            <label for="cArticle_idinputName" class="form-label">Nombre Articulo *</label>
                            <input type="text" class="form-control" id="cArticle_idinputName" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="cArticle_idinputStock" class="form-label">Stock *</label>
                            <input type="text" class="form-control" id="cArticle_idinputStock" placeholder="Stock">
                        </div>
                        <div class="form-group col-sm">
                            <label for="cArticle_idinputPrice" class="form-label">Precio</label>
                            <input type="numeric" class="form-control" id="cArticle_idinputPrice" placeholder="Precio">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="cArticle_idinputCharacteristic" class="form-label">Caracteristica *</label>
                            <input type="numeric" class="form-control" id="cArticle_idinputCharacteristic" placeholder="Caracteristica">
                        </div>
                        <div class="form-group col-sm">
                            <div class="container">
                                <div class="row pb-2">
                                    <label for="cArticle_idSelectUMeasurement"><strong>U. Medida *</strong></label>
                                    <div class="col d-flex justify-content-end">
                                        <button id="btn_md_uMedida" type="button" class="btn btn-primary p-0">
                                            <img src="./../../assets/icons/icons-1.0.0-alpha5/plus.svg" alt="" width="32" height="32" title="Bootstrap">
                                        </button>
                                    </div>                                    
                                </div>
                            </div>                                                               
                            <select id="cArticle_idSelectUMeasurement" class="selectpicker form-control" data-live-search="true">
                                <option data-id="" disabled selected>Selecciona u. Medida</option>
                                <option data-id="1">Recepción</option>
                                <option data-id="2">Sistemas</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cArticle_idinputDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="cArticle_idinputDescription" name="comentarios" rows="3" cols="40"></textarea>
                        <!--<input type="number" class="form-control" id="descripcion_articulo" placeholder="Descripción">-->
                    </div> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <!--ICONO-->
                <img src="./../../assets/icons/icons-1.0.0-alpha5/x-circle.svg" alt="" width="16" height="16" title="Cerrar">    
                Cerrar</button>
                <button id="articlebtnInsert" type="button" class="btn btn-primary">
                <!--ICONO-->
                <img src="./../../assets/icons/icons-1.0.0-alpha5/pencil.svg" alt="" width="16" height="16" title="Guardar">
                Guardar</button>
                <button id="btn-limpiar" type="button" class="btn btn-primary">
                Limpiar
                </button>
            </div>
        </div>
    </div>
</div>
<script>
$( document ).ready(function() {
    console.log( "document loaded" );
    //makeRequests('');
}); 
$( window ).on( "load", function() {
    console.log( "window loaded" );
});

/*
articlebtnInsert.addEventListener("click", function(evento){
    //OBTENEMOS DATA ID
    var dtidAlmacen = ciselectAlmacen.options[ciselectAlmacen.selectedIndex].getAttribute('data-id');
    var dtidProvedor = ciselectProvedor.options[ciselectProvedor.selectedIndex].getAttribute('data-id');
    var dtidMarca = ciselectMarca.options[ciselectMarca.selectedIndex].getAttribute('data-id');
    var dtidCategoria = ciselecCategoria.options[ciselecCategoria.selectedIndex].getAttribute('data-id');
    var dtidUMedida = ciselecUMedida.options[ciselecUMedida.selectedIndex].getAttribute('data-id');
    //TEXTO
    var dttxtalmacen = ciselectAlmacen.options[ciselectAlmacen.selectedIndex].text;
    console.log(dtidAlmacen);
    actionnArticulo('');
});*/
/*
const actionnArticulo = async (data) => {
    const body = new FormData();
    body.append("data", data);
    const returnMarca = await fetch("./../../controllers/controllerBrandsList.php", { method: "POST", body});
    const resultMarca = await returnMarca.json(); //await JSON.parse(returned);
    dataReceivedBrand(resultMarca);
};
*/
$( "#articlebtnInsert" ).click(function() {
    //OBTENEMOS DATOS
    //DOM eventos
    var id_almacen = document.getElementById('cArticle_idselectWarehouse');
    var id_provedor = document.getElementById('cArticle_idselectProvider');
    var id_marca = document.getElementById('cArticle_idselectBrand');
    var id_categoria = document.getElementById('cArticle_idselectCategory');
    var id_codigo = document.getElementById('cArticle_idinputCode');
    var id_nombre = document.getElementById('cArticle_idinputName');
    var id_precio = document.getElementById('cArticle_idinputPrice');
    var id_stock = document.getElementById('cArticle_idinputStock');
    var id_caracteristica = document.getElementById('cArticle_idinputCharacteristic');
    var id_umedida = document.getElementById('cArticle_idSelectUMeasurement');
    var id_descripcion = document.getElementById('cArticle_idinputDescription');
    //DATA-TOKENS
    var dt_almacen = id_almacen.options[id_almacen.selectedIndex].getAttribute('data-id');
    var dt_provedor = id_provedor.options[id_provedor.selectedIndex].getAttribute('data-id');
    var dt_marca = id_marca.options[id_marca.selectedIndex].getAttribute('data-id');
    var dt_categoria = id_categoria.options[id_categoria.selectedIndex].getAttribute('data-id');
    var dt_umedida = id_umedida.options[id_umedida.selectedIndex].getAttribute('data-id');
    //DATA VALUE
    var dt_codigo = id_codigo.value;
    var dt_nombre = id_nombre.value;
    var dt_precio = id_precio.value;
    var dt_stock = id_stock.value;
    var dt_caracteristica = id_caracteristica.value;
    var dt_descripcion = id_descripcion.value;
    /*
    //VALIDACION
    //TEXTO
    if( dt_codigo == null || dt_codigo.length == 0 || /^\s+$/.test(dt_codigo) ) {
        console.log('Codigo Vacio');
    }
    else{
        console.log(dt_codigo);
    }
    //NUMERO
    if( isNaN(dt_precio) ) {
        console.log('No es un numero');
    }
    else{
        console.log(dt_precio);
    }
    //SELECCION
    if( dt_almacen == null || dt_almacen == 0 ) {
        console.log('No se selecciono ninguno');
    }
    else {
        console.log(dt_almacen);
    }
    */
    //Obtenemos la fecha
    let date = new Date()
    //
    let day = date.getDate()
    let month = date.getMonth() + 1
    let year = date.getFullYear()
    //Convertimos en Formato deseado
    if(month < 10){
        var dateformate = `${year}-0${month}-${day}`;
    }else{
        var dateformate = `${year}-${month}-${day}`;
    }
    dateRegistro = dateformate;
    //var hora = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
    //var dateRegistro = dateformate + ' ' + hora;
    console.log(dateRegistro);
    console.log(Date());
    console.log('Proveedor' + dt_provedor);
    //AGRUPAMOS DATOS OBTENIDO
    var colaborador = {
        "dt_almacen" : dt_almacen,
        "dt_provedor" : dt_provedor,
        "dt_marca" : dt_marca,
        "dt_categoria" : dt_categoria,
        "dt_codigo" : dt_codigo,
        "dt_nombre" : dt_nombre,
        "dt_precio" : dt_precio,
        "dt_stock" : dt_stock,
        "dt_caracteristica" : dt_caracteristica,
        "dt_umedida" : dt_umedida,
        "dt_descripcion" : dt_descripcion,
        "dateRegistro" : dateRegistro,
    };
    console.log(colaborador);
    var jqxhr = $.ajax({        
        beforeSend: function(){
            alertPrimary = '<div class="alert alert-primary" role="alert">';
            alertPrimary+= 'Se envio los datos';
            alertPrimary+= '</div>';
            $("#respuesta").append(alertPrimary);
        },
        url: './../../controllers/controllerArticle.php',
        type: 'POST',
        data: colaborador,
    })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
        $("#respuesta").empty().append(data);
    })
    //SI OCURRE UN ERROR
    .fail(function() {
        alertDanger = '<div class="alert alert-danger" role="alert">';
        alertDanger+= 'Ocurrio un problema, llamar a soporte tecnico';
        alertDanger+= '</div>';
        $("#respuesta").append(alertDanger);
        console.log( "error" );
    })
    //EJECUTA AL TERMINAR LA FUNCION YA SEHA ERROR O EXITO
    .always(function() {
        console.log( "completado" );
    });
    // Hacer otra cosa aquí ...
    // Asignar otra función de completado para la petición de más arriba
    jqxhr.always(function() {
    console.log( "completado segundo" );
    });
});
//CREAR NUEVO
$(document).on('click', '#btn_mdl_cAlmacen ', function() {
    //makeRequests(valDAlmacen);
    //console.log(valDAlmacen)
    //modal-requested
    var jqxhr = $.ajax({
        /*
        beforeSend: function(){
        alertPrimary = '<div class="alert alert-primary" role="alert">';
        alertPrimary+= 'A simple primary alert—check it out!';
        alertPrimary+= '</div>';
                $("#respuesta").empty().append(alertPrimary);
        },*/
        url: './warehouse_create.php',
        type: 'POST',
    })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
        $("#modal-requested").empty();
        $("#modal-requested").append(data);
        $('#md_cAlmacen').modal('show');
    })
    //SI OCURRE UN ERROR
    .fail(function() {
        console.log( "error" );
    })
    //EJECUTA AL TERMINAR LA FUNCION YA SEHA ERROR O EXITO
    .always(function() {
        console.log( "completado" );
    });
    // Hacer otra cosa aquí ...
    // Asignar otra función de completado para la petición de más arriba
    jqxhr.always(function() {
        console.log( "completado segundo" );
    });
});
$(document).on('click', '#btn_mdl_cProveedor', function() {
    //modal-requested
    var jqxhr = $.ajax({
        /*
        beforeSend: function(){
        alertPrimary = '<div class="alert alert-primary" role="alert">';
        alertPrimary+= 'A simple primary alert—check it out!';
        alertPrimary+= '</div>';
                $("#respuesta").empty().append(alertPrimary);
        },*/
        url: './providers_create.php',
        type: 'POST',
    })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
        $("#modal-requested").empty();
        $("#modal-requested").append(data);
        $('#md_cProveedor').modal('show');
    })
    //SI OCURRE UN ERROR
    .fail(function() {
        console.log( "error" );
    })
    //EJECUTA AL TERMINAR LA FUNCION YA SEHA ERROR O EXITO
    .always(function() {
        console.log( "completado" );
    });
    // Hacer otra cosa aquí ...
    // Asignar otra función de completado para la petición de más arriba
    jqxhr.always(function() {
        console.log( "completado segundo" );
    });
});
$(document).on('click', '#btn_md_cMarca', function() {
    //modal-requested
    var jqxhr = $.ajax({
        /*
        beforeSend: function(){
        alertPrimary = '<div class="alert alert-primary" role="alert">';
        alertPrimary+= 'A simple primary alert—check it out!';
        alertPrimary+= '</div>';
                $("#respuesta").empty().append(alertPrimary);
        },*/
        url: './brand_create.php',
        type: 'POST',
    })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
        $("#modal-requested").empty();
        $("#modal-requested").append(data);
        $('#md_cBrand').modal('show');
    })
    //SI OCURRE UN ERROR
    .fail(function() {
        console.log( "error" );
    })
    //EJECUTA AL TERMINAR LA FUNCION YA SEHA ERROR O EXITO
    .always(function() {
        console.log( "completado" );
    });
    // Hacer otra cosa aquí ...
    // Asignar otra función de completado para la petición de más arriba
    jqxhr.always(function() {
        console.log( "completado segundo" );
    });
});
$(document).on('click', '#btn_md_cCategoria', function() {
    //modal-requested
    var jqxhr = $.ajax({
        /*
        beforeSend: function(){
        alertPrimary = '<div class="alert alert-primary" role="alert">';
        alertPrimary+= 'A simple primary alert—check it out!';
        alertPrimary+= '</div>';
                $("#respuesta").empty().append(alertPrimary);
        },*/
        url: './category_create.php',
        type: 'POST',
    })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
        $("#modal-requested").append(data);
        $('#md_cCategory').modal('show');
    })
    //SI OCURRE UN ERROR
    .fail(function() {
        console.log( "error" );
    })
    //EJECUTA AL TERMINAR LA FUNCION YA SEHA ERROR O EXITO
    .always(function() {
        console.log( "completado" );
    });
    // Hacer otra cosa aquí ...
    // Asignar otra función de completado para la petición de más arriba
    jqxhr.always(function() {
        console.log( "completado segundo" );
    });
});
//MODULO UNIDAD DE MEDIDA
$(document).on('click', '#btn_md_uMedida', function() {
    //modal-requested
    var jqxhr = $.ajax({
        /*
        beforeSend: function(){
        alertPrimary = '<div class="alert alert-primary" role="alert">';
        alertPrimary+= 'A simple primary alert—check it out!';
        alertPrimary+= '</div>';
                $("#respuesta").empty().append(alertPrimary);
        },*/
        url: './measurements_create.php',
        type: 'POST',
    })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
        $("#modal-requested").append(data);
        $('#md_uMedida').modal('show');
    })
    //SI OCURRE UN ERROR
    .fail(function() {
        console.log( "error" );
    })
    //EJECUTA AL TERMINAR LA FUNCION YA SEHA ERROR O EXITO
    .always(function() {
        console.log( "completado" );
    });
    // Hacer otra cosa aquí ...
    // Asignar otra función de completado para la petición de más arriba
    jqxhr.always(function() {
        console.log( "completado segundo" );
    });
});
</script>