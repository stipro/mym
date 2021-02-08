<?php
declare (strict_types = 1);
require_once('./../db/conexion.php');
//ESTADO
// 0 = EXITO;
// 1 = ERROR;
//TIPO
// 1 = Mensaje;
//
class Sunat extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }
    //REGISTRA
    public function insert(int $numRuc, int $codComp, string $numSerie, int $numero, $fechaEmision, float $monto, string $estadoCp, string $estadoRuc, string $condDomiRuc, string $obseDoc, string $estadoEnvio, string $fechaRegistro)
    {
        try
        {   
            //echo "Estas en el model function insertar";
            //var_dump($db);
            $queryDocVali  = "INSERT INTO validacion_documentos(ruc_documento, tipo_documento, serie_documento, numero_documento, fecemi_documento, nimporte_documento, estcom_documento, estcon_documento, condom_documento, obs_documento, estenvio_documento, fecreg_documento) VALUES (:numRuc, :codComp, :numSerie, :numero, :fechaEmision, :monto, :estadoCp, :estadoRuc, :condDomiRuc, :obseDoc, :estadoEnvio, :fechaRegistro)";
            $insertDocVali = $this->db->prepare($queryDocVali);
            //$insertDocVali = parent::getDb()->prepare($queryDocVali);
            $insertDocVali->bindParam(':numRuc', $numRuc, PDO::PARAM_INT);
            $insertDocVali->bindParam(':codComp', $codComp, PDO::PARAM_STR);
            $insertDocVali->bindParam(':numSerie', $numSerie, PDO::PARAM_STR);
            $insertDocVali->bindParam(':numero', $numero, PDO::PARAM_STR);
            $insertDocVali->bindParam(':fechaEmision', $fechaEmision, PDO::PARAM_STR);
            $insertDocVali->bindParam(':monto', $monto, PDO::PARAM_STR);
            $insertDocVali->bindParam(':estadoCp', $estadoCp, PDO::PARAM_STR);
            $insertDocVali->bindParam(':estadoRuc', $estadoRuc, PDO::PARAM_STR);
            $insertDocVali->bindParam(':condDomiRuc', $condDomiRuc, PDO::PARAM_STR);
            $insertDocVali->bindParam(':obseDoc', $obseDoc, PDO::PARAM_STR);
            $insertDocVali->bindParam(':estadoEnvio', $estadoEnvio, PDO::PARAM_STR);
            $insertDocVali->bindParam(':fechaRegistro', $fechaRegistro, PDO::PARAM_STR);
            $sqlsuccess = $insertDocVali->execute();
            if($sqlsuccess) // MENSAJE DE EXITO
            {
                $rptaSQL = [
                    "estadorpt" => "0",
                    "text" => 'Se realizo correctamente el registro del Doc :'.$numero,
                    "numSerie" => $numSerie,
                    "numero" => $numero,
                ];
                return $rptaSQL;
            }
        }
        catch (PDOException $e) {
            if($e->getCode() == '23000')
            {
                $rptaSQL = [
                    "estadorpt" => "1",
                    "text" => 'Ya se inserto el documento: '.$numero.', '.$e->getMessage(),
                ];
                
            }
            else{
                $rptaSQL = [
                    "estadorpt" => "1",
                    "text" => 'Ocurrio un problema, llamar a sistemas '.$e->getMessage(),
                ];
            }
            return $rptaSQL;
            //echo 'ocurrio problema';
        }
        return parent::getDb()->lastInsertId();
    }
    //ELIMINA
    public function delete(int $id)
    {
        //error_reporting(0);
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
        //error_reporting(0);
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
    public function getdocDB($fechainicio, $fechafin, $unidad, $canal, $TipDoc, $tamano, $offset): array
    {
        $columns = "cserie, cnumero, dfecemi, nimporte, benviado";
        $tableSQL = 'comprobante_emitido';
        $uctDoc = "AND comprobante_emitido.cserie "; 
        if($fechainicio == $fechafin){
            //echo 'Fecha igual';
            $where = "WHERE dfecemi = :fechainicio ORDER BY cnumero ASC LIMIT :tamano OFFSET :offset ";
            $array = array(':fechainicio' => $fechainicio, ':tamano' => $tamano, ':offset' => $offset);
        }else{
            if($TipDoc == "" && $canal == ""){
                $serieSQL = $TipDoc.$canal;
                $uctDoc = "";
            }elseif($TipDoc == 'FF' && $canal == ""){
                $serieSQL = '%'.$TipDoc.'%';
                $uctDoc.= "LIKE '".$serieSQL."'";
            }elseif($TipDoc == 'FF' && $canal != ""){
                $serieSQL = $TipDoc.$canal;
                $uctDoc.= "= '".$serieSQL."'";
            }elseif($TipDoc == 'BB' && $canal == ""){
                $serieSQL = '%'.$TipDoc.'%';
                $uctDoc.= "LIKE '".$serieSQL."'";
            }elseif($TipDoc == 'BB' && $canal != ""){
                $serieSQL = $TipDoc;
                $uctDoc.= "= '".$serieSQ."'";
            }elseif($TipDoc == 'D' && $canal != ""){
                $serieSQL = 'Error no seleccione CANAL';
            }elseif($TipDoc == 'C' && $canal != ""){
                $serieSQL = 'Error no seleccione CANAL';
            }elseif($TipDoc == 'D' && $canal == ""){
                $serieSQL = '%'.$TipDoc.'%';
                $tableSQL = 'notcar_cliente';
                $uctDoc = "AND ".$tableSQL.".cserie LIKE ";
                $uctDoc.= "'".$serieSQL."'";
            }elseif($TipDoc == 'C' && $canal == ""){
                $serieSQL = '%'.$TipDoc.'%';
                $tableSQL = 'notabo_cliente';
                $uctDoc = "AND ".$tableSQL.".cserie LIKE ";
                $uctDoc.= "'".$serieSQL."'";
            }
            $where = "WHERE dfecemi >= :fechainicio AND dfecemi <= :fechafin ".$uctDoc." ORDER BY cnumero ASC LIMIT :tamano OFFSET :offset ";
            $array = array(':fechainicio' => $fechainicio, ':fechafin' => $fechafin, ':tamano' => $tamano, ':offset' => $offset);
        }
        //$where = "WHERE dfecemi >= :fechainicio AND dfecemi <= :fechafin ".$uctDoc." ORDER BY cnumero ASC LIMIT :tamano OFFSET :offset ";
        //$array = array(':fechainicio' => $fechainicio, ':fechafin' => $fechafin, ':tamano' => $tamano, ':offset' => $offset);
        return $this->ConsultaComplejaPgsql($columns, $where, $array, $tableSQL);
    }

    public function getPagination($fechainicio, $fechafin, $canal, $TipDoc, $tamano): array
    {
        $tableSQL = 'comprobante_emitido';
        $uctDoc = "AND comprobante_emitido.cserie ";
        if($fechainicio == $fechafin){
            $where = "WHERE dfecemi = :fechainicio";
            $array = array(':fechainicio' => $fechainicio);
        }else{
            if($TipDoc == "" && $canal == ""){
                $serieSQL = $TipDoc.$canal;
                $uctDoc = "";
            }elseif($TipDoc == 'FF' && $canal == ""){
                $serieSQL = '%'.$TipDoc.'%';
                $uctDoc.= "LIKE '".$serieSQL."'";
            }elseif($TipDoc == 'FF' && $canal != ""){
                $serieSQL = $TipDoc.$canal;
                $uctDoc.= "= '".$serieSQL."'";
            }elseif($TipDoc == 'BB' && $canal == ""){
                $serieSQL = '%'.$TipDoc.'%';
                $uctDoc.= "LIKE '".$serieSQL."'";
            }elseif($TipDoc == 'BB' && $canal != ""){
                $serieSQL = $TipDoc;
                $uctDoc.= "= '".$serieSQ."'";
            }elseif($TipDoc == 'D' && $canal != ""){
                $serieSQL = 'Error no seleccione CANAL';
            }elseif($TipDoc == 'C' && $canal != ""){
                $serieSQL = 'Error no seleccione CANAL';
            }elseif($TipDoc == 'D' && $canal == ""){
                $serieSQL = '%'.$TipDoc.'%';
                $tableSQL = 'notcar_cliente';
                $uctDoc = "AND ".$tableSQL.".cserie LIKE ";
                $uctDoc.= "'".$serieSQL."'";
            }elseif($TipDoc == 'C' && $canal == ""){
                $serieSQL = '%'.$TipDoc.'%';
                $tableSQL = 'notabo_cliente';
                $uctDoc = "AND ".$tableSQL.".cserie LIKE ";
                $uctDoc.= "'".$serieSQL."'";
            }
            $where = "WHERE dfecemi >= :fechainicio AND dfecemi <= :fechafin ".$uctDoc;
            $array = array(':fechainicio' => $fechainicio, ':fechafin' => $fechafin);
        }
        //return $this->dbsql->query($query)->fetch(PDO::FETCH_BOTH)[0];
        $query  = "SELECT COUNT(*) FROM public.{$tableSQL} {$where}";
        $result = $this->dbsql->prepare($query);
        $result->execute($array);
        $sizetotal = intval($result->fetch(PDO::FETCH_BOTH)[0]);
        //$sizetotal = intval($this->dbsql->prepare($query)->fetch(PDO::FETCH_BOTH)[0]);
        $paginas = $sizetotal / $tamano;
        return [
            'filasTotal'  => $sizetotal,
            'filasPagina' => ceil($paginas),
        ];
    }
    //GET NAME AWAREHOUSE    
    public function getdateSunat($dateone, $datetwo, $sizeTable): array
    {   /*
        echo ' PRIMER FECHA '.$dateone;
        echo ' SEGUNDO FECHA '.$datetwo.' ';*/
        //var_dump($dateone);
        //"select * FROM public.comprobante_emitido where dfecemi between '2020-10-11' and '2020-10-20' order by dfecemi desc limit 20"
        $columns = "cserie, cnumero, dfecemi, nimporte, benviado";
        $where = "WHERE dfecemi BETWEEN :dateone AND :datetwo ORDER BY dfecemi DESC LIMIT :sizeTable";
        $array = array(':dateone' => $dateone, ':datetwo' => $datetwo, ':sizeTable' => $sizeTable);
        return $this->ConsultaComplejaPgsql($columns, $where, $array);
    }
    public function getApiSunat(array $jedcsunat)
    {
        //PREPARAMOS PARAMETROS
        //var_dump($jedcsunat);
        $cookie = 'f5avraaaaaaaaaaaaaaaa_session_=FIAAFADFJMCIJOEBIGMOEBAMDAJIFDAENDJNBOPLMOPLBOEEHLAHLAEEFLJIBAHCPAMDBEPKBPGFEOPCLCLAMKIPIHAFBAMIJFKKDJFAIFLJDPAJDFFOGKDMGNEHOLPC; ITCONSULTAUNIFICADALIBRESESSION=ZtodmPHbGdHXRSvxiNSwGWPEoo9yOKIrS_coiC5DMzcqhpbqWYT5aXkn4WyozUgtuvZmWCiBNN6SRqhG2LF3IbTOD0sSBZwL-fOPnWaNZY8Q4ShDBV_poHeqnk8iPfZh560JEsOkH7KKc5_BY-mTUxFxWMbI-yd_wg-wlyJWG9JiMtL_WWxwJzg2cEqy7vsKG4jF4o29LaxX9tGMXtHrHZzM8ExW_h5WtRiysgctcYy672tHO6-xcsQYOgznkAid!1771393487!878333934; TS0103674e=019edc9eb86cb7d03b8fee4275b26a1789d5eb3fed45bd783fae70587450ce3fc65e0ca2be331a4a7e3c0eeeebc4d3da148ea735f43dadd84fbf83d0daeac5435dfb622334a8fa104c7655b8de4a26a39121258808';
        $cookied = 'f5avraaaaaaaaaaaaaaaa_session_=HPGHCDLKEALDGOIKNMIDJEMGKDGAPPDALMALBNBEFIDMAJMABMDDJFPNNHKHKJILANIDIHGMPHMNJHLMGMHAMMCGLAHIBLOMEIHFGIJLAMHBFDGNHCOAINNFFHNPBGJE; _ga=GA1.3.651044179.1605104373; dtCookie=v_4_srv_2_sn_ED1A31195DC8EDB3FEA640A868A7C1EC_perc_73457_ol_1; ITCONSULTAUNIFICADALIBRESESSION=6GRKXSH4YmHrkxJ1lPW2Yab65TlBdBwf8ZLDmBqqvrYCsRLCYAwQ7fbX7_vUzVDcakMZg9O04wGXQvrqLiQJgNw2xeceTi3lG32KBmSowARvi-9WvvmoGuzc2jxu-xLS-KjjukO7HZQy9OTxSDOdxSaX4jba40xUBriPkarUaJKKvxZlF9DDgf84QHbhAKiPaviNRrcDuNI-tCdpH7ARgLwQDKy-g36wwYka-BWxGLpTOL9ufZw3oRU4dWsysdYB!1507844040!-1122540974; TS0103674e=019edc9eb8f42e6f737262c8392bd623589cb4752b9b8d4db21b209596afdefba6134db42644590007552ab86d190d56427ccfe7efb4f8dd6254a90218b2b65d94d179f990d653da3b68052c9869d85d138c2829ef; TS0143f8a5=019edc9eb89f3122f41d4da628bb3dd26f98a23c4d9b8d4db21b209596afdefba6134db426c679c6b17f77beb7806ed6cb3a2da1d2cfa8664e8e455064d890a43355839c4f; TS8effaff5027=08d0cd49b8ab200080e4156e779728114be270bd3ed29c1e1e24a506223f5629fe7072f31678fab9088d967c5e11300050cbfbc5ac1d9fc154ac5d66b0b4acaf25b06dbff934457d50cf1606d5d820edb0919ab54059d409ff4c5fbc436ffd62';
        $codigo = 'FVIH';
        $numRuc = $jedcsunat['numRuc'];
        $codComp = $jedcsunat['codComp'];
        $numeroSerie = $jedcsunat['numeroSerie'];
        $numero = $jedcsunat['numero'];
        $codDocRecep = '';
        $numDocRecep = '';
        $fechaEmision = $jedcsunat['fechaEmision'];
        $monto = $jedcsunat['monto'];
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
            "Cookie: ".$cookied.""
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