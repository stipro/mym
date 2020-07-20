<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php
        //LLamo a mi nav
        include('./views/nav.php');
    ?>
    <div class="container-fluid">
    <h3>Sistema complementario, le da la Bienvenida</h3>
    <!-- Button trigger modal -->
        <div class="card-deck">
            <!-- CARD 1 -->
            <div class="card">
                <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Comisiones</h4>
                    <p class="card-text">
                    Modulo para generar, modificar, eliminar y subir las comisiones de los Vendedores
                    </p>
                    <a href=".//comision/main.php" class="btn btn-primary">Ir Comisiones</a>
                </div>
            </div>
            <!-- CARD 2 -->
            <div class="card">
                <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Inventario</h4>
                    <p class="card-text">
                    Modulo Inventario, sirve para inventariar los items de la corporativa CorpM&M
                    </p>
                    <a href=".//inventario/main.php" class="btn btn-primary">Ir Inventarios</a>
                </div>
            </div>
            <!-- CARD 2 -->
            <div class="card">
                <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Transporte</h4>
                    <p class="card-text">
                    Modulo Inventario, sirve para inventariar los items de la corporativa CorpM&M
                    </p>
                    <a href=".//transporte/main.php" class="btn btn-primary">Ir Inventarios</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>