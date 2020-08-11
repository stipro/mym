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
        <button id="btn-warehouse-cCancel" type="button" class="btn btn-secondary" data-dismiss="modal">
        <!--ICONO-->
        <img src="./../../assets/icons/icons-1.0.0-alpha5/x-circle.svg" alt="" width="16" height="16" title="Cerrar">    
        Cerrar</button>
        <button id="btn-warehouse-cCreate" type="button" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  //DOM elements
  let md_cAlmacenes = document.getElementById('md_cAlmacenes');
  let btnCreate = document.getElementById('btn-warehouse-cCreate');
  let btnCancel = document.getElementById('btn-warehouse-cCancel');
  let nameWarehouse = document.getElementById('nombre_almacen');
  let typing = document.getElementById('typing');
  let gif = document.getElementById('gif');
  let valorinput = nameWarehouse.value;
    // Socket Server
  var jsonData;
  var text;
  jsonData = {
    userId: '15',
    module: "Almacen",
    text: "Un usuario REGISTRO un Almacen",
    status: true,
  }
  console.log(jsonData);
  const conn = new WebSocket('ws://192.168.43.236:8080');
  conn.onopen = function(e) {
    //conn.send(JSON.stringify(msg));
    console.log("Conexion establecida!");
  };
  //CREATE
  md_cAlmacenes.addEventListener('click', function(){
    jsonData['text'] = "Un usuario comenzo un REGISTRO un Almacen";
    //status: TRUE,
    conn.send(JSON.stringify(jsonData));
    console.log(jsonData.text);
  });
  //CREATE
  btnCreate.addEventListener('click', function(){
    jsonData['text'] = "Un usuario REGISTRO un Almacen";
    //status: TRUE,
    conn.send(JSON.stringify(jsonData));
    console.log(jsonData.text);
  });
  //CANCEL
  btnCancel.addEventListener('click', function(){
    jsonData['text'] = "Un usuario DEJO registrar un Almacen";
    //status: false,
    conn.send(JSON.stringify(jsonData));
    console.log(jsonData['text']);
  });
  //DIGITANDO
  nameWarehouse.addEventListener("keyup", function(){
    //alert(this.value);
    //Envia Mensaje
    //conn.send('Un usuario esta registrando un Almacen : ' + this.value);
    jsonData['text'] = "Un usuario esta registrando un Almacen";
    conn.send(JSON.stringify(msg));
  });
  
  //nameWarehouse.addEventListener('keypress', senType);
  //RECIBE MENSAJE
  conn.onmessage = function (event) { 
    gif.innerHTML = '<img src="./../../assets/gif/typing.gif" alt="Funny image" style="width: 3rem">';
    typing.innerHTML = ' <p><em>' + event.data + '</em></p>';
    let msg = event.data;
    console.log(JSON.parse(msg));
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
        url: './../../controllers/controllerWarehouse.php',
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