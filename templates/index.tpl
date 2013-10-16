<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Mallorca</title>
        {block "style"}
            <link href="{$template_url_s}/css/styles.css" rel="stylesheet">
            <link href="{$template_url_s}/css/datepicker.css" rel="stylesheet">
            <link href="{$template_url_s}/css/bootstrap.css" rel="stylesheet">
            <link href="{$template_url_s}/css/bootstrap-glyphicons.css" rel="stylesheet">
            <link href="{$template_url_s}/css/bootstrap-select.css" rel="stylesheet">
            <link href="{$template_url_s}/css/jquery-ui.css" rel="stylesheet">
            <link href="{$template_url_s}/css/jquery.ui.slider.css" rel="stylesheet">
        {/block} 
    </head>
    <body>
        <div class="wrapper">
          {block "content"}{/block}
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
        {/block}  
    </body>
</html>
