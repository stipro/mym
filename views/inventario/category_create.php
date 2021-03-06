<!-- Modal -->
<div class="modal fade" id="md_cCategory" tabindex="-1" role="dialog" aria-labelledby="mdl_lblCategoria" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdl_lblCategoria">Creación nuevo Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="residmdlBrand"><!--respuesta-->
          <div id="actions" class="container">
            <div class="row">
              <div id="gif" class="col-3">

              </div>
              <div id="typing" class="col">

              </div>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm">
            <label for="nombre_marca" class="form-label">Nombre *</label>
            <input type="text" class="form-control" id="nombre_marca" placeholder="Nombre" value="">
          </div>
          <div class="form-group col-sm">
            <label for="descripcion_marca" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion_marca" placeholder="Descripcion">
          </div>
          <div class="form-group col-sm">
            <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="estado_marca" checked>
            <label class="form-check-label" for="estado_marca">Estado *</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <!--ICONO-->
        <img src="./../../assets/icons/icons-1.0.0-alpha5/x-circle.svg" alt="" width="16" height="16" title="Cerrar">    
        Cerrar</button>
        <button id="categorybtnInsert" type="button" class="btn btn-primary">
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