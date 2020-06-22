<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Productos</title>
</head>
<body>
    <!-- Button trigger modal -->
    <button type="button" id="btn_add" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Agregar
    </button>
    <div id="modal" class="modal">
    </div>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./../../assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
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
    }); 
    </script>
</body>
</html>