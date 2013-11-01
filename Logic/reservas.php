<?php

function insertReserva($data = array(), $articulos = array()) {
    try {
        $transaction = new Transaction();

        $reserva = DAOFactory::getReservacionesDAO()->prepare($data);
        $reserva_id = DAOFactory::getReservacionesDAO()->insert($reserva);
        
        foreach ($articulos as $a=>$cant) {
            if($cant > 0) {
                $art = DAOFactory::getReservacionesArticulosDAO()->prepare(array(
                    'idReservacion'=>$reserva_id, 
                    'idArticulo'=>$a, 
                    'cantidad' => $cant
                ));
                DAOFactory::getReservacionesArticulosDAO()->insert($art);
            }
        }
        
        registrarAccion("insert", "reservaciones", $reserva_id);

        $transaction->commit();

        return $reserva_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function addReserva($data = array(), $data_usuario = array(), $data_cobros = array(), $articulos = array()) {
    try {
        $transaction = new Transaction();
        $data['estatus'] = 'Pendiente';
        if(!isset($data['usuarioId'])) {
            $data_usuario['idUsuarioGrupo'] = 2;
            $data_usuario['tiempoCreacion'] = date("Y-m-d");
            $usuario = DAOFactory::getUsuariosDAO()->prepare($data_usuario);
            $usuario_id = DAOFactory::getUsuariosDAO()->insert($usuario);
            $data['idUsuario'] = $usuario_id;
        } else {
            if(strlen($data_usuario['password']) == 0) {
                $data_usuario['password'] = DAOFactory::getUsuariosDAO()->load($data['usuarioId'])->password;
            }
            $usuario = DAOFactory::getUsuariosDAO()->prepare($data_usuario, $data['usuarioId']);
            DAOFactory::getUsuariosDAO()->update($usuario);
            $data['idUsuario'] = $data['usuarioId'];
        }
        $now = date("Y-m-d");
        $data['tiempoCreacion'] = $now;
        
        $reserva = DAOFactory::getReservacionesDAO()->prepare($data);
        $reserva_id = DAOFactory::getReservacionesDAO()->insert($reserva);
        if(!$reserva_id) throw new Exception('Cannot insert reserva');
        foreach ($data_cobros as $cobro) {
            $cobro['idMoneda'] = 1;
            $cuenta = DAOFactory::getCuentasDAO()->prepare($cobro);
            $cuenta_id = DAOFactory::getCuentasDAO()->insert($cuenta);
            
            if(!$cuenta_id) throw new Exception('Cannot insert cuenta');
            $cobro['tiempoCreacion'] = $now;
            $cobro['idCuenta'] = $cuenta_id;
            $cobro['idReservacion'] = $reserva_id;
            if(!isset($cobro['validada'])) $cobro['validada'] = 0;
            $reservacion_pago = DAOFactory::getReservacionesPagosDAO()->prepare($cobro);            
            $reservacion_pago_id = DAOFactory::getReservacionesPagosDAO()->insert($reservacion_pago);
        }
        
        foreach ($articulos as $a=>$cant) {
            if($cant > 0) {
                $art = DAOFactory::getReservacionesArticulosDAO()->prepare(array('idReservacion'=>$reserva_id, 'idArticulo'=>$a, 'cantidad' => $cant));
                DAOFactory::getReservacionesArticulosDAO()->insert($art);
            }
        }
        
        registrarAccion("insert", "reservaciones", $reserva_id);

        $transaction->commit();

        return $reserva_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateReserva($reserva_id, $data = array(), $data_usuario = array(), $data_cobros = array(), $articulos = array()) {
    try {
        $transaction = new Transaction();

        if(!isset($data['usuarioId'])) {
            $data_usuario['idUsuarioGrupo'] = 2;
            $data_usuario['tiempoCreacion'] = date("Y-m-d");
            $usuario = DAOFactory::getUsuariosDAO()->prepare($data_usuario);
            $usuario_id = DAOFactory::getUsuariosDAO()->insert($usuario);
            $data['idUsuario'] = $usuario_id;
        } else {
            if(strlen($data_usuario['password']) == 0) {
                $data_usuario['password'] = DAOFactory::getUsuariosDAO()->load($data['usuarioId'])->password;
            }
            $usuario = DAOFactory::getUsuariosDAO()->prepare($data_usuario, $data['usuarioId']);
            DAOFactory::getUsuariosDAO()->update($usuario);
            $data['idUsuario'] = $data['usuarioId'];
        }
        $now = date("Y-m-d");
        $data['tiempoCreacion'] = $now;
        
        $reserva = DAOFactory::getReservacionesDAO()->prepare($data, $reserva_id);
        DAOFactory::getReservacionesDAO()->update($reserva);
        if(!$reserva_id) throw new Exception('Cannot insert reserva');
        
        $reservas_pagos = DAOFactory::getReservacionesPagosDAO()->queryByIdReservacion($reserva_id);
        foreach ($reservas_pagos as $rp) {
            $existe = false;
            foreach ($data_cobros as $cobro) {
                if(isset($cobro['idReservacionPago']) && $rp->idReservacionPago == $cobro['idReservacionPago']) {
                    $existe = true;
                    break;
                }
            }
            if(!$existe) {
                DAOFactory::getReservacionesPagosDAO()->delete($rp->idReservacionPago);
                DAOFactory::getCuentasDAO()->delete($rp->idCuenta);
            }
        }
        
        foreach ($data_cobros as $cobro) {
            if(isset($cobro['idReservacionPago'])) {
                $reservacion_pago_id = $cobro['idReservacionPago'];
                $cobro['ultimaModificacion'] = $now;
                if(!isset($cobro['validada'])) $cobro['validada'] = 0;
                $reservacion_pago = DAOFactory::getReservacionesPagosDAO()->prepare($cobro, $reservacion_pago_id);
                DAOFactory::getReservacionesPagosDAO()->update($reservacion_pago);
                $cuenta = DAOFactory::getCuentasDAO()->prepare($cobro, $reservacion_pago->idCuenta);
                DAOFactory::getCuentasDAO()->update($cuenta);
                
            } else {
                
                $cobro['idMoneda'] = 1;
                $cuenta = DAOFactory::getCuentasDAO()->prepare($cobro);
                $cuenta_id = DAOFactory::getCuentasDAO()->insert($cuenta);

                if(!$cuenta_id) throw new Exception('Cannot insert cuenta');
                $cobro['tiempoCreacion'] = $now;
                $cobro['idCuenta'] = $cuenta_id;
                $cobro['idReservacion'] = $reserva_id;
                if(!isset($cobro['validada'])) $cobro['validada'] = 0;
                $reservacion_pago = DAOFactory::getReservacionesPagosDAO()->prepare($cobro);            
                $reservacion_pago_id = DAOFactory::getReservacionesPagosDAO()->insert($reservacion_pago);
            }
            
        }
        
        DAOFactory::getReservacionesArticulosDAO()->deleteByIdReservacion($reserva_id);
        
        foreach ($articulos as $a=>$cant) {
            if($cant > 0) {
                $art = DAOFactory::getReservacionesArticulosDAO()->prepare(array('idReservacion'=>$reserva_id, 'idArticulo'=>$a, 'cantidad'=>$cant));
                DAOFactory::getReservacionesArticulosDAO()->insert($art);
            }
        }
        
        registrarAccion("update", "reservaciones", $reserva_id);

        $transaction->commit();

        return $reserva_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function getReserva($idReserva) {
    try {
        $reserva = DAOFactory::getReservacionesDAO()->load($idReserva);
        $pagos = DAOFactory::getReservacionesPagosDAO()->queryByIdReservacionAndFormaPago($reserva->idReservacion, "pago");
        if($pagos && count($pagos) > 0) {
            foreach ($pagos as $pago) {
                $pago->cuenta = DAOFactory::getCuentasDAO()->load($pago->idCuenta);
            }
            $reserva->pagos = $pagos;
        }
        $fianzas = DAOFactory::getReservacionesPagosDAO()->queryByIdReservacionAndFormaPago($reserva->idReservacion, "fianza");
        if($fianzas && count($fianzas) > 0) {
            foreach ($fianzas as $pago) {
                $pago->cuenta = DAOFactory::getCuentasDAO()->load($pago->idCuenta);
            }
            $reserva->pagosFianza = $fianzas;
        }
        return $reserva;
    } catch (Exception $e) {
        return false;
    }
}



function getReservaByUsuario($idUsuario) {
    try {
        $reservas = DAOFactory::getReservacionesDAO()->queryByIdUsuario($idUsuario);
        return $reservas;
    } catch (Exception $e) {
        return false;
    }
}

function getHuesped($idHuesped) {
    try {
        $huesped = DAOFactory::getHuespedesDAO()->load($idHuesped);
        return $huesped;
    } catch (Exception $e) {
        return false;
    }
}

function searchReservas($data = array()) {
    try {
        $reservas = DAOFactory::getReservacionesDAO()->searchByArguments($data);
        foreach($reservas as $reserva) {
            
            $reserva->huesped = DAOFactory::getUsuariosDAO()->load($reserva->idUsuario);
            $pagos = DAOFactory::getReservacionesPagosDAO()->queryByIdReservacionAndFormaPago($reserva->idReservacion, "pago");
            if($pagos && count($pagos) > 0) {
                foreach ($pagos as $pago) {
                    $pago->cuenta = DAOFactory::getCuentasDAO()->load($pago->idCuenta);
                }
                $reserva->pagos = $pagos;
            }
        }
        //var_dump($reservas);
        return $reservas;
    } catch (Exception $e) {
        var_dump($e);
        return false;
    }
}

function cambiarEstatusReserva($idReserva, $estatus){
    try {
        $transaction = new Transaction();

        $reserva = DAOFactory::getReservacionesDAO()->load($idReserva);
        
        $reserva->estatus = $estatus;
        
        DAOFactory::getReservacionesDAO()->update($reserva);
        
        registrarAccion("update", "reservaciones", $idReserva);

        $transaction->commit();

        return true;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function getCanales() {
    try {
        $canales = DAOFactory::getCanalesDAO()->queryAll();
        return $canales;
    } catch (Exception $e) {
        return false;
    }
}

function getReservasByEstado($estado) {
    try {
        $rs = DAOFactory::getReservacionesDAO()->queryByEstatus($estado);
        return $rs;
    } catch (Exception $e) {
        return false;
    }
}

function getReservasParaHoy() {
    try {
        $estado = "Aprobado";
        $fecha = date("Y-m-d");
        $rs = DAOFactory::getReservacionesDAO()->queryByEstatusAndFechaEntrada($estado, $fecha);
        return $rs;
    } catch (Exception $e) {
        return false;
    }
}

?>