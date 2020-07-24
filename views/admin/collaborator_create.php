<!-- Modal -->
<div class="modal fade" id="btn_modal_ccollaborator" style="overflow-y: scroll;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div id="md-collaborator" class="modal-content">
            <div id="md-header_ccollaborator"class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <!--ICONO-->
                <img src="./../../assets/icons/icons-1.0.0-alpha5/pencil-square.svg" alt="" width="32" height="32" title="title">
                Creación nuevo Colaborador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="respuesta">
                </div>
                <div class="container-fluid">
                    <div class="mb-3">
                        <label for="codigo_colaborador" class="form-label">Codigo</label>
                        <input type="text" class="form-control" id="codigo_colaborador" placeholder="Codigo">
                    </div>
                    <div class="mb-3">
                        <label for="pnombre_colaborador" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="pnombre_colaborador" placeholder="Nombre">
                    </div>
                    <div class="mb-3">
                        <label for="snombre_colaborador" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="snombre_colaborador" placeholder="Nombre">
                    </div>
                    
                    <div class="mb-3">
                        <label for="papellido_colaborador" class="form-label">Apellido paterno</label>
                        <input type="text" class="form-control" id="papellido_colaborador" placeholder="Apellido">
                    </div>
                    <div class="mb-3">
                        <label for="sapellido_colaborador" class="form-label">Apellido materna</label>
                        <input type="text" class="form-control" id="sapellido_colaborador" placeholder="Apellido">
                    </div>
                    <div class="mb-3">
                        <label for="dni_colaborador" class="form-label">Documento de Identidad N. (D.N.I)</label>
                        <input type="number" class="form-control" id="dni_colaborador" placeholder="D.N.I">
                    </div>
                    <div class="form-row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Genero</label>
                                <div>
                                    <select class="form-control selectpicker" data-live-search="true">
                                        <option data-tokens="FRANK STIFT">Hombre</option>
                                        <option data-tokens="SHERY PAOLA">Mujer</option>
                                        <option data-tokens="ANTHONY EL PAPI">Otros</option>
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="d-flex align-items-end form-group">
                            <button type="button" class="btn btn-primary p-0">
                                <img src="./../../assets/icons/icons-1.0.0-alpha5/plus.svg" alt="" width="32" height="32" title="Bootstrap">
                            </button>
                        </div>
                    </div>                                               
                    <div class="mb-3">
                        <label for="telefono_colaborador" class="form-label">Telefono</label>
                        <input type="tel" class="form-control" id="telefono_colaborador" placeholder="Telefono">
                    </div>
                    <div class="mb-3">
                        <label for="celular_colaborador" class="form-label">Celular</label>
                        <input type="tel" class="form-control" id="celular_colaborador" placeholder="Celular">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="estado_colaborador" checked>
                            <label class="form-check-label" for="estado_colaborador">Estado</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_colaborador" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion_colaborador" rows="3"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                <div>
                                    <select class="form-control selectpicker" data-live-search="true">
                                    <optgroup label="Picnic">
                                        <option>Mustard</option>
                                        <option>Ketchup</option>
                                        <option>Relish</option>
                                    </optgroup>
                                    <optgroup label="Camping">
                                        <option>Tent</option>
                                        <option>Flashlight</option>
                                        <option>Toilet Paper</option>
                                    </optgroup>
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="d-flex align-items-end form-group">
                            <button type="button" id="btn_create_cargo" class="btn btn-primary p-0">
                                <img src="./../../assets/icons/icons-1.0.0-alpha5/plus.svg" alt="" width="32" height="32" title="Bootstrap">
                            </button>
                        </div>
                    </div>  
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <!--ICONO-->
            <img src="./../../assets/icons/icons-1.0.0-alpha5/x-circle.svg" alt="" width="32" height="32" title="Bootstrap">    
            Cerrar</button>
            <button id="btn-insert-collaborator" type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmacion_modal">
            <!--ICONO-->
            <img src="./../../assets/icons/icons-1.0.0-alpha5/pencil.svg" alt="" width="32" height="32" title="Bootstrap">
            Guardar</button>
            <button id="btn-limpiar" type="button" class="btn btn-primary">
            Limpiar
            </button>
        </div>
    </div>
</div>

<script>
    $("#md-collaborator").draggable({
    handle: "#md-header_ccollaborator"
    });
    $("#md-collaborator").draggable({
    handle: "#md-header_ccollaborator"
    });
$( "#btn-insert-collaborator" ).click(function() {
        //OBTENEMOS DATOS
        let codigo_colaborador = $('#codigo_colaborador').val();
        let pnombre_colaborador = $('#pnombre_colaborador').val();
        let snombre_colaborador = $('#snombre_colaborador').val();
        let papellido_colaborador = $('#papellido_colaborador').val();
        let sapellido_colaborador = $('#sapellido_colaborador').val();
        let dni_colaborador = $('#dni_colaborador').val();
        let genero_colaborador = $('#genero_colaborador').val();
        let telefono_colaborador = $('#telefono_colaborador').val();
        let celular_colaborador = $('#celular_colaborador').val();
        let estado_colaborador = $('#estado_colaborador').is(":checked");
        let estado;
        if(estado_colaborador){//La caja está marcada
        estado = '1';     
        }
        else{//La caja NO está marcada
        estado = '0';     
        }
        let descripcion_colaborador = $('#descripcion_colaborador').val();
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
        //AGRUPAMOS DATOS OBTENIDO
        var colaborador = {
        "codigo_colaborador" : codigo_colaborador,
        "pnombre_colaborador" : pnombre_colaborador,
        "snombre_colaborador" : snombre_colaborador,
        "papellido_colaborador" : papellido_colaborador,
        "sapellido_colaborador" : sapellido_colaborador,
        "dni_colaborador" : dni_colaborador,
        "genero_colaborador" : genero_colaborador,
        "telefono_colaborador" : telefono_colaborador,
        "celular_colaborador" : celular_colaborador,
        "estado" : estado,
        "descripcion_colaborador" : descripcion_colaborador,
        };
        console.log('Se creara un cargo '+dateformate+" y Hora "+hora)
    var jqxhr = $.ajax({        
        beforeSend: function(){
            alertPrimary = '<div class="alert alert-primary" role="alert">';
            alertPrimary+= 'Se envio los datos';
            alertPrimary+= '</div>';
            $("#respuesta").append(alertPrimary);
        },
        url: './../../controllers/controllerCollaboratssors.php',
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
    $(document).on('click', '#btn_create_cargo', function() {
        //modal-requested
        var jqxhr = $.ajax({
        /*
        beforeSend: function(){
            alertPrimary = '<div class="alert alert-primary" role="alert">';
            alertPrimary+= 'A simple primary alert—check it out!';
            alertPrimary+= '</div>';
            $("#respuesta").empty().append(alertPrimary);
        },*/
        url: './charge_create.php',
        type: 'POST',
        })
        //RECIBIENDO RESPUESTA
        .done(function(data) {
            $("#modal-requested").append(data);
            $('#btn_modal_ccargo').modal('show');
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