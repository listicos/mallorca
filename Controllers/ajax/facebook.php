<?php
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");

if (strcmp($action, "login_register") == 0) {
    $required = array('email','first_name','id','username');
    $is_valid = true;

    foreach ($required as $r) {
        if(!isset($_POST[$r])){
            $is_valid =  false;
            break;
        }
    }

    if($is_valid){
        $usuario = getUsuarioByEmail($_POST['email']);
        if($usuario){
            $usuario_core->setUsuario($usuario);
            
            $result = array("facebook" => 'login',"msg" => "ok", "data" => "Logeado correctamente.");
        }else{
            $usuario_data = array();
            $usuario_data['nombre'] = $_POST['first_name'];
            $usuario_data['apellidoPaterno'] = $_POST['last_name'];
            $usuario_data['email'] = $_POST['email'];
            $usuario_data['password'] = md5(microtime());
            $usuario_data['estatus'] = 'activo';
            $usuario_data['idUsuarioGrupo'] = '2';
            $usuario_data['tiempoCreacion'] = date('Y-m-d H:i:s');
            $usuario_data['ultimaModificacion'] = date('Y-m-d H:i:s');
    
            $usuario_id = insertUsuario($usuario_data);
            if($usuario_id){
                $usuario = getUsuario($usuario_id);
                $usuario_core->setUsuario($usuario);
                $result = array("facebook" => 'register', "msg" => "ok", "data" => "Usuario creado correctamente.");
            }else{
                $result = array("msg" => "error", "data" => "No se pudo crear el usuario.");
            }
        }
    }else{
        $result = array("msg" => "error", "data" => "Faltan datos");
    }
}
echo json_encode($result);
?>