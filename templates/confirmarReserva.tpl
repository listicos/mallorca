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
  	<h3>{#gracias_su_reserva_se_ha_realizado_correctamente#}</h3>
  </div>
</div>
<div class="bs-example">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th colspan="2">{#datos_de_la_reserva_realizada_el#} 18/10/2013</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="col-md-4">
            <dl class="dl-horizontal">
        <dt>{no_de_reserva#}</dt>
      </dl></td>
            <td class="col-md-8"><dt> 350</dt></td> 
          </tr>
          <tr>
             <td class="col-md-4">
            <dl class="dl-horizontal">
        <dt>{#nombre#}</dt>
      </dl></td>
            <td class="col-md-8"><dt></dt></td> 
          </tr>
          <tr>
            <td class="col-md-4">
            <dl class="dl-horizontal">
        <dt>{#email#}</dt>
      </dl></td>
            <td class="col-md-8"><dt></dt></td> 
           </tr>
          <tr>        
            <td class="col-md-4">
            <dl class="dl-horizontal">
        <dt>{#alojamiento#}</dt>
      </dl></td>
            <td class="col-md-8"><dt>Las Dunas</dt></td> 
          </tr>
           <tr>        
            <td class="col-md-4">
            <dl class="dl-horizontal">
        <dt>{#direccion#}</dt>
      </dl></td>
            <td class="col-md-8"><dd>9981000000 calle,45</dd></td> 
          </tr>
           <tr> 
            <td class="col-md-4">
            	<dl class="dl-horizontal">
        <dt>{#fecha_de_entrada#}</dt>
        <dd>Miercoles 18 de septiembre 2013<br>{#entrada_apartir_de_las#} 22:00hrs.</dd></dl>
      </td>
      <td class="col-md-8">
       <dl class="dl-horizontal">
        <dt>{#fecha_de_salida#}</dt>
         <dd>Jueves 20 de octubre 2013<br>{#salidas_hasta_las#} 00:00hrs.</dd></dl>
      </td>
          </tr>
         <tr>
         	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>{#total_de_noches#}</dt>
        <dd>8</dd>
        <dt>{#cantidad#}</dt>
        <dd>1 Apartamento</dd>
        <dt>{#observaciones#}</dt>
        <dd>123123123</dd>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>{#adultos#}</dt>
        <dd>2</dd>
        <dt>{#ninios#} (0-12 años):</dt>
        <dd>1</dd>
      </dl>
      </td>
         </tr>
        <tr>
        	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>{#precio_de_la_estancia#}</dt>
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
        <dt>{#iva_incluido_impuestos_municipales_y_o_turisticos_no_incluidos#}</dt>
      </dl>
      </td>
        </tr>
         <tr>
         	<th colspan="2">{#registro_de_entrada_y_entrega_de_llaves#}</th>
         </tr>
          <tr>
          <td class="col-md-4">
          	<dl class="dl-horizontal">
        <dt>{#direccion#}</dt>
        <dd>987654<br>calle lavapies,9 Madrid España  </dd>
        <dt>{#telefono#}</dt>
        <dd>1234567</dd>
        <dt>{#fax#}</dt>
        <dd>1234567</dd>
        <dt>{#email#}</dt>
        <dd>reservas@mallorcarenthaus.com</dd>
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
        <dt>{#tarifa_de_limpieza#}</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>{#incluido_no_incluida#}</dt>
      </dl>
      </td>
            </tr>
         <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>{#otros_suplementos#}</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>{#no_incluidos#}</dt>
      </dl>
      </td></tr>
         <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>{#deposito_de_seguridad#}</dt>
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
        <dt>{#el_importe_aplicado_en_fianza_del_apartamento_reembolsable_al_final_de_la_estancia#}</dt>
      </dl>
      </td></tr>
       <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>{#pago_por_adelantado#}</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>{#se_realizar_un_cargo#} </dt>
      </dl>
      </td></tr>
      <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>{#tarjetas_aceptadas#}</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt></dt>
      </dl>Visa.Euro/Mastercard
      </td></tr>
      <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>{#politica_de_cancelaciones#}</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>{#si_cancela_su_reserva#} </dt>
      </dl>
      </td></tr>
      <tr>
            	<td class="col-md-4">
         		<dl class="dl-horizontal">
        <dt>{#nota_importante#}</dt>
      </dl>
      <td class="col-md-8">
         		<dl class="dl-horizontal">
        <dt>{#en_el_improbable_caso#}  </dt>
      </dl>
      </td></tr>
       <tr>
         	<th colspan="2">{#gracias_por_haber_reservado_con#} Mallorca Rent Haus.</th>
         </tr>

          </tr>
        </tbody>
      </table>
    </div>








       </div>
{/block}