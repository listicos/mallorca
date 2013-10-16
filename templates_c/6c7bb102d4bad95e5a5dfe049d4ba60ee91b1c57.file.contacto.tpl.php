<?php /* Smarty version Smarty-3.1.13, created on 2013-10-16 07:09:45
         compiled from "./templates/contacto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87583863525e1efe6c1992-76196747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c7bb102d4bad95e5a5dfe049d4ba60ee91b1c57' => 
    array (
      0 => './templates/contacto.tpl',
      1 => 1381900183,
      2 => 'file',
    ),
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1381186028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87583863525e1efe6c1992-76196747',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_525e1efe71d5d8_93550102',
  'variables' => 
  array (
    'template_url_s' => 0,
    'base_url' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e1efe71d5d8_93550102')) {function content_525e1efe71d5d8_93550102($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Mallorca</title>
        
            <link href="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/css/styles.css" rel="stylesheet">
            <link href="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/css/datepicker.css" rel="stylesheet">
            <link href="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/css/bootstrap.css" rel="stylesheet">
            <link href="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/css/bootstrap-glyphicons.css" rel="stylesheet">
            <link href="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/css/bootstrap-select.css" rel="stylesheet">
            <link href="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/css/jquery-ui.css" rel="stylesheet">
            <link href="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/css/jquery.ui.slider.css" rel="stylesheet">
        
<link href="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/css/contacto.css" rel="stylesheet">
 
    </head>
    <body>
        <div class="wrapper">
          
        <div class="container row-fluid">
            <div class="titulo row-fluid">
                <div class="col-xs-12">
                    <h2>Contacto</h2>
                </div>
            </div>

            <div class="contenedor-mapa row-fluid">

                <div class="container-mapa">

                    Aqui va un mapa
                </div>      
            </div> 


            <div class="container-columnas row">
                <div class="contacto col-md-8">
                    <div class="titulo-contacto col-md-12">
                        <h3>Contáctanos</h3>
                    </div>
                    <div class="datos-contacto row">
                        <form class="form-inline col-md-12" role="form">
                            <div class="form-group col-md-6">  
                                <label class="sr-only" for="exampleInputEmail2">Nombre completo</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nombre completo">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="sr-only" for="exampleInputEmail2">Correo eletrónico</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo electrónico">
                            </div>
                        </form>
                    </div>
                    <div class="contenedor-textarea row-fluid">
                        <form class="bs-example col-md-12">
                            <textarea class="btn-box-text validate[required]" name="mensaje" placeholder="Mensaje" style="margin: 16px 0px 0px; height: 150px; width: 723px;"></textarea>
                        </form>
                    </div>
                    <div class="contenedor-boton row-fluid">

                        <button type="button" class="btn btn-primary">Enviar</button>

                    </div>
                </div>
                <div class="columna-derecha row-fluid col-md-4">
                    <div class="boletin-informativo col-md-12">
                        <h3>Boletín Informativo</h3>
                    </div>
                    <div class="contenido-boletin">
                        <p class="col-md-12">Suscríbete a nuestro boletín ahora para estar actualizado con las novedades.</p>
                    </div>
                    <form role="form">
                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo eletrónico">
                        </div>
                        <div class="contenedor-enviar col-md-12">
                            <button type="button" class="btn btn-primary pull-right">Enviar</button>
                        </div>
                        <div class="detalles col-md-12">
                            <h3>Detalles</h3>
                        </div>
                        <div class="contenido-detalles  row-fluid col-md-12">

                            <p><strong>Empresa:</strong> Fuertetour </p>
                            <p><strong>CIF:</strong> 34678637485 </p>
                            <p><strong>Dirección:</strong> Mi calle mi número </p>

                        </div>
                    </form>
                </div>
            </div> 
        </div>

        </div>

            <script type="text/javascript">
                var BASE_URL = "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
";
                var LANGUAGE = "<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
";
            </script>
         
            <script src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/js/jquery-1.9.1.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/js/bootstrap.min.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/js/bootstrap-dropdown.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/js/bootstrap-select.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/js/bootstrap-datepicker.js"></script>

            <script src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/js/jquery.ui.core.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/js/jquery.ui.widget.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/js/jquery.ui.mouse.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/js/jquery.ui.slider.js"></script>
        
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
  
    </body>
</html>
<?php }} ?>