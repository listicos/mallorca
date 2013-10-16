<?php
$tipos_pagos = $this->getAttribute('tipos_pagos');
$paises = $this->getAttribute('paises');
$monedas = $this->getAttribute('monedas');
$idiomas = $this->getAttribute('idiomas');
$instalaciones = $this->getAttribute('instalaciones');
$contratos = $this->getAttribute('contratos');
$apartamento = $this->getAttribute('apartamento');
?>
<script type="text/javascript">
    var LATITUDE = '<?php echo $apartamento['direccion']->lat; ?>'
    var LONGITUDE = '<?php echo $apartamento['direccion']->lon; ?>'
</script>
<div class="sidebar-nav-content" id="view_aparatmento_container">
    <div class="box box_templete">
        <div class="box-header well">
            <h2><i class="icon-th"></i><?php echo $apartamento['apartamento']->nombre; ?> - <small>Apartamento, 
                    <?php echo $apartamento['direccion']->calle . ' ' . $apartamento['direccion']->numero; ?> 
                    <?php echo $apartamento['direccion']->codigoPostal . ' ' . $apartamento['direccion']->provincia . ', ' . $apartamento['direccion']->paisNombre; ?></small></h2>              
            <a class="btn btn-primary goToEditApartament" href="<?php echo $this->base_url.'/admin-apartamento-editar/id:'.$apartamento['apartamento']->idApartamento; ?>">Editar</a>
        </div>
        <div class="box-content">
            <form id="contenido-apartamento-edit">
                <fieldset>

                </fieldset>
            </form>
        </div>
        <div class="box-header well box-header-tabs-apartament">
            <ul class="nav nav-tabs" id="view-apartamento-tabs">
                <li class="active"><a href="#viewFotos" data-toggle="tab">Fotos</a></li>
                <li><a href="#viewMapa" data-toggle="tab">Mapa</a></li>
                <li><a href="#viewCalendario" data-toggle="tab">Calendario</a></li>
                <li><a href="#viewDescripcion" data-toggle="tab">Descripción</a></li>
                <li><a href="#viewServicios" data-toggle="tab">Servicios</a></li>
            </ul>
        </div>
        <div class="box-content">
            <div class="tab-content">
                <div class="tab-pane active" id="viewFotos">
                    <div id="view-apartamento-gallery" class="carousel slide">
                        <?php if($apartamento['adjuntos']){ 
                        $flag1 = 1;?>
                        <ol class="carousel-indicators">
                        <?php foreach($apartamento['adjuntos'] as $adjunto){
                                if($adjunto->ruta){?>
                                    <li data-target="#view-apartamento-gallery" data-slide-to="<?php echo $flag1-1; ?>" <?php if($flag1==1){?> class="active" <?php }?> ></li>
                        <?php $flag1++; }
                            }?>
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <?php $flag2 = 1;?>
                            <?php foreach($apartamento['adjuntos'] as $adjunto){
                                if($adjunto->ruta){?>
                                    <div <?php if($flag2==1){?> class="active item" <?php }else{?> class="item" <?php }?> >
                                        <img src="<?php echo $this->template_url.$adjunto->ruta; ?>" title="<?php echo $adjunto->nombre; ?>"/>
                                    </div>
                            <?php $flag2++; }
                            }?>
                        </div>
                        <!-- Carousel nav -->
                        <a class="carousel-control left" href="#view-apartamento-gallery" data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#view-apartamento-gallery" data-slide="next">&rsaquo;</a>
                        <?php }?>  
                    </div>
                </div>
                <div class="tab-pane" id="viewMapa">
                    <input autofocus class="input-large span10" name="provincia" id="geocomplete" type="hidden" placeholder="Escriba una dirección." value="Madrid, España" title="Escriba una dirección" data-rel="tooltip"/>
                    <div class="contenedorMapa" id="view_apartament_map"></div>
                </div>
                <div class="tab-pane" id="viewCalendario">Calendario</div>
                <div class="tab-pane" id="viewDescripcion">Descripción</div>
                <div class="tab-pane" id="viewServicios">Este apartamento aún no contiene servicios</div>
            </div>
        </div>
    </div>
</div>