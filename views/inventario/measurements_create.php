<!-- Modal -->
<div id="md_uMedida" class="modal fade" tabindex="-1" role="dialog" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Creación Uni. Medida</h5>
      </div>
      <div class="modal-body">
      <div id="respuesta"></div>
        <div class="form-row">
          <div class="form-group col-sm">
            <label for="nombre_measurements" class="form-label">Número de RUC del emisor * </label>
            <input type="text" class="form-control" id="nombre_measurements" placeholder="Nombre" value="">
          </div>
          <div class="form-group col-sm">
            <label for="abreviatura_measurements" class="form-label">Abreviatura</label>
            <input type="text" class="form-control" id="abreviatura_measurements" placeholder="Descripcion">
          </div>
          <div class="form-group col-sm">
            <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="estado_measurements" checked>
            <label class="form-check-label" for="estado_measurements">Estado</label>
          </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btn-measurements-cCancel" type="button" class="btn btn-secondary" data-dismiss="modal">
        <!--ICONO-->
        <img src="./../../assets/icons/icons-1.0.0-alpha5/x-circle.svg" alt="" width="16" height="16" title="Cerrar">    
        Cerrar</button>
        <button id="btn-measurements-cCreate" type="button" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>