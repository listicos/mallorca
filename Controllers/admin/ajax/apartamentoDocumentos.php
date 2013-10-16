<?php

$ds = DIRECTORY_SEPARATOR;
$storeFolder = '/recursos/apartamentos/';

$result = array(
    'msg' => 'error',
    'data' => 'No se guardaron los cambios'
);

if (!empty($_FILES)) {
    
    $data_files = array(
        'licenciaTuristica' => NULL,
        'notaRegistral' => NULL,
        'reciboIBI' => NULL,
        'cedulaHabitabilidad' => NULL,
        'dniPropietario' => NULL,
        'certificadoComunidad' => NULL
    );
    
    $apartamento_id = $_POST['apartamentoId'];
    
    $storeFolder .= $apartamento_id . '/';
    
    $keys = array_keys($data_files);
        
    foreach ($keys as $key) {
        if(isset($_FILES[$key . 'File']) && strcmp($_FILES[$key . 'File']['tmp_name'], "") != 0) {
            $tempFile = $_FILES[$key . 'File']['tmp_name'];
            $targetPath = $template_dir . $storeFolder;
            $name = $_FILES[$key . 'File']['name'];
            $name_array = explode(".", $name);
            $ext = $name_array[count($name_array) - 1];
            $ruta = $storeFolder . $key . "." . $ext;
            $targetFile = $targetPath . $key . "." . $ext;
            if(!is_dir($targetPath)){
                mkdir($targetPath);
            }
            move_uploaded_file($tempFile, $targetFile);


            $data_adjunto = array();
            $data_adjunto['nombre'] = $key . "." . $ext;
            $data_adjunto['ruta'] = $ruta;
            $data_adjunto['tipo'] = $key;
            $data_adjunto['ext'] = $_FILES[$key . 'File']['type'];

            $data_files[$key] = $data_adjunto;
        }
    }
    
    $d = updateApartamentoAdjuntos($apartamento_id, $data_files);

    if($d) {
        $result['msg'] = 'ok';
        $result['data'] = 'Sus cambios han sido guardados correctamente.';
        $documentos = getDocumentosByApartamentoId($apartamento_id);
        
        $template = new Core_template('admin/apartamento/documentos.php');
        $template->setAttribute('apartamentoId', $apartamento_id);
        $template->setAttribute('documentos', $documentos);
        
        $result['htmlDocumentos'] = $template->getContent();
        
    } 
}

else if(isset ($_POST['action']) && strcmp($_POST['action'], 'eliminarDocumento') == 0) {
    $apartamentoId = $_POST['apartamentoId'];
    $tipo = $_POST['tipo'];
    $d = eliminarDocumentoApartamento($apartamentoId, $tipo);
    
    if($d) {
        $result['msg'] = 'ok';
        $result['data'] = 'Sus cambios han sido guardados correctamente.';
        $documentos = getDocumentosByApartamentoId($apartamentoId);
        
        $template = new Core_template('admin/apartamento/documentos.php');
        $template->setAttribute('apartamentoId', $apartamentoId);
        $template->setAttribute('documentos', $documentos);
        
        $result['htmlDocumentos'] = $template->getContent();
    }
}

echo json_encode($result);

?>
