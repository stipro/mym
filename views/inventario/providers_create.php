<!-- Modal -->
<div class="modal fade" id="md_cProveedor" tabindex="-1" role="dialog" aria-labelledby="mdl_lblProviders" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="mdl_lblProviders">
            <img src="./../../assets/icons/icons-1.0.0-alpha5/pencil-square.svg" alt="" width="32" height="32" title="title">
            Creación nuevo proveedor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div id="residmdlProvider"><!--respuesta-->
                <div id="actions" class="container">
                    <div class="row">
                        <div id="gif" class="col-3">
                        </div>
                        <div id="typing" class="col">
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-3 text-center">
                <div class="kv-avatar">
                    <div class="file-loading">
                        <input id="avatar-1" name="avatar-1" type="file" required>
                    </div>
                </div>
                <div class="kv-avatar-hint">
                    <small>Tamaño Maximo 1500 KB</small>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="proveedor_ruc" class="form-label">Ruc</label>
                            <input type="number" class="form-control " id="proveedor_ruc" oninput="validarInput(this)" placeholder="Ruc">
                            <div id="validador">

                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="proveedor_nombre" class="form-label">Nombre *</label>
                            <input type="text" class="form-control" id="proveedor_nombre" placeholder="Nombre">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="razonsoc_proveedor" class="form-label">Razon Social</label>
                            <input type="text" class="form-control" id="razonsoc_proveedor" placeholder="Razon Social">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="direccion_proveedor" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion_proveedor" placeholder="Dirección">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="telefono_proveedor" class="form-label">Telefono</label>
                            <input type="number" class="form-control" id="telefono_proveedor" placeholder="Telefono">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="celular_proveedor" class="form-label">Celular</label>
                            <input type="number" class="form-control" id="celular_proveedor" placeholder="Celular">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="correo_proveedor" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo_proveedor" placeholder="Correo">
                        </div>
                    </div>
    
<!--CORREO
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="celular_proveedor" class="form-label">Correo</label>
                                    <div class="form-row">
                                        <div class="col-sm">
                                            <input type="email" class="form-control" id="correo_proveedor" placeholder="Correo">
                                        </div>
                                        <div class="col-sm">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@</div>
                                                </div>
                                                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
-->
    
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="estado_proveedor" checked>
            <label class="form-check-label" for="estado_proveedor">Estado</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="descripcion_proveedor" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion_proveedor" rows="3"></textarea>
        </div>
      </div>
      
      <div class="modal-footer">
        <button id="btn-modal-cancel-provider" type="button" class="btn btn-secondary" data-dismiss="modal">
        <!--ICONO-->
        <img src="./../../assets/icons/icons-1.0.0-alpha5/x-circle.svg" alt="" width="16" height="16" title="Cerrar">
        Cerrar</button>
        <button id="btn-modal-create-provider" type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmacion_modal">
        <img src="./../../assets/icons/icons-1.0.0-alpha5/pencil.svg" alt="" width="16" height="16" title="Guardar">
        Guardar</button>
        <button id="btn-limpiar" type="button" class="btn btn-primary">
        Limpiar
        </button>
        <a class="btn btn-large btn-primary" data-toggle="confirmation" data-title="Open Google?"
        href="https://google.com" target="_blank">Confirmation</a>
      </div>
    </div>
  </div>
</div>
    <!--<script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>-->
    <script src="./../../assets/js/validador_ruc.js" type="text/javascript"></script>

<!-- the fileinput plugin initialization -->
<script>
//CONSULTA DATO
$(document).on('click', '#btn-modal-cancel-provider ', function() {
    //GET DATA PROVIDER
    dataProvider('');
});
//ESCUCHAMOS CHECKBOX
$("#estado_proveedor").change(function(){
  alert("Se esta cambiando estado de proveedor");
});
$( "#btn-limpiar" ).click(function() {
    alert("Se eliminara elemento hijo");
    alertPrimary = '<div class="alert alert-primary" role="alert">';
    alertPrimary+= 'A simple primary alert—check it out!';
    alertPrimary+= '</div>';
    $("#respuesta").empty().append(alertPrimary);
});
$( "#btn-modal-create-provider" ).click(function() {
    //OBTENEMOS DATOS
    let ruc = $('#proveedor_ruc').val();
    let nombre = $('#proveedor_nombre').val();
    let razSocial = $('#razonsoc_proveedor').val();
    let direccion = $('#direccion_proveedor').val();
    let telefono = $('#telefono_proveedor').val();
    let celular = $('#celular_proveedor').val();
    let correo = $('#correo_proveedor').val();
    let estado;
    var bolestado = $('#estado_proveedor').is(":checked");
    //La caja está marcada
    if(bolestado){
        bolestad = true;
        estado = '1';     
    }
    //La caja NO está marcada
    else{
        bolestad = false;
        estado = '0';     
    }
    let descripcion = $('#descripcion_proveedor').val();
    //AGRUPAMOS DATOS OBTENIDO
    var proveedor = {
      "ruc" : ruc,
      "nombre" : nombre,
      "razSocial" : razSocial,
      "direccion" : direccion,
      "telefono" : telefono,
      "celular" : celular,
      "correo" : correo,
      "estado" : estado,
      "descripcion" : descripcion,
    };
    var jqxhr = $.ajax({
        /*
        beforeSend: function(){
            alertPrimary = '<div class="alert alert-primary" role="alert">';
            alertPrimary+= 'A simple primary alert—check it out!';
            alertPrimary+= '</div>';
            $("#respuesta").empty().append(alertPrimary);
        },*/
        url: './../../controllers/controllerProviders.php',
        type: 'POST',
        data: proveedor,
    })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
        alertPrimary = '<div class="alert alert-primary" role="alert">';
        alertPrimary+= 'A simple primary alert—check it out!';
        alertPrimary+= '</div>';
        $("#residmdlProvider").empty().append(data);
        console.log( data );
    })
    //SI OCURRE UN ERROR
    .fail(function() {
        alert( "error" );
    })
    //EJECUTA AL TERMINAR LA FUNCION YA SEHA ERROR O EXITO
    .always(function() {
        alert( "completado" );
    });
    // Hacer otra cosa aquí ...
    // Asignar otra función de completado para la petición de más arriba
    jqxhr.always(function() {
    alert( "completado segundo" );
    });
});

</script>