{foreach name=apartamentos from=$apartamentos item=a}
                            
    <div class="col-lg-4 mix apto" data-name="{$a->nombre}" data-price="{$a->precioPorNoche}" data-visitas="{$a->visitas}">
    <div class=" result-item">
        <div class="carousel slide"  id="result-slider-{$smarty.foreach.apartamentos.index}">
            <div class="carousel-inner">
                {foreach name=adjuntos from=$a->adjuntos item=b}
                    <div class="item {if $smarty.foreach.adjuntos.first}active{/if}">
                        <img src="{$template_url}{$b->ruta}" alt="{$a->nombre}" width="378px" height="284px">
                        <div class="carousel-caption">
                            <p>{$a->nombre}</p>
                            {if $a->opiniones}
                            <span class="comments-icon">{$a->opiniones}</span>
                            {/if}
                        </div>
                        <!--<div class="add-to-wishlist"></div>-->
                    </div>
                {/foreach}
            </div>
            <div class="back-images layer-1"></div>
            <div class="back-images layer-2"></div>

            <a class="left carousel-control" href="#result-slider-{$smarty.foreach.apartamentos.index}" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#result-slider-{$smarty.foreach.apartamentos.index}" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </div>
            <input type="hidden" name="precio" value="{$a->precioPorNoche}">
            <input type="hidden" name="nombre" value="{$a->nombre}">
            <input type="hidden" name="lat" value="{$a->direccion->lat}">
            <input type="hidden" name="lon" value="{$a->direccion->lon}">
        <div class="row acciones-apto">
            <div class="col-md-6">
                <span class="priceApto">{$a->precio_base_format}</span>
                <span>Por&nbsp;noche</span>
            </div>

            <div class="col-md-6">
                <a href="{$base_url}/apartamento/id:{$a->idApartamento}" class="btn btn-success">Resérvalo</a>
            </div>
        </div>
    </div>
    </div>

{/foreach}