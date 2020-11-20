<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--Stylesheet [ REQUIRED ]-->
    <link href="./../assets/css/base-table.css" rel="stylesheet">
    <!--Estilo Tabla [ REQUIRED ]
    <link href="./../assets/css/table.css" rel="stylesheet">-->
    <title>DISEÑOS</title>
</head>
<body>
    <!--<div class="table-responsive-md">-->
        <table class="table table-hover" role="table">
            <caption>Tiempo necesario para viajar desde Philadelphia</caption>
            <thead class="thead-dark" role="rowgroup">
                <tr role="row">
                    <th class="info import-0" scope="col">#</th>
                    <th class="info import-1" scope="col" role="columnheader">First Name</th>
                    <th class="info import-2" scope="col" role="columnheader">Last Name</th>
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
                <tr class="data-table" role="row">
                    <th class="info import-0" scope="row">1</th>
                    <td class="info import-1" role="cell">James</td>
                    <td class="info import-2" role="cell">Matman
                        <div class="options">
                        </div>
                    </td>
                    <td role="cell">Chief Sandwich Eater</td>
                    <td role="cell">Lettuce Green</td>
                    <td role="cell">Trek</td>
                    <td role="cell">Digby Green</td>
                    <td role="cell">January 13, 1979</td>
                    <td role="cell">Gotham City</td>
                    <td role="cell">3.1</td>
                    <td role="cell">RBX-12</td>
                </tr>
                <tr class="data-table" role="row">
                    <th class="info import-0" scope="row">2</th>
                    <td class="info import-1" role="cell">The</td>
                    <td class="info import-2" role="cell">Tick
                        <div class="options">
                        </div>
                    </td>
                    <td role="cell">Crimefighter Sorta</td>
                    <td role="cell">Blue</td>
                    <td role="cell">Wars</td>
                    <td role="cell">John Smith</td>
                    <td role="cell">July 19, 1968</td>
                    <td role="cell">Athens</td>
                    <td role="cell">N/A</td>
                    <td role="cell">Edlund, Ben (July 1996).</td>
                </tr>
                <tr class="data-table" role="row">
                    <th class="info import-0" scope="row">3</th>
                    <td class="info import-1" role="cell">Jokey</td>
                    <td class="info import-2" role="cell">Smurf
                    </td>
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
                    <th class="info import-0" scope="row">4</th>
                    <td class="info import-1" role="cell">Cindy</td>
                    <td class="info import-2" role="cell">Beyler
                    </td>
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
                    <th class="info import-0" scope="row">5</th>
                    <td class="info import-1" role="cell">Captain</td>
                    <td class="info import-2" role="cell">Cool
                    </td>
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
        <div>
            <button id="btn-modal-cancel-brand" type="button" class="btn btn-secondary" data-dismiss="modal">
                <!--ICONO-->
                <img src="./../assets/icons/icons-1.0.0-alpha5/info-square.svg" alt="" width="16" height="16" title="Cerrar">
            </button>
            <button id="btn-modal-cancel-brand" type="button" class="btn btn-secondary" data-dismiss="modal">
                <!--ICONO--><img src="./../assets/icons/icons-1.0.0-alpha5/pencil-square.svg" alt="" width="16" height="16" title="Cerrar">
            </button>
            <button id="btn-modal-cancel-brand" type="button" class="btn btn-secondary" data-dismiss="modal">
                <!--ICONO--><img src="./../assets/icons/icons-1.0.0-alpha5/trash.svg" alt="" width="16" height="16" title="Cerrar">
            </button>
        </div>
    <!--</div>-->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        hover = '<div class="grupo-btn">';
        hover+= '<button id="btn-modal-cancel-brand" type="button" class="btn btn-secondary" data-dismiss="modal">';
        hover+= '<!--ICONO--><img src="./../assets/icons/icons-1.0.0-alpha5/info-square.svg" alt="" width="16" height="16" title="Cerrar"></button>';
        hover+= '<button id="btn-modal-cancel-brand" type="button" class="btn btn-secondary" data-dismiss="modal">';
        hover+= '<!--ICONO--><img src="./../assets/icons/icons-1.0.0-alpha5/pencil-square.svg" alt="" width="16" height="16" title="Cerrar"></button>';
        hover+= '<button id="btn-modal-cancel-brand" type="button" class="btn btn-secondary" data-dismiss="modal">';
        hover+= '<!--ICONO--><img src="./../assets/icons/icons-1.0.0-alpha5/trash.svg" alt="" width="16" height="16" title="Cerrar"></button></div>';
        $( "tr" ).hover(
        function() {
            $( 'div' ).append( $( hover ) );
        }, function() {
            $( 'div' ).find( "div" ).last().remove();
        }
        );
        
        $( "tr.fade" ).hover(function() {
        $( this ).fadeOut( 100 );
        $( this ).fadeIn( 500 );
        });
    </script>
</body>
</html>