<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--Stylesheet [ REQUIRED ]-->
    <link href="./../../assets/css/base.css" rel="stylesheet">
    <!--Estilo Tabla [ REQUIRED ]-->
    <link href="./../../assets/css/table.css" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="./../../libs/nifty/css/nifty-demo-icons.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!--FooTable [ OPTIONAL ]-->
    <link href="./../../libs/FooTable/css/footable.bootstrap.min.css" rel="stylesheet">
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
  <div id="actions" class="container">
    <div class="row">
      <div id="gif" class="col-3">
      </div>
      <div id="typing" class="col">
      </div>
    </div>
  </div>
  <div class="card text-left">
    <div class="card-header">
        Almacenes
        <!-- Button trigger modal -->
        <button id="md_cAlmacenes" type="button" class="btn btn-primary" data-toggle="modal" data-target="#md_cAlmacen">
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
    <div class="table-responsive-md">
        <table class="table table-hover" role="table">
            <caption>Tiempo necesario para viajar desde Philadelphia</caption>
            <thead class="thead-dark" role="rowgroup">
                <tr role="row">
                    <th scope="col">#</th>
                    <th scope="col" role="columnheader">First Name</th>
                    <th scope="col" role="columnheader">Last Name</th>
                    <th scope="col" role="columnheader">Job Title</th>
                    <th scope="col" role="columnheader">Favorite Color</th>
                    <th scope="col" role="columnheader">Wars or Trek?</th>
                    <th scope="col" role="columnheader">Secret Alias</th>
                    <th scope="col" role="columnheader">Date of Birth</th>
                    <th scope="col" role="columnheader">Dream Vacation City</th>
                    <th scope="col" role="columnheader">GPA</th>
                    <th scope="col" role="columnheader">Arbitrary Data</th>
                </tr>
            </thead>
            <tbody role="rowgroup">
                <tr role="row">
                    <th scope="row">1</th>
                    <td role="cell">
                    <div>
                    James
                    </div>
                    <div>
                    </div>
                    </td>
                    <td role="cell">Matman</td>
                    <td role="cell">Chief Sandwich Eater</td>
                    <td role="cell">Lettuce Green</td>
                    <td role="cell">Trek</td>
                    <td role="cell">Digby Green</td>
                    <td role="cell">January 13, 1979</td>
                    <td role="cell">Gotham City</td>
                    <td role="cell">3.1</td>
                    <td role="cell">RBX-12</td>
                </tr>
                <tr role="row">
                    <th scope="row">2</th>
                    <td role="cell">The</td>
                    <td role="cell">Tick</td>
                    <td role="cell">Crimefighter Sorta</td>
                    <td role="cell">Blue</td>
                    <td role="cell">Wars</td>
                    <td role="cell">John Smith</td>
                    <td role="cell">July 19, 1968</td>
                    <td role="cell">Athens</td>
                    <td role="cell">N/A</td>
                    <td role="cell">Edlund, Ben (July 1996).</td>
                </tr>
                <tr role="row">
                    <th scope="row">3</th>
                    <td role="cell">Jokey</td>
                    <td role="cell">Smurf</td>
                    <td role="cell">Giving Exploding Presents</td>
                    <td role="cell">Smurflow</td>
                    <td role="cell">Smurf</td>
                    <td role="cell">Smurflane Smurfmutt</td>
                    <td role="cell">Smurfuary Smurfteenth, 1945</td>
                    <td role="cell">New Smurf City</td>
                    <td role="cell">4.Smurf</td>
                    <td role="cell">One</td>
                </tr>
                <tr role="row">
                    <th scope="row">4</th>
                    <td role="cell">Cindy</td>
                    <td role="cell">Beyler</td>
                    <td role="cell">Sales Representative</td>
                    <td role="cell">Red</td>
                    <td role="cell">Wars</td>
                    <td role="cell">Lori Quivey</td>
                    <td role="cell">July 5, 1956</td>
                    <td role="cell">Paris</td>
                    <td role="cell">3.4</td>
                    <td role="cell">3451</td>
                </tr>
                <tr role="row">
                    <th scope="row">5</th>
                    <td role="cell">Captain</td>
                    <td role="cell">Cool</td>
                    <td role="cell">Tree Crusher</td>
                    <td role="cell">Blue</td>
                    <td role="cell">Wars</td>
                    <td role="cell">Steve 42nd</td>
                    <td role="cell">December 13, 1982</td>
                    <td role="cell">Las Vegas</td>
                    <td colspan="2" role="cell">1.9</td>
                    <!--<td role="cell">Under the couch</td>-->
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th scope="row">4</th>
                    <th scope="row">Promedio</th>
                    <th class="pie-elem">1 h 24 min</th>
                    <th class="pie-elem">1 h 22 min</th>
                    <th class="pie-elem">6 h 54 min</th>
                    <th class="pie-elem">1 h 24 min</th>
                    <th class="pie-elem">1 h 22 min</th>
                    <th class="pie-elem">6 h 54 min</th>
                    <th class="pie-elem">1 h 24 min</th>
                    <th class="pie-elem">1 h 22 min</th>
                    <th class="pie-elem">6 h 54 min</th>
                </tr>
            </tfoot>
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
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!--FooTable [ OPTIONAL ]-->
    <script src="./../../libs/nifty/fooTable/js/footable.all.min.js"></script>


    <!--FooTable Example [ SAMPLE ]-->
    <script src="./../../libs/nifty/fooTable/js/tables-footable.js"></script>
    <?php
    include ("./warehouse_create.php");
    ?>
    <script>
    $(document).ready(function() {
      var jWareHouse;
      var jsonWareHouse;
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
          jWareHouse = JSON.parse(data);
          //SEPARAMOS EL JSON, TABLE
          jsonWareHouse = jWareHouse[0];
          tableWareHouse = jWareHouse[1];
          console.log(jsonWareHouse);
          $("#div_tabla").empty().append(tableWareHouse);
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