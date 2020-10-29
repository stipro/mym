<?php
declare (strict_types = 1);
require_once('./../db/conexion.php');

class Article extends Conexion
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
    public function insert($strprovedor, $strcategoria, $strmarca, string $strcodigo, string $strnombre, float $fotprecio, int $fotstock, string $strcaracteristica, string $strdescripcion, $strumedida, $strdateregistro)
    {
        //return $strdateregistro;
        try 
        {
            $query = "INSERT INTO articulos(
                id_provedor,
                id_categoria,
                id_marca,
                codigo_articulo,
                nombre_articulo,
                precio_articulo,
                stock_articulo,
                caracteristica_articulo,
                descripcion_articulo,
                id_uniMedida,
                registro_articulo) 
            VALUES (
                :strprovedor,
                :strcategoria,
                :strmarca,
                :strcodigo,
                :strnombre, 
                :fotprecio, 
                :fotstock, 
                :strcaracteristica,
                :strdescripcion,
                :strumedida,
                :strdateregistro);";
            $result = $this->db->prepare($query);
            $result -> bindParam(':strprovedor', $strprovedor, PDO::PARAM_INT);
            $result -> bindParam(':strcategoria', $strcategoria, PDO::PARAM_INT);
            $result -> bindParam(':strmarca', $strmarca, PDO::PARAM_INT);
            $result -> bindParam(':strcodigo', $strcodigo, PDO::PARAM_STR);
            $result -> bindParam(':strnombre', $strnombre, PDO::PARAM_STR);
            $result -> bindParam(':fotprecio', $fotprecio, PDO::PARAM_STR);
            $result -> bindParam(':fotstock', $fotstock, PDO::PARAM_INT);
            $result -> bindParam(':strcaracteristica', $strcaracteristica, PDO::PARAM_STR);
            $result -> bindParam(':strdescripcion', $strdescripcion, PDO::PARAM_STR);
            $result -> bindParam(':strumedida', $strumedida, PDO::PARAM_STR);
            $result -> bindParam(':strdateregistro', $strdateregistro, PDO::PARAM_STR);
            $sqlsuccess = $result -> execute();
            //OBTENEMOS ID
            //$lastvenIdsql = $db->lastInsertId();
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
        $query = "SELECT * FROM articulos ORDER BY nombre_articulo";
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
        $query = "SELECT COUNT(*) FROM productos;";
        return array(
            'filasTotal'  => intval($this->db->query($query)->fetch(PDO::FETCH_BOTH)[0]),
            'filasPagina' => 5,
        );
    }

    public function showTable(array $array): string
    {
        $html = '';
        if (count($array)) {
            $html = '<table class="table table-striped" id="table">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">codigo</th>
                            <th scope="col">nombre</th>
                            <th scope="col">precio</th>
                            <th scope="col">stock</th>
                            <th scope="col">caracteristica</th>
                            <th scope="col">descripcion</th>
                            <th scope="col">Acciones</th>
                        </thead>
                        <tbody>';
            foreach ($array as $value){
                $html .='<tr>
                            <td class="d-none">' . $value['id_articulo'] . '</td>
                            <td>1</td>
                            <td>' . $value['codigo_articulo'] . '</td>
                            <td>' . $value['nombre_articulo'] . '</td>
                            <td>' . $value['precio_articulo'] . '</td>
                            <td>' . $value['stock_articulo'] . '</td>
                            <td>' . $value['caracteristica_articulo'] . '</td>
                            <td>' . $value['descripcion_articulo'] . '</td>
                        <td class="text-center">
                            <button title="Editar este articulo" class="editar btn btn-secondary" data-toggle="modal" data-target="#ventanaModal">
                                 <i class="fa fa-pencil-square-o"></i>
                            </button>

                            <button title="Eliminar este articulo" type="button" class="eliminar btn btn-danger" data-toggle="modal" data-target="#ventanaModal">
                                <i class="fa fa-trash-o"></i>
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
