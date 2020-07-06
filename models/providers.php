<?php
declare (strict_types = 1);
require_once('./../db/conexion.php');

class Proveedor extends Conexion
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
    public function insert(int $intruc, string $strnombre, string $strRazSocial, string $strDireccion, int $intTelefono, int $intCelular, string $strCorreo, string $strDescripcion, string $bolestad)
    {
        try 
        {
            $query  = "INSERT INTO provedores VALUES (null, :intruc, :strnombre, :strRazSocial, :strDireccion, :intTelefono, :intCelular, :strCorreo, :strDescripcion, :bolestad);";
            $result = $this->db->prepare($query);
            $result->execute(array(':intruc' => $intruc, ':strnombre' => $strnombre, ':strRazSocial' => $strRazSocial, ':strDireccion' => $strDireccion, ':intTelefono' => $intTelefono, ':intCelular' => $intCelular,':strCorreo' => $strCorreo, ':strDescripcion' => $strDescripcion, ':bolestad' => $bolestad));
            echo 'BIEN';
        } catch (PDOException $e) {
            echo 'ERROR'.$e->getMessage();;
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

    public function getAll(int $desde, int $filas): array
    {
        $query = "SELECT * FROM provedores ORDER BY cNomAlm LIMIT {$desde},{$filas}";
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
        $query = "SELECT COUNT(*) FROM provedores;";
        return array(
            'filasTotal'  => intval($this->db->query($query)->fetch(PDO::FETCH_BOTH)[0]),
            'filasPagina' => 5,
        );
    }

    public function showTable(array $array): string
    {
        $html = '';
        if (count($array)) {
            $html = '   <table class="table table-striped" id="table">
                        <thead>
                            <th class="d-none"></th>
                            <th>CODIGO</th>
                            <th>INGRESOS</th>
                            <th>EGRESOS</th>
                            <th>FECHA DE REGISTRO</th>
                            <th>N° DE FACTURA</th>
                            <th>NOMBRE</th>
                            <th>OBSERVACION</th>
                        </thead>

                        <tbody>
                     ';
            foreach ($array as $value) {
                $html .= '  <tr>
                        <td class="d-none">' . $value['nIdAlm'] . '</td>
                        <td>' . $value['nCodAlm'] . '</td>
                        <td>' . $value['nIngAlm'] . '</td>
                        <td>' . $value['nEgrAlm'] . '</td>
                        <td>' . $value['fRegAlm'] . '</td>
                        <td>' . $value['nNFacAlm'] . '</td>
                        <td>' . $value['cNomAlm'] . '</td>
                        <td>' . $value['cObsAlm'] . '</td>
                        <td class="text-center">
                            <button title="Editar este usuario" class="editar btn btn-secondary" data-toggle="modal" data-target="#ventanaModal">
                                 <i class="fa fa-pencil-square-o"></i>
                            </button>

                            <button title="Eliminar este usuario" type="button" class="eliminar btn btn-danger" data-toggle="modal" data-target="#ventanaModal">
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
