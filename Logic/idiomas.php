<?php

function getIdiomas() {
    try {
        $idiomas = DAOFactory::getIdiomasDAO()->queryAll();
        return $idiomas;
    } catch (Exception $e) {
        var_dump($e);
        return false;
    }
}
?>
