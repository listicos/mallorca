{foreach name=apartamentos from=$apartamentos item=a}
    <div class="col-lg-6 result-item">
        <div class="carousel slide"  id="result-slider-{$smarty.foreach.apartamentos.index}">
            <div class="carousel-inner">
                {foreach name=adjuntos from=$a['adjuntos'] item=b}
                    <div class="item {if $smarty.foreach.adjuntos.first}active{/if}">
                        <img src="{$template_url}{$b->ruta}" alt="{$a['apartamento']->nombre}">
                        <div class="carousel-caption">
                            <p>{$a['apartamento']->nombre}</p>
                            <span class="comments-icon">2</span>
                        </div>
                        <div class="add-to-wishlist"></div>
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
            <input type="hidden" name="precio" value="{$a['apartamento']->tarifaBase}">
    </div>
{/foreach}