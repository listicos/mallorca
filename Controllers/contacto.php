<?php

$config = getConfiguracion();
$smarty->assign('config', $config);
$smarty->assign('page','contacto');
$smarty->display('contacto.tpl');
?>