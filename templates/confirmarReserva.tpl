{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/apartamento.css" rel="stylesheet">
{/block}

{block name="content" append}
       <div class="container row-fluid">
       </div>
{/block}