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
                        <div class="form-group col-sm">
                            <div class="container">
                                <div class="row pb-2">
                                    <label for="id_almacen"><strong>Almacen</strong></label>
                                    <div class="col d-flex justify-content-end">
                                        <button id="btn_mdl_cAlmacen" type="button" class="btn btn-primary p-0">
                                            <img src="./../../assets/icons/icons-1.0.0-alpha5/plus.svg" alt="" width="32" height="32" title="Bootstrap">
                                        </button>
                                    </div>  
                                </div>
                            </div>                            
                            <select id="id_almacen" class="selectpicker form-control" data-live-search="true">
                                <option data-tokens="00" disabled selected>Selecciona o busque un Almacen</option>
                                <option data-tokens="01">Sistema</option>
                                <option data-tokens="02">Recepcion</option>
                                <option data-tokens="03">Transporte</option>
                            </select>
                        </div>
                        <!-- Proveedor -->
                        <div class="form-group col-sm">
                            <div class="container">
                                <div class="row pb-2">
                                    <label for="id_proveedor"><strong>Proveedor</strong></label>
                                    <div class="col d-flex justify-content-end">
                                        <button id="btn_mdl_cProveedor" type="button" class="btn btn-primary p-0">
                                            <img src="./../../assets/icons/icons-1.0.0-alpha5/plus.svg" alt="" width="32" height="32" title="Bootstrap">
                                        </button>
                                    </div>                                    
                                </div>
                            </div>                                                               
                            <select id="id_proveedor" class="selectpicker form-control" data-live-search="true">
                                <option data-tokens="" disabled selected>Selecciona un Proveedor</option>
                                <option data-tokens="Recepción">Recepción</option>
                                <option data-tokens="Sistemas">Sistemas</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Marca -->
                        <div class="form-group col-sm">
                            <div class="container">
                                <div class="row pb-2">
                                    <label for="id_marca"><strong>Marca</strong></label>
                                    <div class="col d-flex justify-content-end">
                                        <button id="btn_md_cMarca" type="button" class="btn btn-primary p-0">
                                            <img src="./../../assets/icons/icons-1.0.0-alpha5/plus.svg" alt="" width="32" height="32" title="Bootstrap">
                                        </button>
                                    </div>  
                                </div>
                            </div>                            
                            <select id="id_marca" class="selectpicker form-control" data-live-search="true">
                                <option data-tokens="" disabled selected>Selecciona o busque un Marca</option>
                                <option data-tokens="Lapicero">Lapicero</option>
                                <option data-tokens="Borrador">Borrador</option>
                                <option data-tokens="Papel">Papel</option>
                            </select>
                        </div>
                        <!-- Categoría -->
                        <div class="form-group col-sm">
                            <div class="container">
                                <div class="row pb-2">
                                    <label for="id_categoria"><strong>Categoría</strong></label>
                                    <div class="col d-flex justify-content-end">
                                        <button id="btn_md_cCategoria" type="button" class="btn btn-primary p-0">
                                            <img src="./../../assets/icons/icons-1.0.0-alpha5/plus.svg" alt="" width="32" height="32" title="Bootstrap">
                                        </button>
                                    </div>                                    
                                </div>
                            </div>                                                               
                            <select id="id_categoria" class="selectpicker form-control" data-live-search="true">
                                <option data-tokens="" disabled selected>Selecciona un Categoría</option>
                                <option data-tokens="Recepción">Recepción</option>
                                <option data-tokens="Sistemas">Sistemas</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="codigo_articulo" class="form-label">Codigo</label>
                            <input type="text" class="form-control" id="codigo_articulo" placeholder="Codigo">
                        </div>
                        <div class="form-group col-sm">
                            <label for="nombre_articulo" class="form-label">Nombre Articulo</label>
                            <input type="text" class="form-control" id="nombre_articulo" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="precio_articulo" class="form-label">Precio</label>
                            <input type="numeric" class="form-control" id="precio_articulo" placeholder="Precio">
                        </div>                    
                        <div class="form-group col-sm">
                            <label for="stock_articulo" class="form-label">Stock</label>
                            <input type="text" class="form-control" id="stock_articulo" placeholder="Stock">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="caracteristica_articulo" class="form-label">Caracteristica</label>
                        <input type="text" class="form-control" id="caracteristica_articulo" placeholder="Caracteristica">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_articulo" class="form-label">Descripción</label>
                        <input type="number" class="form-control" id="descripcion_articulo" placeholder="Descripción">
                    </div> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <!--ICONO-->
                <img src="./../../assets/icons/icons-1.0.0-alpha5/x-circle.svg" alt="" width="16" height="16" title="Cerrar">    
                Cerrar</button>
                <button id="btn-insert-collaborator" type="button" class="btn btn-primary">
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
//
$( "#btn-insert-collaborator" ).click(function() {
    //OBTENEMOS DATOS
    var id_almacen = document.getElementById('id_almacen');
    //TEXTO
    var txt_almacen = id_almacen.options[id_almacen.selectedIndex].text;
    //DATA-TOKENS
    var dt_almacen = id_almacen.options[id_almacen.selectedIndex].getAttribute('data-tokens');
    var id_proveedor = document.getElementById('id_proveedor');
    var dt_proveedor = id_proveedor.options[id_proveedor.selectedIndex].getAttribute('data-tokens');
    var id_marca = document.getElementById('id_marca');
    var dt_marca = id_marca.options[id_marca.selectedIndex].getAttribute('data-tokens');
    var id_categoria = document.getElementById('id_categoria');
    var dt_categoria = id_categoria.options[id_categoria.selectedIndex].getAttribute('data-tokens');
    //
    let codigo_articulo = $('#codigo_articulo').val();
    let nombre_articulo = $('#nombre_articulo').val();
    let precio_articulo = $('#precio_articulo').val();
    let stock_articulo = $('#stock_articulo').val();
    let caracteristica_articulo = $('#caracteristica_articulo').val();
    let descripcion_articulo = $('#descripcion_articulo').val();
    //Obtenemos la fecha
    let date = new Date()
    //
    let day = date.getDate()
    let month = date.getMonth() + 1
    let year = date.getFullYear()
    //Convertimos en Formato deseado
    if(month < 10){
        var dateformate = `${day}-0${month}-${year}`;
    }else{
        var dateformate = `${day}-${month}-${year}`;
    }
    var hora = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
    var dateRegistro = dateformate + hora;
    //AGRUPAMOS DATOS OBTENIDO
    var colaborador = {
        "dt_almacen" : dt_almacen,
        "dt_proveedor" : dt_proveedor,
        "dt_marca" : dt_marca,
        "dt_categoria" : dt_categoria,
        "codigo_articulo" : codigo_articulo,
        "nombre_articulo" : nombre_articulo,
        "precio_articulo" : precio_articulo,
        "stock_articulo" : stock_articulo,
        "caracteristica_articulo" : caracteristica_articulo,
        "descripcion_articulo" : descripcion_articulo,
        "dateRegistro" : dateRegistro,
    };
    var jqxhr = $.ajax({        
        beforeSend: function(){
            alertPrimary = '<div class="alert alert-primary" role="alert">';
            alertPrimary+= 'Se envio los datos';
            alertPrimary+= '</div>';
            $("#respuesta").append(alertPrimary);
        },
        url: './../../controllers/controllerUsers.php',
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
$(document).on('click', '#btn_mdl_cAlmacen ', function() {
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
</script>