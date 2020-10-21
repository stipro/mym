<?php
declare (strict_types = 1);
require_once('./../db/conexion.php');

class Brand extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }
    //REGISTRA
    public function insert(string $strName, string $strDescription, int $blaState)
    {
        try 
        {
            $alertsuccess = '<div class="alert alert-success" role="alert">            
            </div>';
            $query  = "INSERT INTO almacenes(
                nombre_almacen,
                descripcion_almacen,
                estado_almacen
            ) 
            VALUES (
                :strName, 
                :strDescription,
                :blaState);";
            $result = $this->db->prepare($query);
            $result -> bindParam(':strName', $strName, PDO::PARAM_STR);
            $result -> bindParam(':strDescription', $strDescription, PDO::PARAM_STR);
            $result -> bindParam(':blaState', $blaState, PDO::PARAM_STR);
            $sqlsuccess = $result -> execute();
            if($sqlsuccess) // MENSAJE DE EXITO
            {
                return $replys = 'Se realizo correctamente el registro.';
            }
        } catch (PDOException $e) {
            echo 'Ocurrio un problema, llamar a sistemas '.$e->getMessage();
        }
    }
    //ELIMINA
    public function delete(int $id)
    {
        error_reporting(0);
        try {
            $query  = "DELETE FROM provedores WHERE nIdAlm=:id;";
            $result = $this->db->prepare($query);
            $result->execute(array(':id' => $id));
            echo 'BIEN';
        } catch (PDOException $e) {
            echo 'ERROR';
        }
    }
    //EDITA
    public function edit(int $id, int $ingreso, int $egreso, string $registro, string $factura, string $nombre, string $observacion)
    {
        error_reporting(0);
        try {
            $query  = "UPDATE provedores SET nCodAlm=:codigo, nIngAlm=:ingreso, nEgrAlm=:egreso, fRegAlm=:fecha, nNFactAlm=:factura, cNomAlm=nombre, cObsAlm=:observacion WHERE nIdAlm=:id;";
            $result = $this->db->prepare($query);
            $result->execute(array(':id' => $id, ':codigo' => $ingreso, ':ingreso' => $ingreso, ':egreso' => $egreso, ':fecha' => $registro, ':factura' => $factura, 'nombre' => $nombre, ':observacion' => $observacion));
            if ($result->rowCount()) {
                echo 'BIEN';
            } else {
                echo 'IGUAL';
            }
        } catch (PDOException $e) {
            echo 'ERROR';
        }

    }
    //GET DATA OPTIONS
    public function getAll(): array
    {
        //$query = "SELECT * FROM almacenes ORDER BY nombre_almacen";
        $query = "SELECT * FROM almacenes";
        return $this->ConsultaSimple($query);
    }
    //GET NAME WAREHOUSE
    public function getNombre($table): array
    {
        $vtable = 'marca';
        $state = '1';
        $where = "WHERE estado_marca = :state";
        $array = array(':state' =>  $state);
        return $this->ConsultaCompleja( $where, $array, $table, $vtable);
    }
    public function getSearch(string $termino): array
    {
        $where = "WHERE nombre LIKE :nombre || pais LIKE :factura ORDER BY nombre ASC";
        $array = array(':nombre' => '%' . $termino . '%', ':factura' => '%' . $termino . '%');
        return $this->ConsultaCompleja($where, $array);
    }

    public function getPagination(): array
    {
        $query = "SELECT COUNT(*) FROM almacenes;";
        return array(
            'filasTotal'  => intval($this->db->query($query)->fetch(PDO::FETCH_BOTH)[0]),
            'filasPagina' => 5,
        );
    }

    public function showSelect(array $query): string
    {
        $html = '';
        if (count($query)) {
            $html = '<option data-id="">Selecciona un Marca</option>';
            foreach ($query as $value){
                $html .= '<option data-id="'.$value['id_marca'].'" data-tokens="01">' . $value['nombre_marca'] . '</option>';
            }
        } else {
            $html = '<option data-id="">No hay datos...</option> <h4 class="text-center"></h4>';
        }
        return $html;
    }

    public function showTable(array $query): string
    {
        $html = '';
        if (count($query)) {
            $html = '<div class="table-responsive-md">
                        <table class="table table-striped" id="table">
                            <thead>
                                <!--<th scope="col">#</th>-->
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </thead>
                            <tbody>';
            foreach ($query as $value){
                $html .= '<tr>
                        <td class="d-none">' . $value['id_almacen'] . '</td>
                        <td>' . $value['nombre_almacen'] . '</td>
                        <td>' . $value['descripcion_almacen'] . '</td>
                        <td>' . $value['estado_almacen'] . '</td>
                        <td class="text-center">
                            <button title="Editar este usuario" class="editar btn btn-secondary" data-toggle="modal" data-target="#ventanaModal">
                                <img src="./../../assets/icons/icons-1.0.0-alpha5/pencil.svg" alt="" width="16" height="16" title="modificar">
                            </button>

                            <button title="Eliminar este usuario" type="button" class="eliminar btn btn-danger" data-toggle="modal" data-target="#ventanaModal">
                                <img src="./../../assets/icons/icons-1.0.0-alpha5/trash.svg" alt="" width="16" height="16" title="eliminar">
                                <!--<i class="fa fa-trash-o"></i>-->
                            </button>
                        </td>
                        </tr>
                         ';
            }
            $html .= '      </tbody>
                        </table>
                    </div>';
        } else {
            $html = '<h4 class="text-center">No hay datos...</h4>';
        }
        return $html;
    }
}