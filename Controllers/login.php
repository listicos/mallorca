<?php

$template = new Core_template('template.php');
$template->setView('login.php');
$template->setTitle('Iniciar sesión');
$template->setCSS('login.css');
$template->setJS('login.js');
if (isset($_POST['usuario']) && isset($_POST['password'])) {
   $email = $_POST['usuario'];
    $password = $_POST['password'];
   $usuario = authenticateUsuario($email, $password);
    if ($usuario) {
     $usuario_core->setUsuario($usuario);
     if (isset($_SESSION['user_redirect'])) {
         header('Location:'.$_SESSION['user_redirect']);
       } else {
        header('Location:'.$base_url.'admin-apartamento-lista');
       }
     }
}

echo $template->render();
?>
