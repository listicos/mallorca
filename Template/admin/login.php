<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->getTitle(); ?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo $this->template_url; ?>/css/admin/reset.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->template_url; ?>/css/admin/styles.css" media="all" />

        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-cerulean.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/charisma-app.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-timepicker.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/charisma-app.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/jquery-ui-1.8.21.custom.css" rel="stylesheet">
        <link href='<?php echo $this->template_url; ?>/css/admin/fullcalendar.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/fullcalendar.print.css' rel='stylesheet'  media='print'>
        <link href='<?php echo $this->template_url; ?>/css/admin/chosen.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/uniform.default.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/colorbox.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/jquery.cleditor.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/jquery.noty.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/noty_theme_default.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/elfinder.min.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/elfinder.theme.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/opa-icons.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/uploadify.css' rel='stylesheet'> 
        <link href='<?php echo $this->template_url; ?>/css/admin/admin.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/panel_lista.css' rel='stylesheet'>
        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-fileupload.css" rel="stylesheet">
        <!--<link href="css/bootstrap-fileupload.min.css" rel="stylesheet">-->    
        <link href="<?php echo $this->template_url; ?>/css/admin/jquery.fileupload-ui.css" rel="stylesheet">          
        <link rel="stylesheet" href="<?php echo $this->template_url; ?>/css/admin/validationEngine.jquery.css" type="text/css"/>

        <?php foreach ($this->getCSS() as $css): ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $this->template_url; ?>/css/admin/<?php echo $css ?>" media="all" />
        <?php endforeach; ?>

        <style type="text/css">
            body {
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>

        <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>

        <script src="<?php echo $this->template_url; ?>/js/jquery.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/jquery.ui.js"></script>
        <script type="text/javascript" src="<?php echo $this->template_url; ?>/js/admin/jquery.geocomplete.js"></script> 
        <script type="text/javascript" src="<?php echo $this->template_url; ?>/js/admin/template.js"></script>
        <script type="text/javascript" src="<?php echo $this->template_url; ?>/js/admin/load-image.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->template_url; ?>/js/admin/canvas_to_blob.js"></script>
        <script type="text/javascript" src="<?php echo $this->template_url; ?>/js/admin/bootstrap-image-gallery.js"></script>

        <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-timepicker.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-collapse.js"></script>

        <script src="<?php echo $this->template_url; ?>/js/admin/fullcalendar.min.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.iframe-transport.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.fileupload.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.fileupload-process.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.fileupload-resize.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.fileupload-validate.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.fileupload-ui.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/galerias.js"></script>
        <!--  validador -->
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>            

        <?php foreach ($this->getJS() as $js): ?>
            <script type="text/javascript" src="<?php echo $this->template_url; ?>/js/admin/<?php echo $js ?>"></script>
        <?php endforeach; ?>

    </head>
    <body>
        <div class="row center login_logo_container">
            <div class="span12 center"><img src="<?php echo $this->template_url ?>/imagen/logo.png"/></div>
        </div>
        <div class="container">      
            <div class="row center">
                <!-- <div class="control-group">
                     <div class="input-prepend span6 center" title="Idioma" data-rel="tooltip">
                        <span class="add-on"><i class="icon-globe"></i></span>
                            <select class="span6"><option>Español</option><option>English</option></select>
                               </div>
                                </div>-->
                <div class="span4 center">
                    <div class="padded">
                        <div class="login box" style="margin-top: 15px;">
                            <div class="box_header_login_inicio">
                                <span class="title">Iniciar sesión</span>
                            </div>
                            <div class="box-content padded">
                                <form class="separate-sections" action="" method="POST">
                                    <div class="input-prepend" title="Correo electrónico" data-rel="tooltip">
                                        <span class="add-on" href="#">
                                            <i class="icon-user"></i>
                                        </span>
                                        <input type="text" placeholder="Correo electrónico" name="usuario">
                                    </div>
                                    <div class="input-prepend" title="Contraseña" data-rel="tooltip">
                                        <span class="add-on" href="#">
                                            <i class="icon-lock"></i>
                                        </span>
                                        <input type="password" placeholder="Contraseña" name="password">
                                    </div>
                                    <br>
                                    <div>
                                        <input class="span3 btn btn-primary" type="submit" value="Ingresar" />
                                    </div>
                                </form>
<!--                                <br>
                                <div>
                                    <a href="sign_up.html">
                                        ¿No tienes cuenta? <strong>Ingresa</strong>
                                    </a>
                                </div>-->
                                <br>
                                <a class="btn btn btn-link" href="<?php echo $this->base_url; ?>/admin-recuperarDatos" media="all">¿Olvidaste tus datos de acceso?</a>
                            </div>
                            <br>
                          </div>
<!--                        <div class="row-fluid">
                            <div class="span6">
                                <a href="#" class="span12 btn btn-primary btn-facebook btn-block"><i class="icon-facebook-sign"></i> Facebook</a>
                            </div>
                            <div class="span6">
                                <a href="#" class="span12 btn btn-twitter btn-block"><i class="icon-twitter"></i> Twitter</a>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="control-group">
             <div class="input-prepend span6 center" title="Usuario" data-rel="tooltip">
                 <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span6" name="usuario" id="username" type="text" value="" />
             </div>
         </div>
         <div class="control-group">
             <div class="input-prepend span6 center" title="Contraseña" data-rel="tooltip">
                 <span class="add-on"><i class="icon-lock"></i></span><input class="input-large span6" name="password" id="password" type="password" value="" />
             </div>
         </div>
         <div class="row center">
             <div class="control-group">
                 <p class="center span5">
                     <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                 </p>
                 <div class="clearfix"></div>
                 <p class="center span7">
                     <a class="btn btn btn-link padZero" href="<?php echo $this->base_url; ?>/admin-recuperarDatos" media="all">¿Olvidaste tus datos de acceso?</a> 
                 </p>
             </div>
         </div>
     </fieldset>
 </form>
</div>
</div><!--/span--
</div><!--/row-->
        <div id="content" class="span10">
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
    </body>
</html>