<div class="row">
    <h3 class="form-section">{$complejo->nombre}</h3>
</div>
<div class="row">
    <p>{$complejo->descripcion}</p>
</div>
<div class="row">
    {foreach from=$complejo->adjuntos item=adjunto}
    <div class="col-xs-4 complejo_img">
        <img src="{$template_url}{$adjunto->ruta}" alt="{$adjunto->ruta}">
    </div>
    {/foreach}
</div>