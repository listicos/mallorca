<?php
function getProvincias() {
    try {
        $empresa = DAOFactory::getProvinciasDAO()->queryAll();
        return $empresa;
    } catch (Exception $e) {
        return false;
    }
}


?>
