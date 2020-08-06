<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <title>Almacen</title>
</head>
<body>
    <?php
        //Llamo Nav
        include ('../nav.php');
    ?>
<div class="container-fluid">
  <div class="shadow-sm p-3 mb-2 bg-white rounded">
    <h1>Bienvenido!</h1>
  </div>
  <div id="actions"></div>
  <div class="card text-left">
    <div class="card-header">
        Almacenes
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#md_cAlmacen">
        Nuevo
        </button>
    </div>
    <div class="card-body">
      <!--<h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->

        <div class="form-row">
          <div class="col">
            <!-- Almacen -->
            <div class="form-group">                                        
              <label for="filAlm"><strong>Almacen</strong></label>
              <select id="filAlm" class="selectpicker form-control" data-live-search="true">
                <option data-tokens="">Selecciona un Almacen</option>
                <option data-tokens="Recepción">Recepción</option>
                <option data-tokens="Sistemas">Sistemas</option>
              </select>
            </div>
          </div>
          <div class="col">
            <!-- Producto -->
            <div class="form-group">                                        
              <label for="filCodNom"><strong>Proveedor</strong></label>
              <select id="filCodNom" class="selectpicker form-control" data-live-search="true">
                <option data-tokens="">Selecciona o busque un Producto</option>
                <option data-tokens="Lapicero">Lapicero</option>
                <option data-tokens="Borrador">Borrador</option>
                <option data-tokens="Papel">Papel</option>
              </select>
            </div>

          </div>
        </div>

      <form>
        <div class="row">
          <div class="col-sm">
            <!---->
            <div class="form-group">                                        
              <label for="filcat"><strong>Filtrar por categoria</strong></label>
              <select id="filcat" class="selectpicker form-control" data-live-search="true">
                <option data-tokens="">Selecciona una categoría</option>
                <option data-tokens="Accesorios">Accesorios</option>
                <option data-tokens="Equipos">Equipos</option>
                <option data-tokens="Repuestos">Repuestos</option>
              </select>
            </div>

          </div>
          <div class="col-sm">
            <!---->
            <div class="form-group">                                        
              <label for="filrango"><strong>Rango de Fecha</strong></label>
              <input id="filrango" class="form-control"  type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
            </div>

          </div>
        </div>
      </form>

      <hr>
      <div id="div_tabla">
      </div>
    </div>
    <div class="card-footer text-muted">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
    </div>
  </div>
</div>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <?php
    include ("./warehouse_create.php");
    ?>
    <script>
    $(document).ready(function() {
      //CLICK Agregar Nuevo producto
      listar('');
    }); 
      // -------------------Listar personas------------
      var listar = (param) => {
        var jqxhr = $.ajax({
          beforeSend: function(){
            alertPrimary = '<div class="alert alert-primary" role="alert">';
            alertPrimary+= 'Se envio estos datos!';
            alertPrimary+= '</div>';
            //$("#respuesta").empty().append(alertPrimary);
          },
          url: './../../controllers/controllerListWarehouse.php',
          type: 'POST',
          data: param,
        })
        //RECIBIENDO RESPUESTA
        .done(function(data) {
          $("#div_tabla").append(data);
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
      }

    </script>
</body>
</html>