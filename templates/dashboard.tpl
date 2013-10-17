{extends file="index.tpl"}

{block name="style" append}
<link href="{$template_url_s}/css/dashboard.css" rel="stylesheet">
{/block}

{block name="content" append}
       <div class="container row-fluid">
        <div class="contenedor-datos col-md-8">
        	 <div class="titulo col-md-12">

<div class="bs-example bs-example-tabs">
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#perfil" data-toggle="tab">Perfil</a></li>
        <li class=""><a href="#reserva" data-toggle="tab">Reserva</a></li>
       
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="perfil">
         <form class="form-inline row" role="form">
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
  </div>
  <div class="form-group col-md-6">
   <label for="exampleInputEmail1">Apellido Paterno</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Apellido Paterno">
  </div>
  </form>
<form class="form-inline row" role="form">
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1">Apellido Materno</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Apellido Materno">
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1">Correo eletrónico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo electrónico">
  </div>
  </form>
  <form class="form-inline row" role="form">
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1">Numero telefónico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Numero telefónico">
  </div>
  <div class="form-group col-md-6">
     <label for="exampleInputPassword1">Cantaseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contaseña">
  </div>
  </form>
   <form class="form-inline row" role="form">
  <div class="form-group col-md-6">
     <label for="exampleInputPassword1">Confirmar contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirmar contraseña">
  </div> 
<button type="button" class="btn btn-primary btn-sm">Guardar</button>
  </form>

        </div>
        <div class="tab-pane fade" id="reserva">
          <form class=" contenedor-reserva form-inline row" role="form">
  <div class="contenedor-foto col-md-3">
   <img data-src="holder.js/140x140" src="" class="img-thumbnail" alt="140x140" style="width: 140px; height: 140px;">
  </div>
     <div class="contenido-llegada col-md-7">
  <h3>Las dunas</h3>
   <p><strong>fecha de llegada:</strong> Martes 20 de diciembre 2013</p>
   <p><strong>fecha de Salida:</strong></p>
   <p><strong>Total:</strong> €350.00</p>
</div>
  <div class="botones col-md-2">
    <button type="button" class="btn btn-primary">Ver reserva</button>
   <button2 type="button" class=" opinan btn btn-primary">Opinar</button2>
  </div>
  </form>
   
<form class="form-inline row" role="form">
  <div class="contenedor-foto col-md-3">
   <img data-src="holder.js/140x140" src="" class="img-thumbnail" alt="140x140" style="width: 140px; height: 140px;">
  </div>
     <div class="contenido-llegada col-md-7">
  <h3>Las dunas</h3>
   <p><strong>fecha de llegada:</strong> Martes 20 de diciembre 2013</p>
   <p><strong>fecha de Salida:</strong></p>
   <p><strong>Total:</strong> €350.00</p>
</div>
  <div class="botones col-md-2">
    <button type="button" class="btn btn-primary">Ver reserva</button>
   <button2 type="button" class=" opinan btn btn-primary">Opinar</button2>
  </div>
  </form>

<form class="form-inline row" role="form">
  <div class="contenedor-foto col-md-3">
   <img data-src="holder.js/140x140" src="" class="img-thumbnail" alt="140x140" style="width: 140px; height: 140px;">
  </div>
     <div class="contenido-llegada col-md-7">
  <h3>Las dunas</h3>
   <p><strong>fecha de llegada:</strong> Martes 20 de diciembre 2013</p>
   <p><strong>fecha de Salida:</strong></p>
   <p><strong>Total:</strong> €350.00</p>
</div>
  <div class="botones col-md-2">
    <button type="button" class="btn btn-primary">Ver reserva</button>
   <button2 type="button" class=" opinan btn btn-primary">Opinar</button2>
  </div>
  </form>
        </div>
        
      
      </div>
    </div>







     




       </div>
        </div>
      
        </div>
{/block}