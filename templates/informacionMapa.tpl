<div id="infoMapa">
    <div class="row">
        <div class="col-sm-6">
            <a href="{$base_url}/apartamento/id:{$apartamento->idApartamento}"><img src="{$template_url}{$apartamento->adjuntos[0]->ruta}" alt="$apartamento->nombre"></a>
        </div>
        <div class="col-sm-6">
            <a href="{$base_url}/apartamento/id:{$apartamento->idApartamento}"><strong>{$apartamento->nombre}</strong></a>
            <p>{$apartamento->direccion->provincia}</p>
        </div>
    </div>
</div>