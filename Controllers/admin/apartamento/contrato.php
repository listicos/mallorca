<?php

$usuario_core->validateUser();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $apartamento = getApartamento($id);
    
    $empresa_contrato = getEmpresaContrato($apartamento->idEmpresaContrato);
    
    $contrato = getContrato($empresa_contrato->idContrato);
    
    $usuario = $usuario_core->getUsuario();
    
    $pdf = new PDFWriter();
    $title = 'Contrato de ' . $apartamento->nombre;
    $pdf->SetTitle($title);
    $pdf->SetAuthor($usuario->nombre);
    $texto = "Si el cliente reserva una estancia de " . $contrato->diasLargaEstancia . " días o más, Clickandbooking está autorizado a reducir el precio contratado por día y los gastos relacionados suplementarios del " . $contrato->porcientoLargaEstancia . "%";
    $pdf->PrintRow(1,'Alquileres de larga estancia', $texto);
    $texto = "Si el cliente reserva sus vacaciones al menos " . $contrato->mesesReservasAnticipadas . " meses antes de la fecha de llegada, ClickAndBooking está autorizado a reducir el precio contratado por día y los gastos relacionados suplementarios del " . $contrato->porcientoReservasAnticipadas . "%";
    $pdf->PrintRow(2,'Reserva anticipada (Early Birds)',$texto);
    
    $texto = "Si el cliente reserva sus vacaciones " . $contrato->diasReservasUltimoMinuto . " días antes de la llegada, ClickAndBooking está autorizado a reducir el precio contratado por día y los gastos relacionados suplementarios del " . $contrato->porcientoReservasUltimoMinuto . "% (válido únicamente para estancias de 7 noches)";
    $pdf->PrintRow(3,'Reserva de último minuto',$texto);
    
    $texto = "El propietario oferta a ClickAndBooking una estancia de una semana gratis en su casa de vacaciones con fines de márketing (no aplicable en temporada alta). A cambio, el propietario podrá elegir una estancia de una semana en una propiedad de ClickAndBooking de la misma categoría y calidad (no aplicable en temporada alta) Cualquier gasto adicional se pagará en el lugar";
    $pdf->PrintRow(4,'Semana gratis',$texto);
    
    $texto = "Si durante las 8 semanas previas a la ocupación del alojamiento es más bajo del 25% sobre un periodo de 28 días, ClickAndBooking está autorizado a reducir el precio contratado por día y los gastos relacionados suplementarios del 20% para mejorar la tasa de ocupación.";
    $pdf->PrintRow(5,'Especiales',$texto);
    
    
    $pdf->Output();
}

?>
