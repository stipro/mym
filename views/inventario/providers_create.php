<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
            Creación nuevo proveedor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div id="respuesta">
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
                            <label for="proveedor_nombre" class="form-label">Nombre</label>
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
                            <label for="telefono_proveedor" class="form-label">Telefono*</label>
                            <input type="number" class="form-control" id="telefono_proveedor" placeholder="Telefono">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="celular_proveedor" class="form-label">Celular*</label>
                            <input type="number" class="form-control" id="celular_proveedor" placeholder="Celular">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="correo_proveedor" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo_proveedor" placeholder="Correo">
                        </div>
                    </div>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <!--ICONO-->
        <svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
        </svg>
        Cerrar</button>
        <button id="btn-insert" type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmacion_modal">
        <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
        <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
        </svg>
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
    <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="./../../assets/js/validador_ruc.js" type="text/javascript"></script>

<!-- the fileinput plugin initialization -->
<script>

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
$( "#btn-insert" ).click(function() {
    //OBTENEMOS DATOS
    let ruc = $('#proveedor_ruc').val();
    let nombre = $('#proveedor_nombre').val();
    let direccion = $('#direccion_proveedor').val();
    let razSocial = $('#razonsoc_proveedor').val();
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
      "direccion" : direccion,
      "razSocial" : razSocial,
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
        $("#respuesta").empty().append(data);
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