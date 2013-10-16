<?php

$ds = DIRECTORY_SEPARATOR;
$storeFolder = '/recursos/apartamentos/';

if (!empty($_FILES)) {

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
    
    if($new_adjunto_id){
        insertApartamentosAdjuntos(array('idApartamento' => $_GET['id'], 'idAdjunto' => $new_adjunto_id));
    }
}
?>
