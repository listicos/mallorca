<?php /* Smarty version Smarty-3.1.13, created on 2013-10-08 22:38:15
         compiled from "./templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89344512352533841554237-54776282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62ef71fa9bffee4b2e45ea97bf20c2caac4cf263' => 
    array (
      0 => './templates/home.tpl',
      1 => 1381264695,
      2 => 'file',
    ),
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1381186028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89344512352533841554237-54776282',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5253384159a294_52207967',
  'variables' => 
  array (
    'template_url_s' => 0,
    'base_url' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5253384159a294_52207967')) {function content_5253384159a294_52207967($_smarty_tpl) {?><!DOCTYPE html>
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
         
    </head>
    <body>
        <div class="wrapper">
          
<div class="container-liquid header">
    <div class="row">
        <div class="carousel slide"  id="header-slider">
            <ol class="carousel-indicators">
                <li data-target="#header-slider" data-slide-to="0" class="active"></li>
                <li data-target="#header-slider" data-slide-to="1"></li>
                <li data-target="#header-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/img/header_1.png" alt="Photo 1">
                </div>
                <div class="item">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/img/header_2.png" alt="Photo 2">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/img/header_3.png" alt="Photo 3">
                    <div class="carousel-caption">

                    </div>
                </div>
            </div>
            <div class="back-images layer-1"></div>
            <div class="back-images layer-2"></div>

            <a class="left carousel-control" href="#header-slider" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#header-slider" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </div>
    </div>

    <div class="col-lg-5" id="main_filters_container">
        <h4 class="text-center">¿Cuando quieres ir?</h4>
        <div class="row-fluid">
            <form class="form-inline" role="form">
                  <div class="form-group">
                    <div id="dateStart" class="filter-inputs date datepicker date-start" data-date-format="dd-mm-yyyy">
                        <input size="16" class="col-lg-12" name="dateStart" type="text" value="<?php echo $_smarty_tpl->tpl_vars['dia_comienzo']->value;?>
" readonly>
                        <span class="add-on"><i class="glyphicon glyphicon-calendar icon-white"></i></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div id="dateEnd" class="filter-inputs date datepicker date-end" data-date-format="dd-mm-yyyy">
                        <input size="16" class="col-lg-12" name="dateEnd" type="text" value="<?php echo $_smarty_tpl->tpl_vars['dia_comienzo']->value;?>
" readonly>
                        <span class="add-on"><i class="glyphicon glyphicon-calendar icon-white"></i></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <select class="form-control" data-style="btn-defualt"  title="Huéspedes">
                        <option>1 Huésped</option>
                        <option>2 Huéspedes</option>
                        <option>3 Huépedes</option>
                        <option>4 Huépedes</option>
                        <option>5+ Huépedes</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-default form-control btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-liquid  content">
    <div class="row">
        <div class="col-sm-5 main-left-container">
            <div class="row"  id="mapa">
                <div id="details-map-location"></div>
            </div>
        </div>
        <div class="col-sm-7 main-right-container">
            <div class="row">
                <div class="col-lg-12 filters-row">
                    <dl  class="dl-horizontal">
                        <dt>PRECIO</dt>
                        <dd>
                            <div class="row">
                                <div id="slider-range"></div>
                                <div class="range-prices-content">
                                    <p class="pull-left">
                                        <label for="amount">Precio mínimo:</label>
                                        <span id="amount-min" style="border:0; font-weight:bold;" />
                                    </p>
                                    <p class="pull-right">
                                        <label for="amount">Precio máximo:</label>
                                        <span  id="amount-max" style="border:0; font-weight:bold;" />
                                    </p>
                                    <br class="clearfix"/>
                                </div>
                            </div>
                        </dd>
                    </dl>
                </div>

                <div class="col-lg-12 filters-row">
                    <div class="row more-filters">
                        <div class="col-lg-6">
                            <a href="#" onclick="return false;" class="btn btn-default">Más filtros</a>
                        </div>
                        <div class="col-lg-6">
                            <p><span class="badge">12 anuncios</span> · Mallorca, Islas Baleares, España</p>
                        </div>
                    </div>
                    <div class="row result-list-container">
                        <?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['apartamentos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['apartamentos']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['apartamentos']['index']++;
?>
                            <div class="col-lg-6 result-item">
                                <div class="carousel slide"  id="result-slider-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['apartamentos']['index'];?>
">
                                    <div class="carousel-inner">
                                        <?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a']->value['adjuntos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['b']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value){
$_smarty_tpl->tpl_vars['b']->_loop = true;
 $_smarty_tpl->tpl_vars['b']->index++;
 $_smarty_tpl->tpl_vars['b']->first = $_smarty_tpl->tpl_vars['b']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['adjuntos']['first'] = $_smarty_tpl->tpl_vars['b']->first;
?>
                                            <div class="item <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['adjuntos']['first']){?>active<?php }?>">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['template_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['b']->value->ruta;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['a']->value['apartamento']->nombre;?>
">
                                                <div class="carousel-caption">
                                                    <p>
                                                    <?php echo $_smarty_tpl->tpl_vars['a']->value['apartamento']->nombre;?>
</p>
                                                    <span class="comments-icon">2</span>
                                                </div>
                                                <div class="add-to-wishlist"></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="back-images layer-1"></div>
                                    <div class="back-images layer-2"></div>

                                    <a class="left carousel-control" href="#result-slider-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['apartamentos']['index'];?>
" data-slide="prev">
                                        <span class="icon-prev"></span>
                                    </a>
                                    <a class="right carousel-control" href="#result-slider-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['apartamentos']['index'];?>
" data-slide="next">
                                        <span class="icon-next"></span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
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
    <script src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/js/home.js"></script>
  
    </body>
</html>
<?php }} ?>