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
    
    move_uploaded_file($file['tmp_name'], $path);
    @chmod($path, 0644);
    
    if (file_exists($path) && filesize($path) > 0) {
        $sTempFileName = $path;    
        $aSize = getimagesize($sTempFileName); // try to obtain image info
        if (!$aSize) {
            @unlink($sTempFileName);
            return;
        }
        $iWidth = $aSize[0];
        $iHeight = $aSize[1];
        $isimage = true;
        if($iWidth > 840 || $iHeight > 460) {
            switch($aSize[2]) {
                case IMAGETYPE_JPEG:
                    $sExt = '.jpg';

                    // create a new image from file 
                    $vImg = @imagecreatefromjpeg($sTempFileName);
                    break;
                /*case IMAGETYPE_GIF:
                    $sExt = '.gif';

                    // create a new image from file 
                    $vImg = @imagecreatefromgif($sTempFileName);
                    break;*/
                case IMAGETYPE_PNG:
                    $sExt = '.png';

                    // create a new image from file 
                    $vImg = @imagecreatefrompng($sTempFileName);
                    break;
                default:
                    @unlink($sTempFileName);
                    $isimage = false;
            }
            if($isimage) {
                
                
                $ratioWidth = $iWidth / 840;
                $ratioHeight = $iHeight / 460;

                $ratio = $ratioWidth > $ratioHeight ? $ratioWidth : $ratioHeight;

                $newWidth = $iWidth / $ratio;
                $newHeight = $iHeight / $ratio;
                

                // create a new true color image
                $vDstImg = @imagecreatetruecolor( $newWidth, $newHeight );

                // copy and resize part of an image with resampling
                imagecopyresampled($vDstImg, $vImg, 0, 0, 0, 0, $newWidth, $newHeight, $iWidth, $iHeight);

                // define a result image filename
                $nn = md5(microtime());

                $path = $upload_dir .$nn.'.'.$ext;

                // output image to file
                
                
                switch($aSize[2]) {
                    case IMAGETYPE_JPEG:
                        imagejpeg($vDstImg, $path, 90);
                        break;
                    /*case IMAGETYPE_GIF:
                        $sExt = '.gif';

                        // create a new image from file 
                        $vImg = @imagecreatefromgif($sTempFileName);
                        break;*/
                    case IMAGETYPE_PNG:
                        imagepng($vDstImg, $path, 90);
                        break;
                    
                        
                }

                @unlink($sTempFileName);

            }
        }
    }
    
    $ruta = '/recursos/apartamentos/'.$nn.'.'.$ext;
    
    
    $id_adjunto = insertAdjunto(array('ruta' => $ruta,'nombre' => $file['name'],'ext' => $ext,'tipo' => 'apartamento'));
    $id_apartamento_adjunto = insertApartamentoAdjunto(array('idAdjunto' => $id_adjunto,'idApartamento' => $_GET['id']));
    if($id_apartamento_adjunto)
    exit_status('ok');
    
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