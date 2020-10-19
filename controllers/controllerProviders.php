<?php
declare (strict_types = 1);
//vERIFICACION SI SE RECIBIO DATOS
if($_POST){
    require_once ('./../models/providers.php');
    //VALIDAMOS EL RUC
    if(strlen($_POST['ruc']) == 11)
    {
        $providor = new Providor();
        $intruc  = intval($_POST['ruc']);
        $strnombre = $_POST['nombre'];
        $strDireccion = $_POST['direccion'];
        $strRazSocial = $_POST['razSocial'];
        $intTelefono = intval($_POST['telefono']);
        $intCelular = intval($_POST['celular']);
        $strCorreo = $_POST['correo'];
        $strDescripcion = $_POST['descripcion'];
        $strLogoUrl = 'none';
        $bolestad = $_POST['estado'];
        $providor->insert($intruc,
                            $strnombre,
                            $strRazSocial,
                            $strDireccion,
                            $intTelefono,
                            $intCelular,
                            $strCorreo,
                            $strDescripcion,
                            $strLogoUrl,
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