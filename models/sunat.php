<?php
declare (strict_types = 1);
require_once('./../db/conexion.php');

class Sunat extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }
    //REGISTRA
    public function insert($numRuc, int $codComp, string $numSerie, int $numero, $fechaEmision, float $monto, string $estadoCp, string $estadoRuc, string $condDomiRuc)
    {
        /*
                        //COMPROBAR DATOS DUPLICADOS
                        $existenteCol = $conexion->prepare("SELECT a.*, b.*, tvz.*, tz.NZON
                        FROM t002col AS a 
                        LEFT JOIN t00ven AS b
                        ON a.NIDCOL = b.FIDCOL
                        LEFT JOIN tasi_ven_zon AS tvz
                        ON tvz.FIDVEN = b.NIDVEN
                        LEFT JOIN tzona AS tz
                        ON tz.NIDZON = tvz.FIDZON
                        WHERE a.VPNOCOL = :pnombre AND a.VAPACOL = :papellido AND a.VAMACOL = :sapellido");
                        $existenteCol->bindValue(':papellido',$papellido);
                        $existenteCol->bindValue(':sapellido',$sapellido);
                        $existenteCol->bindValue(':pnombre',$pnombre);
                        $existenteCol->execute();
                        $resexistenteCol = $existenteCol->fetch();*/
        try
        {
            $query  = "INSERT INTO validacion_documentos(
                ruc_documento,
                tipo_documento,
                serie_documento,
                numero_documento,
                fecemi_documento,
                nimporte_documento,
                estcom_documento,
                estcon_documento,
                condom_documento
            ) 
            VALUES (
                :numRuc, 
                :codComp,
                :numSerie,
                :numero,
                :fechaEmision,
                :monto,
                :estadoCp,
                :estadoRuc,
                :condDomiRuc);";
            $result = $this->db->prepare($query);
            $result -> bindParam(':numRuc', $numRuc, PDO::PARAM_INT);
            $result -> bindParam(':codComp', $codComp, PDO::PARAM_STR);
            $result -> bindParam(':numSerie', $numSerie, PDO::PARAM_STR);
            $result -> bindParam(':numero', $numero, PDO::PARAM_STR);
            $result -> bindParam(':fechaEmision', $fechaEmision, PDO::PARAM_STR);
            $result -> bindParam(':monto', $monto, PDO::PARAM_STR);
            if($estadoCp = '1'){
                $estadoCp = 'ACEPTADO';
            }
            else{
                $estadoCp = 'NO EXISTE';
            }
            if($estadoRuc = '00'){
                $estadoRuc = 'ACTIVO';
            }
            else{
                $estadoRuc = 'NO ACTIVO';
            }
            if($condDomiRuc = '00'){
                $condDomiRuc = 'HABIDO';
            }
            else{
                $condDomiRuc = 'NO HABIDO';
            }
            $result -> bindParam(':estadoCp', $estadoCp, PDO::PARAM_STR);
            $result -> bindParam(':estadoRuc', $estadoRuc, PDO::PARAM_STR);
            $result -> bindParam(':condDomiRuc', $condDomiRuc, PDO::PARAM_STR);
            $sqlsuccess = $result -> execute();
            if($sqlsuccess) // MENSAJE DE EXITO
            {
                return $replys = 'Se realizo correctamente el registro.';
            }
        } catch (PDOException $e) {
            return 'Ocurrio un problema, llamar a sistemas '.$e->getMessage();
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
    //GET NAME AWAREHOUSE
    /*
    public function getNombre(string $dato, string $tabla): array
    {
        $where = "ORDER BY nombre_almacen ASC";
        $array = array(':nombre' => '%' . $termino . '%', ':factura' => '%' . $termino . '%');
        return $this->ConsultaCompleja($where, $array, $tabla);
    }*/
    public function getApiSunat(object $jedcsunat)
    {
        //PREPARAMOS PARAMETROS
        $codigo = 'FVIH';
        $numRuc = $jedcsunat->numRuc;
        $codComp = $jedcsunat->codComp;
        $numeroSerie = $jedcsunat->numeroSerie;
        $numero = $jedcsunat->numero;
        $codDocRecep = '';
        $numDocRecep = '';
        $fechaEmision = $jedcsunat->fechaEmision;
        $monto = $jedcsunat->monto;        
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.sunat.gob.pe/ol-ti-itconsultaunificadalibre/consultaUnificadaLibre/consultaIndividual?numRuc=$numRuc&codComp=$codComp&numeroSerie=$numeroSerie&numero=$numero&codDocRecep&numDocRecep&fechaEmision=$fechaEmision&monto=$monto",//&codigo=$codigo
          //https://www.sunat.gob.pe/ol-ti-itconsultaunificadalibre/consultaUnificadaLibre/consultaIndividual?numRuc=20370715107&codComp=01&numeroSerie=FF04&numero=124540&codDocRecep&numDocRecep&fechaEmision=26/09/2020&monto=4181.00&codigo=TQFR
          //https://www.sunat.gob.pe/ol-ti-itconsultaunificadalibre/consultaUnificadaLibre/consultaIndividual?numRuc=$numRuc&codComp=$codComp&numeroSerie=$numeroSerie&numero=$numero&codDocRecep&numDocRecep&fechaEmision=$fechaEmision&monto=$monto&codigo=$codigo
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "Cookie: f5avraaaaaaaaaaaaaaaa_session_=FIAAFADFJMCIJOEBIGMOEBAMDAJIFDAENDJNBOPLMOPLBOEEHLAHLAEEFLJIBAHCPAMDBEPKBPGFEOPCLCLAMKIPIHAFBAMIJFKKDJFAIFLJDPAJDFFOGKDMGNEHOLPC; ITCONSULTAUNIFICADALIBRESESSION=ZtodmPHbGdHXRSvxiNSwGWPEoo9yOKIrS_coiC5DMzcqhpbqWYT5aXkn4WyozUgtuvZmWCiBNN6SRqhG2LF3IbTOD0sSBZwL-fOPnWaNZY8Q4ShDBV_poHeqnk8iPfZh560JEsOkH7KKc5_BY-mTUxFxWMbI-yd_wg-wlyJWG9JiMtL_WWxwJzg2cEqy7vsKG4jF4o29LaxX9tGMXtHrHZzM8ExW_h5WtRiysgctcYy672tHO6-xcsQYOgznkAid!1771393487!878333934; TS0103674e=019edc9eb86cb7d03b8fee4275b26a1789d5eb3fed45bd783fae70587450ce3fc65e0ca2be331a4a7e3c0eeeebc4d3da148ea735f43dadd84fbf83d0daeac5435dfb622334a8fa104c7655b8de4a26a39121258808"
          ),
        ));
        //EJECUTAMOS CONEXION
        $response = curl_exec($curl);
        //CERRAMOS CONEXION
        curl_close($curl);
        header('Content-type: application/json');
        return $response;
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