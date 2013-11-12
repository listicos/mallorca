<?php

include_once 'Logic/suscripciones.php';

$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");



if(isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['mensaje']) ){
    $data = array();
    $data['email'] = $_POST['email'];
    $data['nombre'] = $_POST['nombre'];
    $data['mensaje'] = $_POST['mensaje'];
    
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
            
            $subject = "Se ha recibido un mensaje desde Mallorca Rent House";
            $body = " Enviado el " . date("d-m-Y") . "<br/>";
            $body .= "por el usuario " . $data['nombre'] . "<br/>";
            $body .= "con el email " . $data['email'] . "<br/>";
            $body .= "Mensaje: " . $data['mensaje'] . " <br/>";
            
            $mailer->send_email($config->email, $subject, $body, $data_config);
            
            $result['msg'] = 'ok';
            $result['data'] = 'Gracias ' . $data['nombre'] . " por contactarnos";
            
        } else {
            $result['data'] = "Lo sentimos, no se pudo enviar su mensaje";
        }
        
         
         
        
    } catch(Exception $e) {
        $result['data'] = "Lo sentimos, no se pudo enviar su mensaje";
    }
}

echo json_encode($result);
?>
