<?php

$config = getConfiguracion();
$smarty->assign('config', $config);

$smarty->display('contacto.tpl');
?>