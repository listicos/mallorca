<?php

$usuario_core->validateUser();

AllowRoles("Administrador, Socio");

$template = new Core_template('admin/template.php');

$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setView('admin/empresa/ver.php');
$template->setJS('admin/gestion-empresas.js');
$template->setTitle("Gestión de propietarios");

$paises = getPaises();
$monedas = getMonedas();
$provincias = getProvincias();
$contratos = getContratos();
$edit = false;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $empresa = getEmpresa($_GET['id']);
    if ($empresa) {
        $template->setAttribute('empresa', $empresa);
        $direccion = getDireccion($empresa->idDireccion);
        $contratosEmpresa = getContratoEmpresa($_GET['id']);

        if ($direccion) {
            $template->setAttribute('direccion', $direccion);
            $cuenta = getCuentaByEmpresaId($empresa->idEmpresa);

            $edit = true;

            if ($cuenta && count($cuenta) > 0) {
                $template->setAttribute('cuenta', array_pop($cuenta));
            }
        }
        
        if($contratosEmpresa){
            foreach ($contratosEmpresa as $key => $contratosEmp) {
                $contratosEmpresa[$key]->fechaInicio = date('d-m-Y', strtotime($contratosEmpresa[$key]->fechaInicio));
                $contratosEmpresa[$key]->fechaFin = date('d-m-Y', strtotime($contratosEmpresa[$key]->fechaFin));
            }
            $template->setAttribute('contratosEmpresa', $contratosEmpresa);
        }else{
            $template->setAttribute('contratosEmpresa', false);
        }
        $usuario = getUsuarioByEmail($empresa->email);

    }else{
        $usuario = new Usuario();
    }
    
}

$template->setAttribute('edit', $edit);
$template->setAttribute('paises', $paises);
$template->setAttribute('usuario', $usuario);
$template->setAttribute('monedas', $monedas);
$template->setAttribute('provincias', $provincias);
$template->setAttribute('contratos', $contratos);

echo $template->render();
?>
