<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <title><?php echo $this->getTitle(); ?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo $this->template_url; ?>/css/admin/reset.css" media="all" >
        <link rel="stylesheet" type="text/css" href="<?php echo $this->template_url; ?>/css/admin/styles.css" media="all" >

        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-cerulean.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-timepicker.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/datepicker.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-select.css" rel="stylesheet">

        <link href="<?php echo $this->template_url; ?>/css/admin/charisma-app.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/jquery-ui-1.8.21.custom.css" rel="stylesheet">
        <link href='<?php echo $this->template_url; ?>/css/admin/colorbox.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/jquery.cleditor.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/jquery.noty.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/noty_theme_default.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/elfinder.min.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/elfinder.theme.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/opa-icons.css' rel='stylesheet'>

        <link href="<?php echo $this->template_url; ?>/css/admin/fullcalendar.css" rel="stylesheet" media="all">
        <link href="<?php echo $this->template_url; ?>/css/admin/fullcalendar.print.css" rel="stylesheet" media="print">

        <link href='<?php echo $this->template_url; ?>/css/admin/calendar_fix.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/toastr.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/animated.css' rel='stylesheet'>   
        <link href='<?php echo $this->template_url; ?>/css/admin/admin.css' rel='stylesheet'>     
        <link rel="stylesheet" href="<?php echo $this->template_url; ?>/css/admin/validationEngine.jquery.css" type="text/css">
        

        <?php foreach ($this->getCSS() as $css): ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $this->template_url; ?>/css/admin/<?php echo $css ?>" media="all" >
        <?php endforeach; ?>
        <script type="text/javascript">
            var TEMPLATE_URL = '<?php echo $this->template_url; ?>';
            var BASE_URL = '<?php echo $this->base_url; ?>';
        </script>
    </head>
    <body>
        <?php $is_visible_header = $this->getAttribute('is_visible_header'); $is_visible_sidebar = $this->getAttribute('is_visible_sidebar'); $is_edit_apartament = $this->getAttribute('is_edit_apartament'); ?>
        <?php if ($is_visible_header == true || $is_visible_header) { ?>
            <div class="navbar navbar_templete">
                <div class="navbar_inner_panel_templete">
                    <div class="row-fluid menu_top_content clearfix">
                        <div class="span9">
                            <div class="span8 menu_top_container">
                                <a href="<?php echo $this->base_url?>/admin-panel"><img src="<?php echo $this->template_url; ?>/imagen/logo.png"/></a>
                            </div>
                        </div>
                        <div class="span3 pull-right">
                            <div class="btn-toolbar btn_toolbar_templete"> 
                                <div class="btn-group">
                                    <a href="<?php echo $this->base_url; ?>/admin-perfil" class="btn btn-primary"><?php echo ActiveRole(); ?></a>
                                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->base_url; ?>/admin-perfil" media="all">Perfil</a></li>
                                        <li><a href="#">Configuración</a></li>
                                        <li><a href="#"></a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $this->base_url ?>/admin-logout">Cerrar sesión</a>
                                    </ul>
                                </div> 
                            </div>             
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="contenedor_custom_templete">
            <?php if ($is_visible_sidebar == true || $is_visible_sidebar) { ?>
                <div class="menu_custom_templete">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li class="nav-tabs nav_header_templete hidden-tablet "></li>
                        <?php if(hasRoles("Administrador, Socio, Reserva")) { ?>
                         <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-inicio"><i class="icon-home"></i><span class="hidden-tablet"> Inicio</span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Socio")) { ?>
                         <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-calendario"><i class="icon-plus"></i><span class="hidden-tablet"> Rentabilidad</span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Socio")) { ?>
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-calendario"><i class=" icon-calendar"></i><span class="hidden-tablet"> Calendario</span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Comercial, Socio")) { ?>
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-apartamento-lista"><i class="icon-home"></i><span class="hidden-tablet"> Apartamentos</span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Comercial, Socio")) { ?>
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-complejo-lista"><i class="icon-home"></i><span class="hidden-tablet"> Complejos</span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Socio")) { ?>
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-empresa-lista"><i class="icon-th-list"></i><span class="hidden-tablet"> Propietarios</span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Socio, Comercial")) { ?>
                        <!--<li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-contrato-lista"><i class="icon-folder-open"></i><span class="hidden-tablet"> Contratos</span></a></li>-->
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-cliente-lista"><i class="icon-briefcase"></i><span class="hidden-tablet"> Huéspedes</span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador")) { ?>
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-usuario-lista"><i class="icon-user"></i><span class="hidden-tablet"> Usuarios</span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Socio, Comercial")) { ?>
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-opinion-lista"><i class=" icon-comment"></i><span class="hidden-tablet"> Opiniones</span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Comercial, Socio")) { ?>
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-articulos-lista"><i class=" icon-shopping-cart"></i><span class="hidden-tablet"> Artículos adicionales</span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Reserva, Socio")) { ?>
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-reserva-lista"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Reservas <?php if($this->getAlerts()->reservasPendientes > 0 ) echo '<span class="badge badge-important orange pulse animated infinite" title="Pendientes">'.$this->getAlerts()->reservasPendientes.'</span>'; ?> <?php if($this->getAlerts()->reservasParaHoy > 0 ) echo '<span class="badge badge-important green pulse animated infinite" title="Para hoy">'.$this->getAlerts()->reservasParaHoy.'</span>'; ?></span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Reserva, Socio, Comercial")) { ?>
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-canales-lista"><i class="icon-book"></i><span class="hidden-tablet"> Canales </span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Socio")) { ?>
                         <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-mantenimientos-lista"><i class="icon-wrench"></i><span class="hidden-tablet" > Mantenimientos <?php if($this->getAlerts()->mantenimientosPendientes > 0) echo '<span class="badge orange badge-important pulse animated infinite" title="Pendientes">'.$this->getAlerts()->mantenimientosPendientes.'</span>'; ?> <?php if($this->getAlerts()->mantenimientosEnCurso > 0) echo '<span class="badge badge-important pulse animated infinite" title="En curso">'.$this->getAlerts()->mantenimientosEnCurso.'</span>'; ?></span></a></li>
                         <?php } ?>
                        <?php if(hasRoles("Administrador")) { ?>
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-factura-lista"><i class=" icon-folder-open"></i><span class="hidden-tablet"> Facturas</span></a></li>
                        <?php } ?>
                        <?php if(hasRoles("Administrador, Socio")) { ?>
                        <li><a class="ajax-link" href="<?php echo $this->base_url?>/admin-politicas-lista"><i class="icon-warning-sign"></i><span class="hidden-tablet"> Politicas de cancelación</span></a></li>                                             
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
        
        <div class="row-fluid" id="content">

            <div class="span11 breadcrumbs_templete">
                <h1><?php echo $this->getTitle(); ?></h1>
            </div>
            <?php
            foreach ($this->getViews() as $view) {
                if (is_string($view)) {
                    include($view);
                } else {
                    if ($view instanceof Core_template)
                        echo $view->render();
                }
            }
            ?>
        </div> 
        <br style="clear: both;"/>
    </div>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <!-- jQuery -->
    <script src="<?php echo $this->template_url; ?>/js/admin/jquery-1.7.2.min.js"></script>
        <!-- jQuery UI -->
   <!-- <script src="<?php echo $this->template_url; ?>/js/jquery-ui-1.8.21.custom.min.js"></script>-->
    <!-- transition / effect library -->
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-transition.js"></script>
    <!-- alert enhancer library -->
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-alert.js"></script>
    <!-- modal / dialog library -->
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-modal.js"></script>
    <!-- custom dropdown library -->
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-dropdown.js"></script>
    <!-- scrolspy library -->
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-scrollspy.js"></script>
    <!-- library for creating tabs -->
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-tab.js"></script>
    <!-- library for advanced tooltip -->
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-tooltip.js"></script>
    <!-- popover effect library -->
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-popover.js"></script>
    <!-- button enhancer library -->
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-button.js"></script>
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-select.js"></script>

    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-collapse.js"></script>
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-timepicker.min.js"></script>

    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-datepicker.js"></script>
    
    <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-typeahead.js"></script>

    <script src="<?php echo $this->template_url; ?>/js/admin/jquery.colorbox.min.js"></script>
    <!-- notification plugin -->
    <script src="<?php echo $this->template_url; ?>/js/admin/jquery.noty.js"></script>
    <!--<script src="<?php echo $this->template_url; ?>/js/admin/jquery.image-gallery.min.js"></script> -->

    <script src="<?php echo $this->template_url; ?>/js/admin/fullcalendar.min.js"></script>

    <script src="<?php echo $this->template_url; ?>/js/admin/calendar/breakpoints.js"></script>
    <script src="<?php echo $this->template_url; ?>/js/admin/calendar/app.js"></script>
    <script src="<?php echo $this->template_url; ?>/js/admin/calendar/calendar.js"></script>

    <script type="text/javascript" src="<?php echo $this->template_url; ?>/js/admin/jquery.geocomplete.js"></script> 

    <script src="<?php echo $this->template_url; ?>/js/admin/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $this->template_url; ?>/js/admin/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>            
    <script src="<?php echo $this->template_url; ?>/js/admin/jquery.raty.min.js"></script>
    <script src="<?php echo $this->template_url; ?>/js/admin/principal.js"></script>
    <script src="<?php echo $this->template_url; ?>/js/toastr.js"></script>
    
    

    <?php foreach ($this->getJS() as $js): ?>
        <script type="text/javascript" src="<?php echo $this->template_url; ?>/js/<?php echo $js ?>"></script>
    <?php endforeach; ?>
</body>
</html>