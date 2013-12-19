<?php 
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");



if(isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['mensaje'])&& isset($_POST['idApartamento']) ){
    $apartamento = getApartamento($_POST['idApartamento']);
    $empresaContrato = getEmpresaContrato($ap->idEmpresaContrato);
    $empresa = getEmpresa($empresaContrato->idEmpresa);

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
            
            $data['nombre'] = isset($_POST['apellidos']) ? $data['nombre'].' '.$_POST['apellidos'] : $data['nombre'];

            $subject = "Pregunta sobre ".$apartamento->nombre;
            $body = " Enviado el " . date("d-m-Y") . "<br/>";
            $body .= "Nombre/s:" . $data['nombre'] . "<br/>";

            $body .= "Email: " . $data['email'] . "<br/>";
            
            if(isset($_POST['telefono'])) $body .= "Teléfono: " . $_POST['telefono'] . "<br/>";

            $body .= "Mensaje: " . $data['mensaje'] . " <br/>";
            $body .= "URL: " . $base_url.'/apartamento/id:'.$apartamento->idApartamento. " <br/>";

            
            $mailer->send_email($empresa->email, $subject, $body, $data_config);
            
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
