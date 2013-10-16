<?php

require 'Logic/mantenimiento.php';


class AlertsManager {
    
    public static function getAlerts() {
        
        $alerts = new AlertObject();
        
        $alerts->mantenimientosPendientes = count(getMantenimientosByEstado("Pendiente"));
        
        $alerts->mantenimientosEnCurso = count(getMantenimientosByEstado("En curso"));
        
        $alerts->reservasPendientes = count(getReservasByEstado("Pendiente"));
        
        $alerts->reservasParaHoy = count(getReservasParaHoy());
        
        return $alerts;
        
    }
    
}

class AlertObject {
    
    var $reservasPendientes;
    
    var $reservasParaHoy;
    
    var $mantenimientosPendientes;
    
    var $mantenimientosEnCurso;
}



?>
