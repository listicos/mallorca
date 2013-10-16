<?php

$result = array();

if (isset($_GET['fieldValue']) && $_GET['fieldValue'] != '') {
    $email = $_GET['fieldValue'];
    $usuario = getUsuarioByEmail($email);

    if (!$usuario)
        $result = array("email", true, '* El correo está disponible');
    else
        $result = array("email", false, '* Este correo no esta disponible');
}else {
    $result = array("email", false, 'Este campo es obligatorio');
}

echo json_encode($result);
?>
