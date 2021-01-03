<?php
declare (strict_types = 1);
class Conexion
{
    protected $db;
    protected $dbsql;
    public function __construct()
    {
        //Conexion MySql
        $this->db = $this->conectar();
        //Conexion Postgrest        
        $this->dbsql = $this->conectarPgsql();
    }
    private function conectar()
    {
        try
        {
            $HOST   = '127.0.0.1';
            $DBNAME = 'corpmym';
            $USER   = 'root';
            $PASS   = '';
            $con    = new PDO("mysql:host={$HOST}; dbname={$DBNAME}", $USER, $PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->exec('SET CHARACTER SET UTF8');
        }
        catch (PDOException $e)
        {
            echo "No se pudo conectar a la BD: " . $e->getMessage();
        }
        return $con;
    }
    protected function ConsultaSimple(string $query): array
    {
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function ConsultaCompleja(string $where, array $array, string $table, string $vtabla): array
    {
        $query  = "SELECT id_{$vtabla}, nombre_{$vtabla} FROM {$table} {$where}";
        $result = $this->db->prepare($query);
        $result->execute($array);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    //POSTGREST
    private function conectarPgsql()
    {
        try
        {
            $HOST   = '192.168.1.6';
            $DBNAME = 'distribuidora';
            $USER   = 'pgpromefardistribuidora';
            $PASS   = 'promefar2016';
            $PORT   = '5432';
            $conpgsql    = new PDO("pgsql:host=$HOST; port=$PORT; dbname=$DBNAME", $USER, $PASS);
            $conpgsql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$conpgsql->exec('SET CHARACTER SET UTF8');
        }
        catch (PDOException $e)
        {
            echo "No se pudo conectar a la BD: " . $e->getMessage();
        }
        return $conpgsql;
    }
    protected function ConsultaComplejaPgsql(string $columns, string $where, array $array):array
    {
        $query  = "SELECT {$columns} FROM public.comprobante_emitido {$where}";
        $result = $this->dbsql->prepare($query);
        $result->execute($array);
        $resultConsult = $result->fetchAll(PDO::FETCH_ASSOC);
        $cantResult = count($resultConsult);
        return $resultArray = [
            "result" => $resultConsult,
            "cant" => $cantResult,
        ];
    }
}
