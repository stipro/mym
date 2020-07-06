<?php
declare (strict_types = 1);
//vERIFICACION SI SE RECIBIO DATOS
if($_POST){
    require_once ('./../models/providers.php');
    //VALIDAMOS EL RUC
    if(strlen($_POST['ruc']) == 11)
    {
        $proveedor = new Proveedor();
        $intruc  = intval($_POST['ruc']);
        $strnombre = $_POST['nombre'];
        $strDireccion = $_POST['direccion'];
        $strRazSocial = $_POST['razSocial'];
        $intTelefono = intval($_POST['telefono']);
        $intCelular = intval($_POST['celular']);
        $strCorreo = $_POST['correo'];
        $bolestad = $_POST['estado'];
        $strDescripcion = $_POST['descripcion'];
        $proveedor->insert($intruc,
                            $strnombre,
                            $strRazSocial,
                            $strDireccion,
                            $intTelefono,
                            $intCelular,
                            $strCorreo,
                            $strDescripcion,
                            $bolestad);
        
    }
    else{
        echo "ruc invalido";
    }
    
}
else{
    echo "Nose recibio DATOS";
}
?>