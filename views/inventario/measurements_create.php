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
          <div id="cont-nombre" class="form-group col-sm">
            <div id="alertNombre" class="valid-feedback">
              Looks good!
            </div>
            <label for="nombre_measurements" class="form-label">Nombre *</label>
            <input type="text" class="form-control" id="nombre_measurements" placeholder="Nombre" value="" data-name="Nombre">

          </div>
          <div id="cont-abreviatura" class="form-group col-sm">
            <div id="alertAbreviatura" class="valid-feedback">
              Looks good!
            </div>
            <label for="abreviatura_measurements" class="form-label">Abreviatura *</label>
            <input type="text" class="form-control" id="abreviatura_measurements" placeholder="Abr." data-name="Abreviatura">
          </div>
          <div id="cont-estado" class="form-group col-sm">
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
<script>
//Ejecutamos cuando pagina este lista
$(document).ready(function() {
  console.log( "document loaded" );
  ////DOM elements
  let btnCreateMeasurements = document.getElementById('btn-measurements-cCreate');
  let btnCancelMeasurements = document.getElementById('btn-measurements-cCancel');
  var iptnameMeasurements = document.getElementById("nombre_measurements");
  var iptabreMeasurements = document.getElementById("abreviatura_measurements");

  var contNombre = document.getElementById("cont-nombre");
  var contAbreviatura = document.getElementById("cont-abreviatura");

  btnCreateMeasurements.addEventListener('click', function(){
    //EJECUTA
    rptValidar = validar(iptnameMeasurements, contNombre);
    rptValidar = validar(iptabreMeasurements, contAbreviatura);
    console.log(rptValidar);
  });

  btnCancelMeasurements.addEventListener('click', function(){
    console.log('Hola, cancelado');
    //EJECUTA
    //getdataMeasurements('');
  });

  function validar(data, datat) {
    dvalue = data.value;
    //OBTENEMOS VALOR DATA
    ddataName = data.getAttribute('data-name');
    //OBTENEMOS EL NODO HIJO
    ultimo = document.getElementById("alert" + ddataName);
      //ELIMINAMOS EL NODO HIJO
      datat.removeChild(ultimo);
    //COMPROVAMOS SI ESTA VACIO LOS INPUT
    if (dvalue.length == 0) {

      var element = data;
      element.classList.add("is-invalid");
      var newItem = document.createElement("div");
      newItem.setAttribute("id", 'alert' + ddataName);
      var textnode = document.createTextNode("Ingrese " + ddataName);
      newItem.appendChild(textnode);
      newItem.classList.add("invalid-feedback");
      datat.appendChild(newItem);
      return false;
    } 
    
  }

  const getdataMeasurements = async (data) => {
    //console.log('Dato recibido ' + data);
    console.log(typeof data);
    /*
      beforeSendingl();
      const body = new FormData();
      body.append("data", data);
      const returnMarca = await fetch("./../../controllers/controllerMeasurements.php", { method: "POST", body});
      const resultMarca = await returnMarca.json(); //await JSON.parse(returned);
      dataaaa(resultMarca);
      afterSendingl();
      */
  };
/*
  //Si necesitas hacer algo antes de enviar las
  //consultas, hacelo aqui.
  const beforeSendingl = () => {
    //console.log("before");
  };
  //Si necesitas hacer algo con las respuestas del servidor
  //hacelas aqui.
  const dataaaa = (data) => {
      itableArticle.innerHTML = data;
      //$( "#idtableArticle" ).append( data );
  }
  //Si necesitas hacer algo despues de que terminen las
  //consultas, hacelas aqui.
  const afterSendingl = () => {
    //console.log("after");
  };
  */
});


//Activamos modal
$(document).on('click', '#btn_mdl_article', function() {

});

</script>