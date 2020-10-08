<!-- Modal -->
<div id="md_cAlmacen" class="modal fade" tabindex="-1" role="dialog" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Creación nuevo Almacen</h5>
      </div>
      <div class="modal-body">
      <div id="respuesta">
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
            <label for="nombre_almacen" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre_almacen" placeholder="Nombre" value="">
          </div>
          <div class="form-group col-sm">
            <label for="descripcion_almacen" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion_almacen" placeholder="Descripcion">
          </div>
          <div class="form-group col-sm">
            <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="estado_almacen" checked>
            <label class="form-check-label" for="estado_almacen">Estado</label>
          </div>
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
  var iptnameWarehouse = document.getElementById("nombre_almacen");
  var iptdescWarehouse = document.getElementById("descripcion_almacen");
  var iptestaWarehouse = document.getElementById("estado_almacen");
  let md_cAlmacen = document.getElementById('md_cAlmacen');
  let btnCreate = document.getElementById('btn-warehouse-cCreate');
  let btnCancel = document.getElementById('btn-warehouse-cCancel');
  let nameWarehouse = document.getElementById('nombre_almacen');
  let typing = document.getElementById('typing');
  let gif = document.getElementById('gif');
  let reply = document.getElementById('respuesta');
  let valorinput = nameWarehouse.value;
    // Socket Server
  var text;
  jsonSocket = {
    userId: '15',
    module: 'Almacen',
    text: 'Un usuario REGISTRO un Almacen',
    action: '0',
    status: true,
  }
  console.log(jsonSocket);
  const conn = new WebSocket('ws://192.168.1.122:8080');
  conn.onopen = function(e) {
    //conn.send(JSON.stringify(msg));
    console.log("Conexion establecida!");
  };
  //OPEN MODAL
  md_cAlmacen.addEventListener('click', function(){
    jsonSocket['text'] = 'Un usuario comenzo un REGISTRO un Almacen';
    jsonSocket['action'] = '1';
    //status: TRUE,
    conn.send(JSON.stringify(jsonSocket));
    console.log(jsonSocket.text);
  });
  //CREATE DATA
  /*
  btnCreate.addEventListener('click', function(){
    //PREPARAMOS DATOS
    var vlenameWarehouse = iptnameWarehouse.value;
    var vledescWarehouse = iptdescWarehouse.value;
    if (iptestaWarehouse.checked == true){
      vleestaWarehouse = "1";
    } else {
      vleestaWarehouse = "0";
    }
    //AGRUPAMOS DATOS OBTENIDO
    var almacen = {
      "nombre" : vlenameWarehouse,
      "descripcion" : vledescWarehouse,
      "estado" : vleestaWarehouse,
    };
    makeRequests(almacen);
    //SEND DATA
    jsonSocket['text'] = 'Un usuario REGISTRO un Almacen';
    jsonSocket['action'] = '2';
 
    //status: TRUE,
    conn.send(JSON.stringify(jsonSocket));
    console.log(jsonSocket.text);
    console.log('SE REGISTRAR NUEVO ALMACEN: ');
    //console.log(almacen);

  });
  */
  //CANCEL/CLOSE MODAL
  btnCancel.addEventListener('click', function(){
    jsonSocket['text'] = 'Un usuario DEJO registrar un Almacen';
    jsonSocket['action'] = '3';
    //status: false,
    conn.send(JSON.stringify(jsonSocket));
    console.log(jsonSocket['text']);
  });
  //DIGITANDO
