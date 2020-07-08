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
      <div id="respuesta">
    </div>
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
                <label for="codigo_producto" class="form-label">Codigo</label>
                <input type="email" class="form-control" id="codigo_producto" placeholder="Codigo">
            </div>
            <div class="form-group col-sm">
                <label for="nombre_producto" class="form-label">Nombre</label>
                <input type="email" class="form-control" id="nombre_producto" placeholder="Nombre">
            </div>
            <div class="form-group col-sm">
                <label for="precio_producto" class="form-label">Precio</label>
                
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="email" class="form-control" id="precio_producto" placeholder="Precio">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm">
                <label for="stock_producto" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock_producto" placeholder="Stock">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm">
                <label for="modelo_producto" class="form-label">Modelo</label>
                <input type="email" class="form-control" id="modelo_producto" placeholder="Modelo">
            </div>
            <div class="form-group col-sm">
                <label for="garanta_producto" class="form-label">Garantia</label>
                <input type="email" class="form-control" id="garanta_producto" placeholder="Garantia">
            </div>
            <div class="form-group col-sm">
                <label for="nserial_producto" class="form-label">N° Serial</label>
                <input type="email" class="form-control" id="nserial_producto" placeholder="N° Seria">
            </div>
            <div class="form-group col-sm">
                <label for="nlote_producto" class="form-label">N° Lote</label>
                <input type="email" class="form-control" id="nlote_producto" placeholder="N° Lote">
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="estado_producto" checked>
            <label class="form-check-label" for="estado_producto">Estado Modulo</label>
            </div>
        </div>
        <div class="mb-3">
        <label for="descripcion_producto" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion_producto" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="btn-insert" type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script>
//insertar
$( "#btn-insert" ).click(function() {
    //OBTENEMOS DATOS
    let codigo = $('#codigo_producto').val();
    let nombre = $('#nombre_producto').val();
    let precio = $('#precio_producto').val();
    let stock = $('#stock_producto').val();
    let descripcion = $('#descripcion_producto').val();
    //AGRUPAMOS DATOS OBTENIDO
    var producto = {
      "codigo" : codigo,
      "nombre" : nombre,
      "precio" : precio,
      "stock" : stock,
      "descripcion" : descripcion,
    };
    var jqxhr = $.ajax({
        beforeSend: function(){
            alertPrimary = '<div class="alert alert-primary" role="alert">';
            alertPrimary+= 'Se envio estos datos!';
            alertPrimary+= '</div>';
            console.log(producto);
            $("#respuesta").empty().append(alertPrimary);
        },
        url: './../../controllers/controllerProducts.php',
        type: 'POST',
        data: producto,
    })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
        $("#respuesta").append(data);
        console.log( data );
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