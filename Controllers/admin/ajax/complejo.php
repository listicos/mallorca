<?php



$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "You do not have sufficient permissions.");

if(strcmp($action, "updateComplejo") == 0) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $data = array('nombre' => $nombre, 
        'descripcion'=>$descripcion);
    if(isset($_POST['complejoId'])) {
        $complejoId = $_POST['complejoId'];
        $complejoId = updateComplejo($complejoId, $data);
    } else {
        $complejoId = insertComplejo($data);
    }
    
    if($complejoId) {
        $result['msg'] = 'ok';
        $result['data'] = 'Se guardaron los cambios correctamente';
    } else {
        $result['data'] = 'No se guardaron los cambios';
    }
}

else if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = $template_dir . $storeFolder;
    $ruta = $storeFolder . $_FILES['file']['name'];
    $targetFile = $targetPath . $_FILES['file']['name'];

    move_uploaded_file($tempFile, $targetFile);
    
    $data_adjunto = array();
    $data_adjunto['nombre'] = $_FILES['file']['name'];
    $data_adjunto['ruta'] = $ruta;
    $data_adjunto['tipo'] = 'apartamento';
    $data_adjunto['ext'] = $_FILES['file']['type'];
    
    $new_adjunto_id = insertAdjunto($data_adjunto);
    
    if(isset($_POST['idComplejo'])) {
        $idComplejo = $_POST['idComplejo'];
        $foto_complejo_id = addFotoToComplejo($idComplejo, $new_adjunto_id);
    }
    
    
    $result['msg'] = 'ok';
    $result['data'] = $foto_complejo_id;
}

echo json_encode($result);
?>
