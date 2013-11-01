<?php

$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if(isset($_POST['value'])) {
    
    $value = $_POST['value'];
    
    $value = money_format("%i", $value);
    
    $result = array("msg" => "ok", "data" => $value);
    
} else {
    $result['data'] = 'Especifica el valor a convertir';
}

echo json_encode($result);

?>
