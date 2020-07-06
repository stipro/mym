<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Tablesaw css -->
  <link href="./../../libs/tablesaw/tablesaw.css" rel="stylesheet" type="text/css" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="./../../libs/bootstrap-4.5.0/css/bootstrap.min.css" media="screen" />
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <title>Proveedores</title>
</head>

<body>
  <?php
  //Llamo Nav
  include('../nav.php');
  ?>

  <div class="container-fluid">
    <div class="shadow-sm p-3 mb-2 bg-white rounded">
      <h1>Bienvenido!</h1>
    </div>

    <div class="card text-left">
      <div class="card-header">


        <div class="row">
          <div class="col d-flex align-items-center">
            <h4 clas="d-flex">Proveedores</h4>
          </div>
          <div class="col d-flex justify-content-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              <svg class="bi bi-plus-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
                <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
              </svg>
              Nuevo
            </button>
          </div>

        </div>



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
                <input id="filrango" class="form-control" type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
              </div>

            </div>
          </div>
        </form>

        <hr>

        <div class="card-deck">
          <!-- Item 1-->
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
          <!-- Item 2 -->
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
          <!-- Item 3 -->
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
          <!-- Item 4 -->
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>
        <table class="tablesaw table mb-0" data-tablesaw-mode="stack">
          <thead>
            <tr>
              <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">RUC</th>
              <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Nombre</th>
              <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Razon Social</th>
              <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Direccion</th>
              <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">celular</th>
              <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Nombre</th>
              <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Razon Social</th>
              <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Direccion</th>
              <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">celular</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>12345678912</td>
              <td>Nombre1</td>
              <td>2009</td>
              <td>83%</td>
              <td>$2.7B</td>
              <td>1</td>
              <td>2009</td>
              <td>83%</td>
              <td>$2.7B</td>
            </tr>
            <tr>
              <td>98765432112</td>
              <td>Nombre2</td>
              <td>1997</td>
              <td>88%</td>
              <td>$2.1B</td>
              <td>2</td>
              <td>1997</td>
              <td>88%</td>
              <td>$2.1B</td>
            </tr>
            <tr>
              <td>45678932112</td>
              <td>Nombre3</td>
              <td>2012</td>
              <td>92%</td>
              <td>$1.5B</td>
              <td>3</td>
              <td>2012</td>
              <td>92%</td>
              <td>$1.5B</td>
            </tr>
            <tr>
              <td>15975315978</td>
              <td>Nombre4</td>
              <td>2011</td>
              <td>96%</td>
              <td>$1.3B</td>
              <td>4</td>
              <td>2011</td>
              <td>96%</td>
              <td>$1.3B</td>
            </tr>
            <tr>
              <td>95175345687</td>
              <td>Nombre5</td>
              <td>2013</td>
              <td>89%</td>
              <td>$1.2B</td>
              <td>5</td>
              <td>2013</td>
              <td>89%</td>
              <td>$1.2B</td>
            </tr>
            <tr>
              <td>85245678912</td>
              <td>Nombre5</td>
              <td>2013</td>
              <td>89%</td>
              <td>$1.2B</td>
              <td>5</td>
              <td>2013</td>
              <td>89%</td>
              <td>$1.2B</td>
            </tr>
          </tbody>
        </table>
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
  <?php
  include("./providers_create.php");
  ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
  <script src="./../../libs/bootstrap-4.5.0/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <!-- Tablesaw js -->
  <script src="./../../libs/tablesaw/tablesaw.js"></script>
  <!-- Init js -->
  <script src="./../../libs/tablesaw/tablesaw.init.js"></script>
  <script>
    // -------------------Listar personas------------
    var listar = (param) => {
      $.ajax({
        url: './../../controllers/controllerList.php',
        method: 'POST',
        data: {
          termino: param
        }
      }).done(function(data) {
        $('#div_tabla').html(data);
        prepararDatos();
      });
    }
    /*
    $(document).ready(function() {
        //CLICK Agregar Nuevo producto
        $("#btn_add").on('click', function(){
            
            //
            $.ajax({
                //indico el url que recibira y enviara datos
                url: './product_create.php',
                //Despues
                beforeSend: function () {

                },
                //
                success: function (rpta) {
                    $('#modal').append(rpta);
                    console.log('Acción ejecutada!');
                },
                //
                error: function () {

                },
                //
                complete: function() {

                },
            });
        })
    }); */
  </script>
</body>

</html>