<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link rel="stylesheet" href="./../../libs/bootstrap-4.5.0/css/bootstrap.min.css">
    <title>Modal</title>
</head>
<body>
    
<button type="button" id="Crear" class="btn btn-primary">
        <span class="fa fa-plus"></span> Agregar
    </button>

    <div id="ModalCrear" class="modal fade" style="overflow-y: scroll;" role="dialog"> 
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header"> 
    				<h4 class="modal-tittle">Crear</h4> 
    			</div> 
    			<form class="form-horizontal" role="form" id="form-crear">
    				<div class="modal-body"> 
    					<div class="row form-group col-md-12">
    						<label for="crear_codigo" class="control-label col-sm-2 col-xs-12">Código: </label>
    						<div class="col-sm-4 col-xs-6">
    							<input type="number" class="form-control" id="crear_codigo" name="crear_codigo">
    						</div>
    					</div>  
    					<div class="row form-group col-md-12">
    						<label for="crear_nombre" class="control-label col-sm-2 col-xs-12">Nombre: </label>
    						<div class="col-sm-6 col-xs-10 selectContainer">
    							<select id="crear_nombre" name="crear_nombre" class="form-control" style="width: 100%;">
                                        <option value="0">Seleccione...</option>
                                        <option value="1">Clorace</option>
                                        <option value="2">Miovit</option>
    							</select>
    						</div>
    						<div class="col-sm-2 col-xs-2">
    							<button type="button" class="btn btn-primary" id="agregar_nombres">
    								<span class="fa fa-plus"></span>
                        			<span class="hidden-xs"> Agregar Items</span> 
    							</button>
    						</div>
    					</div> 
    					<div class="row form-group col-md-12">
    						<label for="crear_formas_farmaceuticas" class="control-label col-sm-2 col-xs-12">Forma Farmacéutica: </label>
    						<div class="col-sm-6 col-xs-10 selectContainer">
    							<select id="crear_formas_farmaceuticas" class="form-control" name="crear_formas_farmaceuticas" style="width: 100%;">
                                        <option value="0">Seleccione...</option>
                                        <option value="1">Inyección</option>
                                        <option value="2">Jarabe</option>
    							</select>
    						</div>
    						<div class="col-sm-1 col-xs-2">
    							<button type="button" class="btn" id="agregar_formas">
                                    <img src="./../../assets/icons/icons-1.0.0-alpha5/plus-square-fill.svg" alt="" width="32" height="32" title="Bootstrap">
    							</button>
                                <div>
                                <button type="button" class="btn btn-btn-light">
                                    <img src="./../../assets/icons/icons-1.0.0-alpha5/plus-square-fill.svg" alt="" width="32" height="32" title="Bootstrap">
                                </button>
                                </div>

                                <span class="hidden-xs"> Agregar Items</span> 
    						</div>
    					</div>
    					<div class="row form-group col-md-12">
    						<label for="crear_presentacion" class="control-label col-sm-2 col-xs-12">Presentación: </label>
    						<div class="col-sm-3 col-xs-5">
    							<input type="number" class="form-control" id="crear_presentacion" name="crear_presentacion">
    						</div> 
    						<div class="col-sm-4 col-xs-7 selectContainer">
    							<select id="crear_unidad_de_medicion_p" class="form-control" name="crear_unidad_de_medicion_p" style="width: 100%;">
                                        <option value="0">Seleccione...</option>
                                        <option value="1">(und) Unidad</option>
                                        <option value="2">(ml) Mililitro</option>
                                        <option value="2">(mg) Miligramo</option>
    							</select>
    						</div>
    					</div>
    					<div class="row form-group col-md-12">
    						<label for="crear_unidad_teorica" class="control-label col-sm-2 col-xs-12">Unidad Teórica: </label>
    						<div class="col-sm-5 col-xs-5">
    							<input type="number" class="form-control" id="crear_unidad_teorica" name="crear_unidad_teorica">
    						</div> 
    						<div class="col-sm-4 col-xs-7 selectContainer">
    							<select id="crear_unidad_de_medicion_u" class="form-control" name="crear_unidad_de_medicion_u" style="width: 100%;">
                                        <option value="0">Seleccione...</option>
                                        <option value="1">(und) Unidad</option>
                                        <option value="2">(ml) Mililitro</option>
                                        <option value="2">(mg) Miligramo</option>
    							</select>
    						</div>
    					</div>
    					<div class="row form-group col-md-12">
    						<label for="crear_velocidad" class="control-label col-sm-2 col-xs-12">Velocidad del Producto: </label>
    						<div class="col-sm-3 col-xs-5">
    							<input type="number" class="form-control" id="crear_velocidad" name="crear_velocidad">
    						</div> 
    						<label class="col-sm-5 col-xs-7">
    							<h4>
    								<sup id="crear_unidad_de_medicion_v_u" name="crear_unidad_de_medicion_v_u">
    									
    								</sup>
    								/
    								<sub id="crear_unidad_de_medicion_v_t" name="crear_unidad_de_medicion_v_t">
    									min
    								</sub>
    							</h4>
    						</label>
    					</div>
    					<div class="row form-group col-md-12">
    						<label class="control-label col-sm-2 col-xs-12">Tiempo Teórico: </label>
    						<label class="col-sm-7 col-xs-7">
    							<h4>
    								<sub id="crear_tiempo_teorico" name="crear_tiempo_teorico">
    									
    								</sub>
    							</h4>
    						</label>
    					</div>
    					<div class="row form-group col-md-12">
    						<label for="crear_linea_de_produccion" class="control-label col-sm-2">Linea de Producción:</label>
    						<div class="col-sm-8 selectContainer">
    							<select id="crear_linea_de_produccion" class="form-control" name="crear_linea_de_produccion" style="width: 100%;">
                                        <option value="0">Seleccione...</option>
                                        <option value="1">Liquidos Esteriles</option>
                                        <option value="2">Liquidos No Esteriles</option>
                                        <option value="2">Solidos</option>
    							</select>
    						</div>
    					</div>
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal">
    						<span class="glyphicon glyphicon-remove"></span>
                        	<span class="hidden-xs"> Cerrar</span> 
    					</button>
    					<button type="button" id="Guardar" name="Guardar" class="btn btn-primary">
    						<span class="fa fa-save"></span>
                        	<span class="hidden-xs"> Guardar</span> 
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>

    <div id="ModalAgregarNombre" class="modal fade" role="dialog"> 
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header"> 
    				<h4 class="modal-tittle">Agregar</h4>
    			</div> 
    			<form class="form-horizontal" role="form" id="form-agregar">
    				<div class="modal-body"> 
    					<div class="form-group col-md-12">
    						<label for="agregar_nombre" class="control-label col-sm-4">Nombre: </label>
    						<div class="col-sm-8">
    							<input type="text" class="form-control" id="agregar_nombre" name="agregar_nombre">
    						</div>
    					</div> 
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal">
    						<span class="glyphicon glyphicon-remove"></span><span class="hidden-xs"> Cerrar</span>
    					</button>
    					<button type="button" id="GuardarNombre" name="GuardarNombre" class="btn btn-primary">
    						<span class="fa fa-save"></span><span class="hidden-xs"> Guardar</span>
                          
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>

    <div id="ModalAgregarformas" class="modal fade" role="dialog"> 
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div id="modal-header-formas" class="modal-header"> 
    				<h4 class="modal-tittle">Agregar</h4>
    			</div> 
    			<form class="form-horizontal" role="form" id="form-agregar">
    				<div class="modal-body"> 
    					<div class="form-group col-md-12">
    						<label for="agregar_nombre" class="control-label col-sm-4">Nombre: </label>
    						<div class="col-sm-8">
    							<input type="text" class="form-control" id="agregar_nombre" name="agregar_nombre">
    						</div>
    					</div> 
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal">
    						<span class="glyphicon glyphicon-remove"></span><span class="hidden-xs"> Cerrar</span>
    					</button>
    					<button type="button" id="GuardarNombre" name="GuardarNombre" class="btn btn-primary">
    						<span class="fa fa-save"></span><span class="hidden-xs"> Guardar</span>
                          
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
    <!---->
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
        Launch demo modal
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal5">
        Modal pareja
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  <!-- dialo 2-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  <!-- dialo 3 -->
    <div class="modal fade" id="exampleModal5" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 2 -->
<div class="modal fade" id="exampleModal2" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="./../../libs/bootstrap-4.5.0/js/bootstrap.min.js" type="text/javascript"></script>
    <script>
      $(document).on('click', '#Crear', function() {
        $('#ModalCrear').modal('show');
    });

    $(document).on('click', '#agregar_nombres', function() {
        $('#ModalAgregarNombre').modal('show');
    });
    $(document).on('click', '#agregar_formas', function() {
        $('#ModalAgregarformas').modal('show');
    });
    $("#ModalAgregarformas").draggable({
    handle: "#modal-header-formas"
    });
    </script>
</body>
</html>

