<div id="infoMapa">
    <div class="row">
        <div class="col-sm-6">
            <img src="{$template_url}{$apartamento->adjuntos[0]->ruta}" alt="$apartamento->nombre">
        </div>
        <div class="col-sm-6">
            <strong>{$apartamento->nombre}</strong>
            <p>{$apartamento->direccion->provincia}</p>
        </div>
    </div>
</div>