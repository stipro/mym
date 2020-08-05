<!-- Modal -->
<div id="md_cAlmacen" class="modal fade" tabindex="-1" role="dialog" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Creación nuevo Almacen</h5>
      </div>
      <div class="modal-body">
      <div id="actions"></div>
        <div class="form-row">
          <div class="form-group col-sm">
            <label for="nombre_almacen" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre_almacen" placeholder="Nombre" value="">
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
        <img src="./../../assets/icons/icons-1.0.0-alpha5/x-circle.svg" alt="" width="16" height="16" title="Cerrar">    
        Cerrar</button>
        <button id="btn_ialmacen" type="button" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  //DOM elements
  let nameWarehouse = document.getElementById('nombre_almacen');
  let actions = document.getElementById('actions');
  let valorinput = nameWarehouse.value;
    // Socket Server
  var msg;

  const conn = new WebSocket('ws://192.168.1.122:8080');
  conn.onopen = function(e) {
    //conn.send(JSON.stringify(msg));
    console.log("Conexion establecida!");
  };
   
  nameWarehouse.addEventListener('keypress', senType);
  //conn.send('Se esta escribiendo !!!' + valorjquery);
  //console.log('Se esta escribiendo !!!' + valorjquery);

  conn.onmessage = function (event) {
    actions.innerHTML = '<p><em>' + event.data + '</em></p>';
    console.log(event.data);
  }

  function senType() {
    msg = {
      type: "message",
      text: document.getElementById("nombre_almacen").value,
      id:   'clientID',
      date: Date.now()  
    }
    conn.send(JSON.stringify(msg));
    console.log(msg)
  }

}); 



            /*
            (function () {
                var Message;
                Message = function (arg) {
                    this.text = arg.text, this.message_side = arg.message_side;
                    this.draw = function (_this) {
                        return function () {
                            var $message;
                            $message = $($('.message_template').clone().html());
                            $message.addClass(_this.message_side).find('.text').html(_this.text);
                            $('.messages').append($message);
                            return setTimeout(function () {
                                return $message.addClass('appeared');
                            }, 0);
                        };
                    }(this);
                    return this;
                };

                $(function () {
                    
                    var getMessageText, message_side, sendMessage;
                    message_side = 'right';

                    getMessageText = function () {
                        var $message_input;
                        $message_input = $('.message_input');
                        conn.send($message_input.val());
                        return $message_input.val();
                    };

                    sendMessage = function (text, message_side) {
                        var $messages, message;
                        if (text.trim() === '') {
                            return;
                        }
                        $('.message_input').val('');
                        $messages = $('.messages');
                        message_side = message_side || 'left';
                        message = new Message({
                            text: text,
                            message_side: message_side
                        });
                        message.draw();
                        
                        return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
                    };

                    $('.send_message').click(function (e) {
                        return sendMessage(getMessageText());
                    });

                    $('.message_input').keyup(function (e) {
                        if (e.which === 13) {
                            return sendMessage(getMessageText());
                        }
                    });

                    conn.onmessage = function(e) {
                        console.log(e.data);
                        sendMessage(e.data, 'right');
                    };
    
                });

            }.call(this));*/

  /*
var socket;
document.getElementById('btn_ialmacen').addEventListener('click', function () {
  console.log("Se envio registro de Almacen");
  send()
});
function init() {
	// Apuntar a la IP/Puerto configurado en el contructor del WebServerSocket, que es donde está escuchando el socket.
	var host = "ws://192.168.1.122:8080"; 
	try {
    socket = new WebSocket(host);
      console.log('conexion establecitada');
    }
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
}*/
</script>