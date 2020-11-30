<?php

$contraseña = "promefar2014";
$usuario = "pgpromefardistribuidora";
$nombreBaseDeDatos = "distribuidora";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "192.168.1.4";
$puerto = "5432";
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sentencia = $base_de_datos->query("select cserie, cnumero, dfecemi, nimporte FROM public.comprobante_emitido where dfecemi between '2020-10-11' and '2020-10-20' order by dfecemi desc limit 20");
    $mascotas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //var_dump($mascotas);
    
    echo 'Conexion correcta';
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

///---------------------------------------------------------------------
/*
declare (strict_types = 1);
class ConexionPgsql
{
    protected $db;
    public function __construct()
    {
        $this->db = $this->conectar();
    }
    private function conectar()
    {
        try
        {
            $HOST   = '192.168.1.4';
            $DBNAME = 'distribuidora';
            $USER   = 'pgpromefardistribuidora';
            $PASS   = 'promefar2014';
            $con    = new PDO("pgsql:host={$HOST}; dbname={$DBNAME}", $USER, $PASS);
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
}
*/
?>