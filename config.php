<?php
$site_title = 'Mallorca'; 

$site_prefix = '/mallorca';
$imagen_default =(object) array('nombre'=>'Este apartamento no cuenta con foto','ruta' => '/imagen/apartamento.png');
$base_url = "http://" . $_SERVER['SERVER_NAME'].$site_prefix;
$base_url_ssl = "https://" . $_SERVER['SERVER_NAME'].$site_prefix;
$app_dir = $_SERVER['DOCUMENT_ROOT'].$site_prefix;
$template_dir = $_SERVER['DOCUMENT_ROOT'].$site_prefix.'/Template';
$template_url = "http://" . $_SERVER['SERVER_NAME'].$site_prefix.'/Template';
$template_url_s = "http://" . $_SERVER['SERVER_NAME'].$site_prefix.'/templates';
$storeFolder = '/recursos/apartamentos/';
?>
