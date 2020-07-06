<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creación nuevo producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label">Almacen</label>
                <div>
                    <select class="form-control selectpicker" data-live-search="true" data-style="btn-success">
                        <option data-tokens="Recepción">Recepción</option>
                        <option data-tokens="Informatica">Informatica</option>
                        <option data-tokens="Cural">Transporte (Cural)</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label" >Proveedor</label>
                <div>
                    <select class="form-control selectpicker" data-live-search="true" data-style="btn-success">
                        <option data-tokens="Recepción">Proveedor</option>
                        <option data-tokens="Informatica">Proveedor 2</option>
                        <option data-tokens="Cural">Proveedor 3</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label">Categoria</label>
                <div>
                    <select class="form-control selectpicker" data-live-search="true">
                        <option data-tokens="Recepción">Categoria</option>
                        <option data-tokens="Informatica">Categoria 2</option>
                        <option data-tokens="Cural">Categoria 3</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label">Marca</label>
                <div>
                    <select class="form-control selectpicker" data-live-search="true">
                        <option data-tokens="Recepción">Marca</option>
                        <option data-tokens="Informatica">Marca 2</option>
                        <option data-tokens="Cural">Marca 3</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label">Codigo</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Codigo">
            </div>
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nombre">
            </div>
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label">Precio</label>
                
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Precio">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label">Stock</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Stock">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label">Modelo</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Modelo">
            </div>
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label">Garantia</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Garantia">
            </div>
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label">N° Serial</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="N° Seria">
            </div>
            <div class="form-group col-sm">
                <label for="exampleFormControlInput1" class="form-label">N° Lote</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="N° Lote">
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">Estado Modulo</label>
            </div>
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="btn-insert" type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<script>
//insertar
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