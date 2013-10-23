{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/apartamento.css" rel="stylesheet">
{/block}

{block name="content" append}
       <div class="container row-fluid">
         <div class="row">
  <div class="col-md-12">
  	<h3>Gracias,su reserva se ha realizado correctamente.</h3>
  </div>
</div>
<div class="bs-example">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th colspan="2">Datos de la reserva realizada el 18/10/2013</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="col-md-4">
            <dl class="dl-horizontal">
        <dt>No. de reserva:</dt>
      </dl></td>
            <td class="col-md-8"><dt> 350</dt></td> 
          </tr>
          <tr>
             <td class="col-md-4">
            <dl class="dl-horizontal">
        <dt>Nombre:</dt>
      </dl></td>
            <td class="col-md-8"><dt></dt></td> 
          </tr>
          <tr>
            <td class="col-md-4">
            <dl class="dl-horizontal">
        <dt>Email:</dt>
      </dl></td>
            <td class="col-md-8"><dt></dt></td> 
           </tr>
          <tr>        
            <td class="col-md-4">
            <dl class="dl-horizontal">
        <dt>Alojamiento:</dt>
      </dl></td>
            <td class="col-md-8"><dt>Las Dunas</dt></td> 
          </tr>
           <tr>        
            <td class="col-md-4">
            <dl class="dl-horizontal">
        <dt>Dirección:</dt>
      </dl></td>
            <td class="col-md-8"><dd>9981000000 calle,45</dd></td> 
          </tr>
           <tr> 
            <td class="col-md-4">
            	<dl class="dl-horizontal">
        <dt>Fecha de entrada:</dt>
        <dd>Miercoles 18 de septiembre 2013<br>Entrada apartir de las 22:00hrs.</dd></dl>
      </td>
      <td class="col-md-8">
       <dl class="dl-horizontal">
        <dt>Fecha de salida:</dt>
         <dd>Jueves 20 de octubre 2013<br>Salidas hasta las 00:00hrs.</dd></dl>
      </td>
          </tr>
         <tr>
         	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>Total de noches:</dt>
        <dd>8</dd>
        <dt>Cantidad:</dt>
        <dd>1 Apartamento</dd>
        <dt>Observaciones:</dt>
        <dd>123123123</dd>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>Adultos:</dt>
        <dd>2</dd>
        <dt>Niños (0-12 años):</dt>
        <dd>1</dd>
      </dl>
      </td>
         </tr>
        <tr>
        	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>Precio de la estancia:</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>$ 924.00</dt>
      </dl>
      </td>
        </tr>
         <tr>
         	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt></dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>IVA incluido.impuestos municipales y/o turisticos no incluidos</dt>
      </dl>
      </td>
        </tr>
         <tr>
         	<th colspan="2">Registro de entrada y entrega de llaves</th>
         </tr>
          <tr>
          <td class="col-md-4">
          	<dl class="dl-horizontal">
        <dt>Direccion:</dt>
        <dd>987654<br>calle lavapies,9 Madrid España  </dd>
        <dt>Telefono:</dt>
        <dd>1234567</dd>
        <dt>Fax:</dt>
        <dd>1234567</dd>
        <dt>Email:</dt>
        <dd>reservas@clickandbooking.com</dd>
      </dl></td>
       <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>aqui va un mapa</dt>
      </dl>
      </td>
          </tr>
            <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>Tarifa de limpieza:</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>Incluido/no incluida</dt>
      </dl>
      </td>
            </tr>
         <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>Otros suplementos:</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>No incluidos</dt>
      </dl>
      </td></tr>
         <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>Depósito de seguridad:</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>$ xx.xx</dt>
      </dl>
      </td></tr>
       <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt></dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>(El importe aplicado en fianza del apartamento,reembolsable al final de la estancia)</dt>
      </dl>
      </td></tr>
       <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>Pago por adelantado:</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>Se realizará un cargo de 35% del importe de esta reserva en la tarjeta con la que ha confirmado esta reserva en el momento en que se ha realizado la misma.El resto de la reserva y suplementos se abonaran a la llegada.</dt>
      </dl>
      </td></tr>
      <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>Tarjetas aceptadas:</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt></dt>
      </dl>Visa.Euro/Mastercard
      </td></tr>
      <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>Politica de cancelaciones:</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>Si cancela su reserva hasta el xx del xxxx (30 dias entes),23.59(hora local)del inicio de la estancia,se retendra un 5% del importe cobrado en conceptos de gastos administrativos.Si cancela su reserva desde el xx de xx de xx (7dias antes)00.00(hora local),o si no se presenta,se cargara en su tarjeta</dt>
      </dl>
      </td></tr>
      <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>Nota importante:</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>En el improbable caso de un problema con el alojamiento reservado,nos reservamos el derecho de modificar su reserva y reasignarlo a un alojamiento de similares caracteristicas y lo mas próximo posible al reservado. </dt>
      </dl>
      </td></tr>
       <tr>
         	<th colspan="2">Gracias poe haber reservado con Clickandbooking.</th>
         </tr>

          </tr>
        </tbody>
      </table>
    </div>








       </div>
{/block}