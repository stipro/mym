<?php
declare (strict_types = 1);
require_once('./../db/conexion.php');

class Warehouse extends Conexion
{
    /*
    public $intruc;
    public $strnombre;
    public $strDireccion;
    public $strRazSocial;
    public $intTelefono;
    public $intCelular;
    public $strCorreo;
    public $bolestad;
    public $strDescripcion;
*/
    public function __construct()
    {
        parent::__construct();
    }
    public function insert(string $strcodigo, string $strnombre, string $fotprecio, string $fotstock, string $strDescripcion)
    {
        try 
        {
            $alertsuccess = '<div class="alert alert-success" role="alert">
            
            </div>';
            $query  = "INSERT INTO productos(
                codigo_producto,
                nombre_producto,
                precio_producto,
                stock_producto,
                descripcion_producto
            ) 
            VALUES (:strcodigo, 
            :strnombre, 
            :fotprecio, 
            :fotstock, 
            :strDescripcion);";
            $result = $this->db->prepare($query);
            $result -> bindParam(':strcodigo', $strcodigo, PDO::PARAM_STR);
            $result -> bindParam(':strnombre', $strnombre, PDO::PARAM_STR);
            $result -> bindParam(':fotprecio', $fotprecio, PDO::PARAM_STR);
            $result -> bindParam(':fotstock', $fotstock, PDO::PARAM_STR);
            $result -> bindParam(':strDescripcion', $strDescripcion, PDO::PARAM_STR);
            $sqlsuccess = $result -> execute();
            if($sqlsuccess) // MENSAJE DE EXITO
            {
                echo '<div class="alert alert-success" role="alert">
                Se realizo correctamente el registro.
                </div>';
            }
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger" role="alert">
            Ocurrio un problema, llamar a sistemas '.$e->getMessage().'
            </div>';
        }
    }
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

    public function getAll(): array
    {
        $query = "SELECT * FROM almacenes ORDER BY nombre_almacen";
        return $this->ConsultaSimple($query);
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

    public function showTable(array $query): string
    {
        $html = '';
        if (count($query)) {
            $html = '<table class="table table-striped" id="table">
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
            $html .= '  </tbody>
                    </table>';
        } else {
            $html = '<h4 class="text-center">No hay datos...</h4>';
        }
        return $html;
    }
}
