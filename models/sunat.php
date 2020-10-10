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
                        $resexistenteCol = $existenteCol->fetch();
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
        $codigo = 'LHVY';
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
          CURLOPT_URL => "https://www.sunat.gob.pe/ol-ti-itconsultaunificadalibre/consultaUnificadaLibre/consultaIndividual?numRuc=$numRuc&codComp=$codComp&numeroSerie=$numeroSerie&numero=$numero&codDocRecep&numDocRecep&fechaEmision=$fechaEmision&monto=$monto&codigo=$codigo",
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
            "Cookie: f5avraaaaaaaaaaaaaaaa_session_=PJAAINEPKGIGGOLLCNJNKFHLPHDEBHFODKDGBECDDMPCBJKGEELPHHLINFIOIFAIGOBDLEGFKEHPJKAPDNGAMBAMMEHPCCPFBOGCCIFGEFIFODMGLDPCLKKIADGIIHID; ITCONSULTAUNIFICADALIBRESESSION=_tD5i5ba5rPtB-0C7ewmPD0pPyT7bQgvRHngrqD-1UWgCeEufSSpPpAStQNmkEvItFMLRa6MFD3562-tGj8VmnwSRuLzMvHhvoVdyKssoRM-x-l4WujzHYzP7GlWBi-K-TfCGkM-VQTCnsaeySUZxzOixDNi6im2hGw9DJSZEIdtqMdic9fhi2hNwrtdGAEWu7F7up0iRul8NPSpjo2m0hOGVaPBUs4O73O3qxYZLwF2LVQtGOzCeBOlbifpvpKe!-176522161!2109973514; TS01129fe7=014dc399cbb8c64c0cee054083b3b3ee38b4348af611cfe75518e2102518b31332eb1d249f9030d65c2d846c51791334a733e427dfdc81dbb9b1dc75aa9dfa1ee637aab49b9c7d8400b3f0507ff86a3b172ffce944"
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