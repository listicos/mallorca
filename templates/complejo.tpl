
<div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{$complejo->nombre}</h4>
    </div>
    <div class="modal-body">
    	<div class="row">
	    	<div class="carrusel">
	            <div class="carousel slide"  id="result-slider-{$smarty.foreach.apartamentos.iteration}">
	                <div class="carousel-inner">
	                    {foreach from=$complejo->adjuntos item=adjunto name=adjuntos}
	                    <div class="item {if $smarty.foreach.adjuntos.first}active{/if}">
	                        <img src="{$template_url}{$adjunto->ruta}" alt="">
	                    </div>
	                    {/foreach}
	                </div>
	                <div class="back-images layer-1"></div>
	                <div class="back-images layer-2"></div>

	                <a class="left carousel-control" href="#result-slider-{$smarty.foreach.apartamentos.iteration}" data-slide="prev">
	                    <span class="icon-prev"></span>
	                </a>
	                <a class="right carousel-control" href="#result-slider-{$smarty.foreach.apartamentos.iteration}" data-slide="next">
	                    <span class="icon-next"></span>
	                </a>
	            </div>
	        </div>
		</div>
		<div class="row">
		    <p>{$complejo->descripcion}</p>
		</div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{#cerrar#}</button>
    </div>
</div>