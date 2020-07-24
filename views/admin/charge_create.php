<!-- Modal -->
<div class="modal fade" id="btn_modal_ccargo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div id="md-collaborator" class="modal-content">
            <div id="md-header_ccollaborator" class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <!--ICONO-->
                <img src="./../../assets/icons/icons-1.0.0-alpha5/pencil-square.svg" alt="32" width="32" height="1em" title="cancelar">
                Creación nuevo Cargo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="respuesta">
                </div>
                <div class="container-fluid">
                    <div class="mb-3">
                        <label for="codigo_usuario" class="form-label">Nombre de Cargo</label>
                        <input type="text" class="form-control" id="genero" placeholder="Cargo">
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <!--ICONO-->
            <img src="./../../assets/icons/icons-1.0.0-alpha5/x-circle.svg" alt="" width="32" height="32" title="Bootstrap">  
            Cerrar</button>
            <button id="btn-insert-genero" type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmacion_modal">
            <!--ICONO-->
            <img src="./../../assets/icons/icons-1.0.0-alpha5/pencil.svg" alt="" width="32" height="32" title="Bootstrap">
            Guardar</button>
            <button id="btn-limpiar-genero" type="button" class="btn btn-primary">
            Limpiar
            </button>
        </div>
    </div>
  </div>
</div>
<script>

</script>