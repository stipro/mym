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
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="./../../libs/nifty/css/nifty-demo-icons.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!--FooTable [ OPTIONAL ]-->
    <link href="./../../libs/nifty/fooTable/css/footable.core.css" rel="stylesheet">
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
      <div class="panel">
				<div class="panel-heading">
				  <h3 class="panel-title">Sample Toolbar</h3>
				</div>
				<!--Data Table-->
				<!--===================================================-->
				<div class="panel-body">
					<div class="d-flex row">
            <div class="col-sm">
              <div class="d-flex align-items-center">
                <div class="bd-highlight">
                  <button type="button" id="demo-btn-addrow" class="btn btn-primary d-flex align-items-center"><i class="demo-pli-add"></i>Agregar</button>
                </div>
                <div class="p-2 bd-highlight">
                  <button type="button" class="btn btn-outline-secondary"><i class="demo-pli-printer"></i></button>
                </div>
                
					      <div class="btn-group" role="group" aria-label="example">
					        <button class="btn btn-outline-secondary"><i class="demo-pli-exclamation"></i></button>
					        <button class="btn btn-outline-secondary"><i class="demo-pli-recycling"></i></button>
					      </div>
					    </div>
            </div>
            <div class="col-sm">
              <div class="d-flex align-items-center justify-content-end">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                  <button type="button" class="btn btn-secondary">
                    <div class="form-group mb-0">
                      <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                    </div>
                  </button>
                  <button type="button" class="btn btn-secondary"><i class="demo-pli-download-from-cloud"></i></button>

                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="demo-pli-gear"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      <a class="dropdown-item" href="#">Dropdown link</a>
                      <a class="dropdown-item" href="#">Dropdown link</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
					  <div class="table-responsive">
					    <table class="table table-striped">
					      <thead>
					        <tr>
					          <th class="text-center">Invoice</th>
					                        <th>User</th>
					                        <th>Order date</th>
					                        <th>Amount</th>
					                        <th>Status</th>
					                        <th>Tracking Number</th>
					                    </tr>
					                </thead>
					                <tbody>
					                    <tr>
					                        <td><a class="btn-link" href="#"> Order #53431</a></td>
					                        <td>Steve N. Horton</td>
					                        <td><span class="text-muted"><i class="demo-pli-clock"></i> Oct 22, 2014</span></td>
					                        <td>$45.00</td>
					                        <td>
					                            <div class="label label-table label-success">Paid</div>
					                        </td>
					                        <td>-</td>
					                    </tr>
					                    <tr>
					                        <td><a class="btn-link" href="#"> Order #53432</a></td>
					                        <td>Charles S Boyle</td>
					                        <td><span class="text-muted"><i class="demo-pli-clock"></i> Oct 24, 2014</span></td>
					                        <td>$245.30</td>
					                        <td>
					                            <div class="label label-table label-info">Shipped</div>
					                        </td>
					                        <td><i class="demo-pli-mine"></i> CGX0089734531</td>
					                    </tr>
					                    <tr>
					                        <td><a class="btn-link" href="#"> Order #53433</a></td>
					                        <td>Lucy Doe</td>
					                        <td><span class="text-muted"><i class="demo-pli-clock"></i> Oct 24, 2014</span></td>
					                        <td>$38.00</td>
					                        <td>
					                            <div class="label label-table label-info">Shipped</div>
					                        </td>
					                        <td><i class="demo-pli-mine"></i> CGX0089934571</td>
					                    </tr>
					                    <tr>
					                        <td><a class="btn-link" href="#"> Order #53434</a></td>
					                        <td>Teresa L. Doe</td>
					                        <td><span class="text-muted"><i class="demo-pli-clock"></i> Oct 15, 2014</span></td>
					                        <td>$77.99</td>
					                        <td>
					                            <div class="label label-table label-info">Shipped</div>
					                        </td>
					                        <td><i class="demo-pli-mine"></i> CGX0089734574</td>
					                    </tr>
					                    <tr>
					                        <td><a class="btn-link" href="#"> Order #53435</a></td>
					                        <td>Teresa L. Doe</td>
					                        <td><span class="text-muted"><i class="demo-pli-clock"></i> Oct 12, 2014</span></td>
					                        <td>$18.00</td>
					                        <td>
					                            <div class="label label-table label-success">Paid</div>
					                        </td>
					                        <td>-</td>
					                    </tr>
					                </tbody>
					            </table>
					        </div>
					    </div>
					    <!--===================================================-->
					    <!--End Data Table-->
					
					</div>
      </div>
      <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Expand / Collapse All Rows</h3>
					            </div>
					
					            <!-- Foo Table - Expand / Collapse All Rows -->
					            <!--===================================================-->
					            <div class="panel-body">
					                <div class="pad-btm">
					                    <button id="demo-foo-collapse" class="btn btn-info">Collapse All</button>
					                    <button id="demo-foo-expand" class="btn btn-warning">Expand All</button>
					                </div>
					                <table id="demo-foo-col-exp" class="table toggle-circle">
					                    <thead>
					                        <tr>
					                            <th data-toggle="true">First Name</th>
					                            <th>Last Name</th>
					                            <th data-hide="all">Job Title</th>
					                            <th data-hide="all">DOB</th>
					                            <th data-hide="all">Status</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                        <tr>
					                            <td>Isidra</td>
					                            <td>Boudreaux</td>
					                            <td>Traffic Court Referee</td>
					                            <td>22 Jun 1972</td>
					                            <td><span class="label label-table label-success">Active</span></td>
					                        </tr>
					                        <tr>
					                            <td>Shona</td>
					                            <td>Woldt</td>
					                            <td>Airline Transport Pilot</td>
					                            <td>3 Oct 1981</td>
					                            <td><span class="label label-table label-dark">Disabled</span></td>
					                        </tr>
					                        <tr>
					                            <td>Granville</td>
					                            <td>Leonardo</td>
					                            <td>Business Services Sales Representative</td>
					                            <td>19 Apr 1969</td>
					                            <td><span class="label label-table label-danger">Suspended</span></td>
					                        </tr>
					                        <tr>
					                            <td>Easer</td>
					                            <td>Dragoo</td>
					                            <td>Drywall Stripper</td>
					                            <td>13 Dec 1977</td>
					                            <td><span class="label label-table label-success">Active</span></td>
					                        </tr>
					                        <tr>
					                            <td>Maple</td>
					                            <td>Halladay</td>
					                            <td>Aviation Tactical Readiness Officer</td>
					                            <td>30 Dec 1991</td>
					                            <td><span class="label label-table label-danger">Suspended</span></td>
					                        </tr>
					                        <tr>
					                            <td>Maxine</td>
					                            <td><a href="#">Woldt</a></td>
					                            <td><a href="#">Business Services Sales Representative</a></td>
					                            <td>17 Oct 1987</td>
					                            <td><span class="label label-table label-dark">Disabled</span></td>
					                        </tr>
					                        <tr>
					                            <td>Lorraine</td>
					                            <td>Mcgaughy</td>
					                            <td>Hemodialysis Technician</td>
					                            <td>11 Nov 1983</td>
					                            <td><span class="label label-table label-dark">Disabled</span></td>
					                        </tr>
					                        <tr>
					                            <td>Lizzee</td>
					                            <td><a href="#">Goodlow</a></td>
					                            <td>Technical Services Librarian</td>
					                            <td>1 Nov 1961</td>
					                            <td><span class="label label-table label-danger">Suspended</span></td>
					                        </tr>
					                        <tr>
					                            <td>Judi</td>
					                            <td>Badgett</td>
					                            <td>Electrical Lineworker</td>
					                            <td>23 Jun 1981</td>
					                            <td><span class="label label-table label-success">Active</span></td>
					                        </tr>
					                    </tbody>
					                </table>
					            </div>
					            <!--===================================================-->
					            <!-- End Foo Table - Expand / Collapse All Rows -->
					
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