<?php

$result = array('msg'=>'error', 'data'=> '');

if(isset($_POST['idComplejo'])) {
    $idComplejo = $_POST['idComplejo'];
    $complejo = getComplejoById($idComplejo);
    $smarty->assign('complejo', $complejo);
    $html = $smarty->fetch('complejo.tpl');
    $result['msg'] = 'ok';
    $result['html'] = $html;
}

echo json_encode($result);

?>
