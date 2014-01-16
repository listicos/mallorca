<?php

include_once 'Logic/politicas.php';

if(isset($_GET['id'])) {
    $politica = getPolitica($_GET['id']);
    $smarty->assign('politica', $politica);
}
$smarty->display('politica.tpl');

?>
