<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Mallorca</title>
        {block "style"}
            <link href="{$template_url_s}/css/datepicker.css" rel="stylesheet">
            <link href="{$template_url_s}/css/bootstrap.css" rel="stylesheet">
            <link href="{$template_url_s}/css/bootstrap-glyphicons.css" rel="stylesheet">
            <link href="{$template_url_s}/css/bootstrap-select.css" rel="stylesheet">
            <link href="{$template_url_s}/css/jquery-ui.css" rel="stylesheet">
            <link href="{$template_url_s}/css/jquery.ui.slider.css" rel="stylesheet">
            
            <link href="{$template_url}/css/admin/validationEngine.jquery.css" rel="stylesheet">
            <link href="{$template_url_s}/css/toastr.css" rel="stylesheet">
            
            <link href="{$template_url_s}/css/flexslider.css" rel="stylesheet">
            <!--<link href='http://fonts.googleapis.com/css?family=Qwigley' rel='stylesheet' type='text/css'>-->
            <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700|Ubuntu+Condensed|Open+Sans:400,700' rel='stylesheet' type='text/css'>
            <link href="http://fonts.googleapis.com/css?family=" rel="stylesheet" type="text/css">
            <link href="{$template_url_s}/css/styles.css" rel="stylesheet">
        {/block} 
    </head>
    <body>
        <div id="blocker">
           <div>Cargando...</div>
       </div>
        <div class="wrapper">
           {include file="header.tpl"}

            {block "content"}{/block}

            {include file="footer.tpl"}
        </div>
            <script type="text/javascript">
                var BASE_URL = "{$base_url}";
                var LANGUAGE = "{$lang}";
            </script>
        {block "script"} 
            <script src="{$template_url_s}/js/jquery-1.9.1.js"></script>
            <script src="{$template_url_s}/js/bootstrap.min.js"></script>
            <script src="{$template_url_s}/js/bootstrap-dropdown.js"></script>
            <script src="{$template_url_s}/js/bootstrap-select.js"></script>
            <script src="{$template_url_s}/js/bootstrap-datepicker.js"></script>

            <script src="{$template_url_s}/js/jquery.ui.core.js"></script>
            <script src="{$template_url_s}/js/jquery.ui.widget.js"></script>
            <script src="{$template_url_s}/js/jquery.ui.mouse.js"></script>
            <script src="{$template_url_s}/js/jquery.ui.slider.js"></script>
            
            <script src="{$template_url}/js/admin/jquery.validationEngine.js"></script>
            <script src="{$template_url}/js/admin/jquery.validationEngine-es.js"></script>
            
            <script src="{$template_url}/js/toastr.js"></script>
            
            <script src="{$template_url_s}/js/jquery.flexslider.js"></script>
            <script src="{$template_url_s}/js/main.js"></script>
            {literal}
            <script type="text/javascript">var switchTo5x=true;</script>
            <!--<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
            <script type="text/javascript">stLight.options({publisher: "3b010a7f-777e-4ff0-8c20-eda6e545d495", doNotHash: true, doNotCopy: true, hashAddressBar: false});</script>-->
            {/literal}
        {/block}  
    </body>
</html>
