<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Mallorca Rent Haus</title>
        {block "style"}
            <link href="{$template_url_s}/css/datepicker.css" rel="stylesheet">
            <link href="{$template_url_s}/css/bootstrap.css" rel="stylesheet">
            <link href="{$template_url_s}/css/bootstrap-glyphicons.css" rel="stylesheet">
            <link href="{$template_url_s}/css/bootstrap-select.css" rel="stylesheet">
            <link href="{$template_url}/css/admin/validationEngine.jquery.css" rel="stylesheet">
            <link href="{$template_url_s}/css/toastr.css" rel="stylesheet">
            <link href="{$template_url_s}/css/flexslider.css" rel="stylesheet">
            <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
            <link href="{$template_url_s}/css/styles.css" rel="stylesheet">
        {/block} 
    </head>
    <body>
        <div id="blocker">
           <div>{#cargando#}</div>
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
            <script src="{$template_url}/js/admin/jquery.validationEngine.js"></script>
            <script src="{$template_url}/js/admin/jquery.validationEngine-es.js"></script>
            
            <script src="{$template_url}/js/toastr.js"></script>
            
            <script src="{$template_url_s}/js/jquery.flexslider.js"></script>
            <script src="{$template_url_s}/js/main.js"></script>
            {literal}
            <script type="text/javascript">var switchTo5x=true;</script>
            {/literal}
        {/block}  
    </body>
</html>
