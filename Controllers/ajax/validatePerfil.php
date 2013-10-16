<?php

$result = array();

if (isset($_GET['fieldValue']) && $_GET['fieldValue'] != '') {
    $email = $_GET['fieldValue'];
    $usuario = getUsuarioByEmail($email);
    $usuario_loged = $usuario_core->getUsuario();

    if (!$usuario)
        $result = array("email", true, '* El correo está disponible');
    else{
        if(trim($usuario->email) == trim($usuario_loged->email))
            $result = array("email", true, '* Este correo está disponible');
        else
            $result = array("email", false, '* Este correo no está disponible');
    }

}else {
    $result = array("email", false, 'Este campo es obligatorio');
}

echo json_encode($result);
?>
