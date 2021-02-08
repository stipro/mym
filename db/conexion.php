<?php
//declare (strict_types = 1);
class Conexion
{
    protected $db;
    protected $dbsql;
    public function __construct()
    {
        //Conexion MySql
        $this->db = $this->conectar();
        //Conexion PgSql
        $this->dbsql = $this->conectarPgsql();
    }
    //MI PRIMERA CONEXION
    private function conectar()
    {
        try
        {
            $HOST   = '127.0.0.1';
            $DBNAME = 'corpmym';
            $USER   = 'root';
            $PASS   = '';
            $con    = new PDO("mysql:host=$HOST;dbname=$DBNAME",$USER,$PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$con->exec('SET CHARACTER SET UTF8');
            //return $con;
        }
        catch (PDOException $e)
        {
            echo "No se pudo conectar a la BD (Mysql): " . $e->getMessage();
        }
        return $con;
    }
    public function getDb() {
        return $this->db;
    }
  
    public function setDb($db) {
          $this->db=$db;
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
    //SEUNDA CONEXION
    //POSTGREST
    private function conectarPgsql()
    {
        try
        {
            $HOSTPGSQL   = '192.168.1.6';
            $DBNAMEPGSQL = 'distribuidora';
            $USERPGSQL   = 'pgpromefardistribuidora';
            $PASSPGSQL   = 'promefar2016';
            $PORTPGSQL   = '5432';
            $conpgsql    = new PDO("pgsql:host=$HOSTPGSQL; port=$PORTPGSQL; dbname=$DBNAMEPGSQL", $USERPGSQL, $PASSPGSQL);
            $conpgsql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$conpgsql->exec('SET CHARACTER SET UTF8');
        }
        catch (PDOException $e)
        {
            echo "No se pudo conectar a la BD (POSTGRESSQL): " . $e->getMessage();
        }
        return $conpgsql;
    }
    protected function ConsultaSimplePgsql(string $query): array
    {
        return $this->dbsql->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
    protected function ConsultaComplejaPgsql(string $columns, string $where, array $array, string $tableSQL):array
    {
        $query  = "SELECT {$columns} FROM public.{$tableSQL} {$where}";
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
