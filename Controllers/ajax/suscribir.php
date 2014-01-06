<?php

include_once 'Logic/suscripciones.php';

$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");



if(isset($_POST['email'])){
    $data = array();
    $data['email'] = $_POST['email'];
    
    try {
        $config = getConfiguracion();
        $mailer = new Core_Mailer();
        
        if($config) {
            $data_config = array(
                'email' => $config->email,
                'username' => $config->username,
                'password' => $config->password,
                'servidor' => $config->servidor,
                'puerto' => $config->puerto
            );
           

            $subject = "Un nuevo suscriptor";
            $body .= "Email: " . $data['email'];

            $mailer->send_email($config->email, $subject, $body, $data_config);
            
        }
        
    } catch(Exception $e) {
        
    }


    if(insertSuscripcion($data)) {
        $result['msg'] = 'ok';
        $result['data'] = 'Se guardaron los datos correctamente';
    } else {
        $result['data'] = 'No se guardaron los datos correctamente.';
    }
}

echo json_encode($result);
?>
