<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->getTitle(); ?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo $this->template_url; ?>/css/admin/reset.css" media="all" >
        <link rel="stylesheet" type="text/css" href="<?php echo $this->template_url; ?>/css/admin/styles.css" media="all" >

        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-cerulean.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-timepicker.css" rel="stylesheet">

        <link href="<?php echo $this->template_url; ?>/css/admin/charisma-app.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/jquery-ui-1.8.21.custom.css" rel="stylesheet">
        <link href='<?php echo $this->template_url; ?>/css/admin/colorbox.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/jquery.noty.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/noty_theme_default.css' rel='stylesheet'>
        <link href='<?php echo $this->template_url; ?>/css/admin/opa-icons.css' rel='stylesheet'>

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
       <?php include 'Template/admin/header.php';?>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include 'Template/admin/sidebar.php';?>
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
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.js"></script>
        <!-- jQuery UI -->
        <script src="<?php echo $this->template_url; ?>/js/jquery-ui-1.8.21.custom.min.js"></script>
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
        <!-- autocomplete library -->
        <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-typeahead.js"></script>
        <!-- tour library -->
        <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-tour.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-timepicker.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/bootstrap-timepicker.min.js"></script>

        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.colorbox.min.js"></script>
        <!-- rich text editor library -->
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.cleditor.min.js"></script>
        <!-- notification plugin -->
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.noty.js"></script>
        <!-- file manager library -->
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.elfinder.min.js"></script>
        <!-- star rating plugin -->
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.raty.min.js"></script>
        <!-- for iOS style toggle switch -->
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.iphone.toggle.js"></script>
        <!-- autogrowing textarea plugin -->
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.autogrow-textarea.js"></script>    

        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.ui.widget.js"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.image-gallery.min.js"></script> 

        <script type="text/javascript" src="<?php echo $this->template_url; ?>/js/admin/jquery.geocomplete.js"></script> 

        <!--  validador -->
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo $this->template_url; ?>/js/admin/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>            

        <?php foreach ($this->getJS() as $js): ?>
            <script type="text/javascript" src="<?php echo $this->template_url; ?>/js/<?php echo $js ?>"></script>
        <?php endforeach; ?>
    </body>
</html>