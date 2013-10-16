<?php /* Smarty version Smarty-3.1.13, created on 2013-10-08 00:37:42
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184639456525331cfcbd6b1-91334155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1381185461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184639456525331cfcbd6b1-91334155',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_525331cfd0fac3_83460684',
  'variables' => 
  array (
    'template_url_s' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525331cfd0fac3_83460684')) {function content_525331cfd0fac3_83460684($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Mallorca</title>

        <link href="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/css/styles.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/css/reset.css" rel="stylesheet">
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
                                <div class="carousel-caption">
                                    <h1>www.mallorcarentthaus.com</h1>
                                    <p>Alquila Villas de Don Pedro.</p>
                                </div>
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
                                <dl class="dl-horizontal">
                                    <dt>VIAJE</dt>
                                    <dd>
                                        <div class="row">
                                            <div id="dateStart" class="filter-inputs date datepicker date-start" data-date-format="dd-mm-yyyy">
                                                <input size="16" class="col-lg-12 btn-primary" name="dateStart" type="text" value="" readonly>
                                                <span class="add-on"><i class="glyphicon glyphicon-calendar icon-white"></i></span>
                                            </div>
                                            <div id="dateEnd" class="filter-inputs date datepicker date-end" data-date-format="dd-mm-yyyy">
                                                <input size="16" class="col-lg-12 btn-primary" name="dateEnd" type="text" value="" readonly>
                                                <span class="add-on"><i class="glyphicon glyphicon-calendar icon-white"></i></span>
                                            </div>
                                            <select class="filter-inputs selectpicker row" data-style="btn-defualt"  title="Huéspedes">
                                                <option>1 Huésped</option>
                                                <option>2 Huéspedes</option>
                                                <option>3 Huépedes</option>
                                                <option>4 Huépedes</option>
                                                <option>5+ Huépedes</option>
                                            </select>
                                        </div>
                                    </dd>
                                </dl>
                            </div>

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
                                        <p> anuncios · Mallorca, Islas Baleares, España</p>
                                    </div>
                                </div>
                                <div class="row result-list-container">
                                    <div class="col-lg-6 result-item">
                                        <div class="carousel slide"  id="result-slider-1">

                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/img/slide_1.png" alt="Photo 1">
                                                    <div class="carousel-caption">
                                                        <p>Lorem ipsum dolor sit amet</p>
                                                        <span class="comments-icon">2</span>
                                                    </div>
                                                    <div class="add-to-wishlist"></div>
                                                </div>
                                            </div>
                                            <div class="back-images layer-1"></div>
                                            <div class="back-images layer-2"></div>

                                            <a class="left carousel-control" href="#result-slider-1" data-slide="prev">
                                                <span class="icon-prev"></span>
                                            </a>
                                            <a class="right carousel-control" href="#result-slider-1" data-slide="next">
                                                <span class="icon-next"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 result-item">
                                        <div class="carousel slide"  id="result-slider-2">

                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/img/slide_1.png" alt="Photo 1">
                                                    <div class="carousel-caption">

                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/img/slide_2.png" alt="Photo 2">
                                                    <div class="carousel-caption">

                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/img/slide_3.png" alt="Photo 3">
                                                    <div class="carousel-caption">
                                                        <p>Lorem ipsum dolor sit amet</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="back-images layer-1"></div>
                                            <div class="back-images layer-2"></div>

                                            <a class="left carousel-control" href="#result-slider-2" data-slide="prev">
                                                <span class="icon-prev"></span>
                                            </a>
                                            <a class="right carousel-control" href="#result-slider-2" data-slide="next">
                                                <span class="icon-next"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
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

        <script src="<?php echo $_smarty_tpl->tpl_vars['template_url_s']->value;?>
/js/home.js"></script>
    </body>
</html>
<?php }} ?>