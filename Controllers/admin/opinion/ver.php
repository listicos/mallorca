<?php

$usuario_core->validateUser();
AllowRoles("Administrador, Comercial, Socio");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setTitle("Gestión de opiniones ");
$template->setView('admin/opinion/ver.php');

$template->setCSS('chosen.css');
$template->setJS('admin/jquery.chosen.min.js');
$template->setJS('admin/opinion.js');

$apartamentos = getApartamentos();
$usuarios = getUsuarios();

if(isset($_POST['accion']) && $_POST['accion'] == 'agregar'){
      $data_opinion = array();  
      

        if (isset($_POST['puntuacion']))
            $data_opinion['puntuacion'] = $_POST['puntuacion'];
        if (isset($_POST['opinion']))
            $data_opinion['opinion'] = $_POST['opinion'];
        
        $data_opinion['fechaCreacion'] = date('Y-m-d H:i:s');
        $data_opinion['ultimaActualizacion'] = date('Y-m-d H:i:s');
        
        if (isset($_POST['idApartamento']))
            $data_opinion['idApartamento'] = $_POST['idApartamento'];
        if (isset($_POST['idUsuario']))
            $data_opinion['idUsuario'] = $_POST['idUsuario'];  
        
        $insert_opinion = insertOpinion($data_opinion);
        
        if ($insert_opinion && is_numeric($insert_opinion)) {
            	header('Location: '.$base_url.'/admin-opinion-ver/id:'.$insert_opinion);            
        }
        
}

if(isset($_GET['id']) && is_numeric($_GET['id'])){    
    if(isset($_POST['accion']) == 'editar'){
      $result_update_opi = array("msg" => "error", "data" => "No tienes suficientes permisos.");
      $data_opinion_update = array();  
      

        if (isset($_POST['puntuacion']))
            $data_opinion_update['puntuacion'] = $_POST['puntuacion'];
        if (isset($_POST['opinion']))
            $data_opinion_update['opinion'] = $_POST['opinion'];
        
        $data_opinion_update['fechaCreacion'] = date('Y-m-d H:i:s');
        $data_opinion_update['ultimaActualizacion'] = date('Y-m-d H:i:s');
        
        if (isset($_POST['idApartamento']))
            $data_opinion_update['idApartamento'] = $_POST['idApartamento'];
        if (isset($_POST['idUsuario']))
            $data_opinion_update['idUsuario'] = $_POST['idUsuario'];
        
         $update_opinion = updateOpinion($_GET['id'],$data_opinion_update);
         
         if ($update_opinion) {
            $result_update_opi['msg'] = 'ok';
            $result_update_opi['data'] = 'Su opinion fue actualizada correctamente.';
        }
        
    }        
    $opinion = getOpinion($_GET['id']);
    if($opinion){
        $template->setAttribute('opinion',$opinion);
        
        
        $apartamento_opinion = getApartamento($opinion->idApartamento);
        if($apartamento_opinion){
            $template->setAttribute('apartamento_opinion',$apartamento_opinion);
            $usuario_opinion = getUsuario($opinion->idUsuario);
            
             if($usuario_opinion){
                 $template->setAttribute('usuario_opinion',$usuario_opinion);
                 $template->setAttribute('edit',true);
             }
        }
    }
	
}

$template->setAttribute('apartamentos',$apartamentos);
$template->setAttribute('usuarios',$usuarios);

echo $template->render();
?>