/*
  nameWarehouse.addEventListener("keyup", function(){
    //alert(this.value);
    //Envia Mensaje
    //conn.send('Un usuario esta registrando un Almacen : ' + this.value);
    jsonData['text'] = "Un usuario esta registrando un Almacen";
    conn.send(JSON.stringify(jsonData));
  });

  //nameWarehouse.addEventListener('keypress', senType);
  function senType() {
    msg = {
      type: "message",
      text: document.getElementById("nombre_almacen").value,
      id:   'clientID',
      date: Date.now()  
    }
    conn.send(JSON.stringify(msg));
    console.log(msg)
*/
  //RECIBE MENSAJE
  conn.onmessage = function (event) {
    let msg = event.data;
    jsonMsg = JSON.parse(msg);
    gif.innerHTML = '<img src="./../../assets/gif/typing.gif" alt="Funny image" style="width: 3rem">';
    typing.innerHTML = '<div class="alert alert-primary" role="alert"><p><em>' + jsonMsg.text + '</em></p></div>';
    
    console.log(jsonMsg);
    console.log(jsonMsg.action);
    //COMPROBAMOS INSERT DATA
    if(jsonMsg.action = 2){
      //listar('');
    }
    
  }
  $( "#jsontable" ).click(function() {
    console.log(jsonWareHouse);
  });
  
  $( "#btn-warehouse-cCreate" ).click(function() {
    //OBTENEMOS DATOS
    let name = $('#nombre_almacen').val();
    let description = $('#descripcion_almacen').val();
    let estado;
    var bolestado = $('#estado_almacen').is(":checked");
    //La caja está marcada
    if(bolestado){
        bolestad = true;
        state = '1';     
    }
    //La caja NO está marcada
    else{
        bolestad = false;
        state = '0';     
    }
    //AGRUPAMOS DATOS OBTENIDO
    var wareHouse = {
      "name" : name,
      "description" : description,
      "state" : state,
    };
    
    //console.log(JSON.stringify(wareHouse));
    //conn.send(JSON.stringify(wareHouse));
    var jqxhr = $.ajax({
        /*
        beforeSend: function(){
            alertPrimary = '<div class="alert alert-primary" role="alert">';
            alertPrimary+= 'A simple primary alert—check it out!';
            alertPrimary+= '</div>';
            $("#respuesta").empty().append(alertPrimary);
        },
        */
        url: './../../controllers/controllerWarehouse.php',
        type: 'POST',
        data: wareHouse,
    })
    //RECIBIENDO RESPUESTA
    .done(function(data) {
      jsonSql= JSON.parse(data);
      alert = '<div class="alert alert-success" role="alert">';
      alert+= jsonSql.rptInsert;
      alert+= '</div>';
      //$("#respuesta").empty().append(alert);
      console.log(jsonSql.rptInsert);
      jsonSocket['text'] = 'Un usuario REGISTRO un nuevo Almacen';
      jsonSocket['action'] = '2';
      //status: TRUE,
      conn.send(JSON.stringify(jsonSocket));
    })
    //SI OCURRE UN ERROR
    .fail(function() {
      console.log( "error" );
      jsonSocket['text'] = 'Un usuario REGISTRO un nuevo Almacen';
      jsonSocket['action'] = '2';
      //status: TRUE,
      conn.send(JSON.stringify(jsonSocket));
    })
    //EJECUTA AL TERMINAR LA FUNCION YA SEHA ERROR O EXITO
    .always(function() {
        console.log( "completado" );
    });
    // Hacer otra cosa aquí ...
    // Asignar otra función de completado para la petición de más arriba
    jqxhr.always(function() {
    console.log( "completado segundo" );
    $("#respuesta").empty().append(alert);

    });
  });
});

/*
//Si necesitas hacer algo con las respuestas del servidor
//hacelas aqui.
const handleReturnedData = (data) => {
};
//Si necesitas hacer algo antes de enviar las
//consultas, hacelo aqui.
const beforeSending = () => {
  console.log("before");
};
//Si necesitas hacer algo despues de que terminen las
//consultas, hacelas aqui.
const afterSending = () => {
  console.log("after");
  //Insertara datos
};
function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
}
const makeRequests = async (data) => {
  beforeSending();
  const body = new FormData();
  body.append("data", JSON.stringify(data[prop]));
  const returned = await fetch("./get_data.php", { method: "POST", body });
  const result = await returned.json();//await JSON.parse(returned);
  handleReturnedData(result);
  afterSending();
};*/
</script>