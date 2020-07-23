<!-- Modal -->
<div class="modal fade" id="btn_modal_cuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                Creación nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="respuesta">
                </div>
                <div class="container-fluid">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Colaborador</label>
                        <div>
                            <select class="form-control selectpicker" data-live-search="true">
                                <option data-tokens="FRANK STIFT">FRANK STIFT</option>
                                <option data-tokens="SHERY PAOLA">SHERY PAOLA</option>
                                <option data-tokens="ANTHONY EL PAPI">ANTHONY EL PAPI</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="codigo_usuario" class="form-label">Codigo</label>
                        <input type="text" class="form-control" id="codigo_usuario" placeholder="Codigo">
                    </div>
                    <div class="mb-3">
                        <label for="nombre_usuario" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_usuario" placeholder="Nombre">
                    </div>
                    <div class="mb-3">
                        <label for="clave_usuario" class="form-label">Clave</label>
                        <input type="password" class="form-control" id="clave_usuario" placeholder="Clave">
                    </div>
                    <div class="mb-3">
                        <label for="correo_usuario" class="form-label">Correo Electroníco</label>
                        <input type="email" class="form-control" id="correo_usuario" placeholder="Correo">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="estado_usuario" checked>
                            <label class="form-check-label" for="estado_usuario">Estado</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_usuario" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion_usuario" rows="3"></textarea>
                    </div>
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
    let codigo = $('#codigo_usuario').val();
    let nombre = $('#nombre_usuario').val();
    let clave = $('#clave_usuario').val();
    let correo = $('#correo_usuario').val();
    let descripcion = $('#descripcion_usuario').val();
    let estado;
    var bolestado = $('#estado_usuario').is(":checked");
    var hoy = new Date();
    console.log(hoy);
    //La caja está marcada
    if(bolestado){

        estado = '1';     
    }
    //La caja NO está marcada
    else{
        estado = '0';     
    }
    //AGRUPAMOS DATOS OBTENIDO
    var usuario = {
      "codigo" : codigo,
      "nombre" : nombre,
      "clave" : clave,
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
        url: './../../controllers/controllerUsers.php',
        type: 'POST',
        data: usuario,
    })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
        $("#respuesta").empty().append(data);
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