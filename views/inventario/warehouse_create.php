<!-- Modal -->
<div id="md_cAlmacen" class="modal fade" tabindex="-1" role="dialog" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Creación nuevo Almacen</h5>
      </div>
      <div class="modal-body">
      <div class="form-row">
        <div class="form-group col-sm">
          <label for="nombre_almacen" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre_almacen" placeholder="Nombre">
        </div>
        <div class="form-group col-sm">
          <label for="descripcion_almacen" class="form-label">Descripcion</label>
          <input type="text" class="form-control" id="descripcion_almacen" placeholder="Descripcion">
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <!--ICONO-->
        <img src="./../../assets/icons/icons-1.0.0-alpha5/x-circle.svg" alt="" width="32" height="32" title="Cerrar">    
        Cerrar</button>
        <button id="btn_ialmacen" type="button" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
<script>
var socket;
document.getElementById('btn_ialmacen').addEventListener('click', function () {
  console.log("Se envio registro de Almacen");
  send()
});
function init() {
	// Apuntar a la IP/Puerto configurado en el contructor del WebServerSocket, que es donde está escuchando el socket.
	var host = "ws://192.168.1.122:9000"; 
	try {
		socket = new WebSocket(host);
		log('WebSocket (M&M) - Estado '+socket.readyState);
		socket.onopen    = function(msg) { 
							   log("Bienvenido - Estado "+this.readyState); 
							   console.log(socket.readyState);
						   };
		socket.onmessage = function(msg) { 
							   log("Recibido: "+msg.data); 
						   };
		socket.onclose   = function(msg) { 
							   log("Disconnected - status "+this.readyState); 
						   };
	}
	catch(ex){ 
		log(ex); 
	}
	$("msg").focus();
}

function send(){
  var txtName, txtDescription;
  //Obtener Nombre
  txtName = document.getElementById('nombre_almacen').value;
  //Obtener Descripción
  txtDescription = document.getElementById('descripcion_almacen').value;
  console.log(txtName + ' Y ' + txtDescription);
  //Comparo si los dos estan vacios
	if(!txtName | !txtDescription) { 
		alert("El mensaje no puede estar vacío."); 
		return; 
	}

}
function quit(){
	if (socket != null) {
		log("Goodbye!");
		socket.close();
		socket=null;
	}
}

function reconnect() {
	quit();
	init();
}
</script>