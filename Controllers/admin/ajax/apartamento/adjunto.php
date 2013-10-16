<?php
$upload_dir = $template_dir.'/recursos/apartamentos/';
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

if (strtolower($_SERVER['REQUEST_METHOD']) != 'post') {
    exit_status('Error! Wrong HTTP method!');
}

if (array_key_exists('file', $_FILES) && $_FILES['file']['error'] == 0 && isset($_GET['id']) && is_numeric($_GET['id'])) {

    $file = $_FILES['file'];
    $ext = get_extension($file['name']);
    if (!in_array($ext , $allowed_ext)) {
        exit_status('Only ' . implode(',', $allowed_ext) . ' files are allowed!');
    }
    $nn = md5(microtime());

    $path = $upload_dir .$nn.'.'.$ext;
    $ruta = '/recursos/apartamentos/'.$nn.'.'.$ext;
    
    if (move_uploaded_file($file['tmp_name'], $path)) {
        $id_adjunto = insertAdjunto(array('ruta' => $ruta,'nombre' => $file['name'],'ext' => $ext,'tipo' => 'apartamento'));
        $id_apartamento_adjunto = insertApartamentoAdjunto(array('idAdjunto' => $id_adjunto,'idApartamento' => $_GET['id']));
        if($id_apartamento_adjunto)
        exit_status('ok');
    }
}

exit_status('fail');

function exit_status($str) {
    echo json_encode(array('status' => $str));
    exit;
}

function get_extension($file_name) {
    $ext = explode('.', $file_name);
    $ext = array_pop($ext);
    return strtolower($ext);
}

?>