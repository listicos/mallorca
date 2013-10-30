{extends file="index.tpl"}

{block name="script" append}
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/registrar.css" rel="stylesheet">
{/block}

{block name="content" append}
<div class="container row-fluid">
<div class="panel panel-default col-md-offset-2 pull-left">
 <div class="panel-heading">Registrar</div>
  <div class="panel-body">
   <form class="form-inline" role="form">
  <div class="form-group1 col-md-6">
     <label for="exampleInputEmail1">Nombre</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
  </div>
  <div class="form-group1 col-md-6">
   <label for="exampleInputEmail1">Apellido paterno</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Apellido paterno">
  </div>
  </form>
 <form class="form-inline" role="form">
  <div class="form-group1 col-md-6">
     <label for="exampleInputEmail1">Nacionalidad</label>
  <select class="form-control">
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>
  </div>
  <div class="form-group1 col-md-6">
   <label for="exampleInputEmail1">Correo electrónico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo electrónico">
  </div>
  </form>
   <form class="form-inline" role="form">
  <div class="form-group1 col-md-6">
     <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
  </div>
  <div class="form-group1 col-md-6">
    <label for="exampleInputPassword1">Repita contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Repita contraseña">
  </div>
  
  </form>
   <form class="form-inline" role="form">
   <div class="form-group1 col-md-12">
   <button type="button" class="btn btn-primary pull-right">Registrar</button>
   </div>
   </form>
  
  </div>
</div>
</div>
{/block}