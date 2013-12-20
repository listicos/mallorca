<?php
$tipos_pagos = $this->getAttribute('tipos_pagos');
$paises = $this->getAttribute('paises');
$monedas = $this->getAttribute('monedas');
$idiomas = $this->getAttribute('idiomas');
$instalaciones = $this->getAttribute('instalaciones');
$habitaciones = $this->getAttribute('habitaciones');
$tiposApartamento = $this->getAttribute('tiposApartamento');
$apartamento = $this->getAttribute('apartamento');
$empresas = $this->getAttribute('empresas');
$articulos = $this->getAttribute('articulos');
$politicas = $this->getAttribute('politicas');
$complejos = $this->getAttribute('complejos');
$documentos = $this->getAttribute('documentos');

$edit = $this->getAttribute('edit');
?>
<?php if($edit){?>
<input type="hidden" id="global_id_apartamento" value="<?php echo $apartamento['apartamento']->idApartamento; ?>"/>
<?php }?>
<div class="sidebar-nav-content">
    <div class="box box_templete">
        <div class="box-header box_header_templete well">
            <div class="tabbable"> 
                <ul class="nav nav-tabs detalles_apartamento_nav">
                    <li class="active"><a href="#demo1" data-toggle="tab">General</a></li>
                    <!--<li <?php if (!$edit) { ?> class="disabled" <?php } ?> ><a href="#contrato" data-toggle="tab" data-ref="contratos">Propietario/Contrato</a></li>-->
                    <!--<li <?php if (!$edit) { ?> class="disabled" <?php } ?> ><a href="#documentos-tab" data-toggle="tab" data-ref="documentos">Documentos</a></li>-->
                    <!--<li <?php if (!$edit) { ?> class="disabled" <?php } ?> ><a href="#demo3" data-toggle="tab" data-ref="tarifas">Tarifas</a></li>-->  
                    <?php if(hasRoles("Administrador, Socio, Mallorca")) { ?>
                    <li <?php if (!$edit) { ?> class="disabled" <?php } ?> ><a href="#demo5" data-toggle="tab" class="calendario_trigger_tab" data-ref="calendario">Planning</a></li>
                    <!--<li <?php if (!$edit) { ?> class="disabled" <?php } ?> ><a href="#demo5" data-toggle="tab" class="contrato_trigger_tab" data-ref="calendario">Reglas</a></li>-->
                    <?php } ?>
                    <li <?php if (!$edit) { ?> class="disabled" <?php } ?> ><a href="#demo2" data-toggle="tab" data-ref="fotos">Fotos</a></li>
                    <!--<li <?php if (!$edit) { ?> class="disabled" <?php } ?> ><a href="#demo4" data-toggle="tab" data-ref="avanzados">Avanzado</a></li>-->
                </ul>
            </div>
        </div>
        <div class="box-content">
            <div class="tab-content apartamentos_main_tabs">
                <div  class="tab-pane active" id="demo1">
                    <form id="gestion_general_form">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group detalles_apartamento_alineacion">
                                    <div class="input-prepend span12" title="Estado" data-rel="tooltip" >
                                        <span class="add-on"><i class="icon-home"></i></span>
                                        <select class="span10 " name="estatus" >
                                            <option value="activo" <?php if ($edit && ($apartamento['apartamento']->estatus == 'activo')) { ?> selected="selected" <?php } ?> >Activo</option>
                                            <option value="inactivo" <?php if ($edit && ($apartamento['apartamento']->estatus == 'inactivo')) { ?> selected="selected" <?php } ?> >Inactivo</option>
                                        </select>
                                    </div> 
                                </div>
                            </div>
                          
                        </div>
                        <div class="row-fluid">
                            <div class="span8">
                                <div class="control-group detalles_apartamento_alineacion">
                                    <div class="input-prepend span12" title="Título" data-rel="tooltip" >
                                        <span class="add-on"><i class="icon-download-alt"></i></span><input autocomplete="off" class="input span11 validate[required]"  name="nombre" id="buscarEmpresa" type="text" placeholder="Título" data-provide="typeahead" data-items="10" data-source='[]' <?php if ($edit) { ?> value="<?php echo $apartamento['apartamento']->nombre; ?>" <?php } ?>/>
                                    </div> 
                                </div>
                            </div>
                          <!--  <div class="span2">
                                <div class="control-group center">
                                    <p class="detalles_apartamento_titulo">0 caracteres restantes</p>
                                </div>
                            </div>-->
                            <!--<div class="span2">
                                <div class="control-group">
                                    <p class="text-success detalles_apartamento_titulo">¡Excelente título!</p>
                                </div>
                            </div>-->
                        </div>
                        <div class="row-fluid">
                            <div class="span8">
                                <div class="control-group detalles_apartamento_alineacion">
                                    <div class="input-prepend span12" title="Propietario" data-rel="tooltip" >
                                        <span class="add-on"><i class="icon-home"></i></span>
                                        <select class="span10 " name="idEmpresa" >
                                            <?php foreach ($empresas as $empresa) { ?>
                                                <option value="<?php echo $empresa->idEmpresa; ?>" <?php if ($edit && ($apartamento['apartamento']->idEmpresa == $empresa->idEmpresa)) { ?> selected="selected" <?php } ?> ><?php echo $empresa->nombre . ' ' . $empresa->apellidoPaterno; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div> 
                                </div>
                            </div>
                          
                        </div>
                        <div class="row-fluid">
                            <div class="span8">
                                <div class="control-group detalles_apartamento_alineacion">
                                    <div class="input-prepend span12" title="Complejo" data-rel="tooltip" >
                                        <span class="add-on"><i class="icon-home"></i></span>
                                        <select class="span10 " name="idComplejo" >
                                            <option value="0" >No pertenece a ning&uacute;n complejo</option>
                                            <?php foreach ($complejos as $complejo) { ?>
                                                <option value="<?php echo $complejo->idComplejo; ?>" <?php if ($edit && ($apartamento['apartamento']->idComplejo == $complejo->idComplejo)) { ?> selected="selected" <?php } ?> ><?php echo $complejo->nombre; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div> 
                                </div>
                            </div>
                          
                        </div>
                        <legend class="legend_custom titulos_legend">Tipo de anuncio</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Tipo de propiedad" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                        <select class="span10 validate[required]" name="idApartamentosTipo" >
                                            <option value="" disabled>Tipo de propiedad</option>
                                            <?php foreach ($tiposApartamento as $tipo) { ?>
                                                <option value="<?php echo $tipo->idApartamentosTipo; ?>" <?php if ($edit && ($apartamento['apartamento']->idApartamentosTipo == $tipo->idApartamentosTipo)) { ?> selected="selected" <?php } ?> ><?php echo $tipo->nombre; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>         
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Cantidad de propiedades" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-home"></i></span>
                                        <select class="span10 validate[required]" name="cantidad" >
                                            <option value="" disabled>Cantidad de propiedades</option>
                                            <?php for ($i = 1; $i < 50; $i++) { ?>
                                                <option value="<?php echo $i; ?>" <?php if ($edit && ($apartamento['apartamento']->cantidad == $i)) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>         
                            </div>
                            <!--<div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Tipo de habitación" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                        <select class="span10 validate[required]" name="idAlojamiento">
                                            <option value="" disabled>Tipo de habitación</option>
                                            <?php foreach ($habitaciones as $habitacion) { ?>
                                                <option value="<?php echo $habitacion->idAlojamiento; ?>" <?php if ($edit && ($apartamento['alojamiento']->idAlojamiento == $habitacion->idAlojamiento)) { ?> selected="selected" <?php } ?> ><?php echo $habitacion->nombre; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>         
                            </div>-->
                        </div>             
                        <legend class="legend_custom titulos_legend">Descripción</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend span12 center" title="Idioma" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select id="idiomaDescripcionLarga" class="span10">
                                            <?php foreach($idiomas as $idioma) { ?>
                                            <option value="<?php echo $idioma->codigo; ?>"><?php echo $idioma->nombre; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="control-group detalles_apartamento_descripcion">
                                    <textarea class="editor span12 validate[required]" id="descripcionLarga" rows="11" placeholder="Descripción, mínimo 60 palabras"></textarea>                                        
                                    <input type="hidden" name="descripcionLarga" value='<?php echo $apartamento['apartamento']->descripcionLarga; ?>'>
                                   <!-- <p>La descripción debe contener al menos 15 palabras.Las de los
                                        apartamentos más alquilados contienen más de 150 palabras</p>-->
                                </div>                                     
                            </div>    
                           <!-- <div class="span4">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="span11 detalles_apartamento_popover">
                                            <p>¿Cómo es tu lugar? ¿Habitaciones? ¿Baños? ¿Cocina? ¿Estilo?</p>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class=" span11 detalles_apartamento_popover">
                                                <p>¿Qué pueden esperar los huéspedes durante su tiempo de estadía?</p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="span11 detalles_apartamento_popover">
                                            <p>¿Hay restaurantes cerca,tiendas, atracciones? ¿Transporte público?</p>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="span11 detalles_apartamento_popover">
                                                <p>¿Qué hace que tu lugar sea único,qué lo hace diferente de los demás?</p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <legend class="legend_custom titulos_legend">Servicios</legend>
                        <div class="row-fluid">


                            <?php
                            foreach ($instalaciones as $instal) {
                                $catego = $instal['categoria'];
                                $instalaciones_obj = $instal['instalacion'];
                                ?>
                                <h3 class="color-negro"><?php echo $catego->nombre; ?></h3>
                                <div class="row-fluid instalaciones_container"><span></span>
                                    <?php foreach ($instalaciones_obj as $instalacion) { ?>
                                        <div class="span3 instalaciones_row">
                                            <div class="control-group">
                                                <label class="checkbox inline">
                                                    <input type="checkbox" name="idInstalacion[]"  value="<?php echo $instalacion->idInstalacion ?>" <?php if ($edit && (in_array($instalacion->idInstalacion, $apartamento['instalaciones']))) { ?> checked="checked" <?php } ?> ><?php echo $instalacion->nombre; ?>
                                                </label> 
                                            </div>                                        
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>  
                        </div>
                        <legend class="legend_custom titulos_legend">Detalles</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Capacidad de personas" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                        <select class="span10 validate[required]" name="capacidadPersonas">
                                            <option value="" disabled selected>Capacidad de personas</option>
                                            <option value="1" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '1')) { ?> selected="selected" <?php } ?>>1 persona</option>
                                            <option value="2" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '2')) { ?> selected="selected" <?php } ?>>2 personas</option>
                                            <option value="3" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '3')) { ?> selected="selected" <?php } ?>>3 personas</option>
                                            <option value="4" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '4')) { ?> selected="selected" <?php }else{ ?> <?php if($edit==false) echo "selected='selected'"?> <?php }?>>4 personas</option>
                                            <option value="5" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '5')) { ?> selected="selected" <?php } ?>>5 personas</option>
                                            <option value="6" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '6')) { ?> selected="selected" <?php } ?>>6 personas</option>
                                            <option value="7" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '7')) { ?> selected="selected" <?php } ?>>7 personas</option>
                                            <option value="8" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '8')) { ?> selected="selected" <?php } ?>>8 personas</option>
                                            <option value="9" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '9')) { ?> selected="selected" <?php } ?>>9 personas</option>
                                            <option value="10" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '10')) { ?> selected="selected" <?php } ?>>10 personas</option>
                                            <option value="11" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '11')) { ?> selected="selected" <?php } ?>>11 personas</option>
                                            <option value="12" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '12')) { ?> selected="selected" <?php } ?>>12 personas</option>
                                            <option value="13" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '13')) { ?> selected="selected" <?php } ?>>13 personas</option>
                                            <option value="14" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '14')) { ?> selected="selected" <?php } ?>>14 personas</option>
                                            <option value="15" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '15')) { ?> selected="selected" <?php } ?>>15 personas</option>
                                            <option value="16" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '16')) { ?> selected="selected" <?php } ?>>16 personas</option>
                                            <option value="17" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '17')) { ?> selected="selected" <?php } ?>>17 personas</option>
                                            <option value="18" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '18')) { ?> selected="selected" <?php } ?>>18 personas</option>
                                            <option value="19" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '19')) { ?> selected="selected" <?php } ?>>19 personas</option>
                                            <option value="20" <?php if ($edit && ($apartamento['apartamento']->capacidadPersonas == '20')) { ?> selected="selected" <?php } ?>>20 personas</option>
                                        </select>
                                    </div>
                                </div>         
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Habitaciones" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                        <select class="span10 validate[required]" name="habitaciones">
                                            <option value="" disabled selected>Habitaciones</option>
                                            <option value="1" <?php if ($edit && ($apartamento['apartamento']->habitaciones == '1')) { ?> selected="selected" <?php } ?> >1 habitación</option>
                                            <option value="2" <?php if ($edit && ($apartamento['apartamento']->habitaciones == '2')) { ?> selected="selected" <?php }else{ ?> <?php if($edit==false) echo "selected='selected'"?> <?php }?>>2 habitaciones</option>
                                            <option value="3" <?php if ($edit && ($apartamento['apartamento']->habitaciones == '3')) { ?> selected="selected" <?php } ?> >3 habitaciones</option>
                                            <option value="4" <?php if ($edit && ($apartamento['apartamento']->habitaciones == '4')) { ?> selected="selected" <?php } ?> >4 habitaciones</option>
                                            <option value="5" <?php if ($edit && ($apartamento['apartamento']->habitaciones == '5')) { ?> selected="selected" <?php } ?> >5 habitaciones</option>
                                            <option value="6" <?php if ($edit && ($apartamento['apartamento']->habitaciones == '6')) { ?> selected="selected" <?php } ?> >6 habitaciones</option>
                                            <option value="7" <?php if ($edit && ($apartamento['apartamento']->habitaciones == '7')) { ?> selected="selected" <?php } ?> >7 habitaciones</option>
                                            <option value="8" <?php if ($edit && ($apartamento['apartamento']->habitaciones == '8')) { ?> selected="selected" <?php } ?> >8 habitaciones</option>
                                            <option value="9" <?php if ($edit && ($apartamento['apartamento']->habitaciones == '9')) { ?> selected="selected" <?php } ?> >9 habitaciones</option>
                                            <option value="10" <?php if ($edit && ($apartamento['apartamento']->habitaciones == '10')) { ?> selected="selected" <?php } ?> >10 habitaciones</option>
                                        </select>
                                    </div>
                                </div>         
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Camas" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                        <select class="span10 validate[required]" name="camas">
                                            <option value="" disabled selected>Camas</option>
                                            <option value="1" <?php if ($edit && ($apartamento['apartamento']->camas == '1')) { ?> selected="selected" <?php } ?> >1 cama</option>
                                            <option value="2" <?php if ($edit && ($apartamento['apartamento']->camas == '2')) { ?> selected="selected" <?php } ?> >2 camas</option>
                                            <option value="3" <?php if ($edit && ($apartamento['apartamento']->camas == '3')) { ?> selected="selected" <?php } ?> >3 camas</option>
                                            <option value="4" <?php if ($edit && ($apartamento['apartamento']->camas == '4')) { ?> selected="selected" <?php }else{ ?> <?php if($edit==false) echo "selected='selected'"?> <?php }?>>4 camas</option>
                                            <option value="5" <?php if ($edit && ($apartamento['apartamento']->camas == '5')) { ?> selected="selected" <?php } ?> >5 camas</option>
                                            <option value="6" <?php if ($edit && ($apartamento['apartamento']->camas == '6')) { ?> selected="selected" <?php } ?> >6 camas</option>
                                            <option value="7" <?php if ($edit && ($apartamento['apartamento']->camas == '7')) { ?> selected="selected" <?php } ?> >7 camas</option>
                                            <option value="8" <?php if ($edit && ($apartamento['apartamento']->camas == '8')) { ?> selected="selected" <?php } ?> >8 camas</option>
                                            <option value="9" <?php if ($edit && ($apartamento['apartamento']->camas == '9')) { ?> selected="selected" <?php } ?> >9 camas</option>
                                            <option value="10" <?php if ($edit && ($apartamento['apartamento']->camas == '10')) { ?> selected="selected" <?php } ?> >10 camas</option>
                                        </select>
                                    </div>
                                </div>         
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Baños" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                        <select class="span10 validate[required]" name="banio">
                                            <option value="" disabled selected>Baños</option>
                                            <option value="0" <?php if ($edit && ($apartamento['apartamento']->banio == '0')) { ?> selected="selected" <?php } ?> >0 baños</option>
                                            <option value="1" <?php if ($edit && ($apartamento['apartamento']->banio == '1')) { ?> selected="selected" <?php } ?> >1 baño</option>
                                            <option value="2" <?php if ($edit && ($apartamento['apartamento']->banio == '2')) { ?> selected="selected" <?php } ?> >2 baños</option>
                                            <option value="3" <?php if ($edit && ($apartamento['apartamento']->banio == '3')) { ?> selected="selected" <?php } ?> >3 baños</option>
                                            <option value="4" <?php if ($edit && ($apartamento['apartamento']->banio == '4')) { ?> selected="selected" <?php } ?> >4 baños</option>
                                            <option value="5" <?php if ($edit && ($apartamento['apartamento']->banio == '5')) { ?> selected="selected" <?php } ?> >5 baños</option>
                                            <option value="6" <?php if ($edit && ($apartamento['apartamento']->banio == '6')) { ?> selected="selected" <?php } ?> >6 baños</option>
                                            <option value="7" <?php if ($edit && ($apartamento['apartamento']->banio == '7')) { ?> selected="selected" <?php } ?> >7 baños</option>
                                            <option value="8" <?php if ($edit && ($apartamento['apartamento']->banio == '8')) { ?> selected="selected" <?php } ?> >8 baños</option>
                                        </select>
                                    </div>
                                </div>         
                            </div>
                            <!--<div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Tamaño total" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                        <input type="number" class="span10 validate[required]" step="0.1"  name="tamanio" placeholder="En metros cuadrados"  <?php if ($edit) { ?> value="<?php echo $apartamento['apartamento']->tamanio; ?>" <?php }else{ ?> value="100" <?php }?>/>
                                    </div>
                                </div>         
                            </div>-->
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend span12 center" title="Idioma" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select id="idiomaNormas" class="span10">
                                            <?php foreach($idiomas as $idioma) { ?>
                                            <option value="<?php echo $idioma->codigo; ?>"><?php echo $idioma->nombre; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8">
                                <div class="control-group detalles_apartamento_descripcion">
                                    <textarea class="span12" id="normas" rows="5" placeholder="Normas de la casa, explica a tus potenciales huéspedes lo que esperas de ellos..."></textarea>                                        
                                    <input type="hidden" name="normas" value='<?php echo $apartamento['apartamento']->normas; ?>'>
                                    <p></p>
                                </div>                                     
                            </div>   
                            <div class="span4">
                                <label class="radio detalles_apartamento_checkbox">
                                    <input type="radio" name="mascotas" id="optionsRadios1" value="1"  <?php if ($edit && ($apartamento['apartamento']->mascotas == '1')) { ?> checked <?php } else { ?> checked <?php } ?> >
                                    Sí, aquí viven mascotas o animales
                                </label>
                                <label class="radio">
                                    <input type="radio" name="mascotas" id="optionsRadios2" value="0" <?php if ($edit && ($apartamento['apartamento']->mascotas == '0')) { ?> checked <?php } ?> >
                                    No,aqui no viven mascotas ni animales
                                </label>

                            </div>
                        </div>
                        <legend class="legend_custom titulos_legend">Información de la ubicación</legend> 
                        <div class="row-fluid direction_container">
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Dirección" data-rel="tooltip">
                                            <span class="add-on"><i class="other-icon-direction"></i></span><input class="input-large span10" name="provincia" id="geocomplete" type="text" placeholder="Escriba una dirección." <?php if ($edit) { ?> value="<?php echo $apartamento['direccion']->provincia; ?>" <?php }else{ ?> value="Madrid, España"  <?php }?>/>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div  class="input-prepend  center span12" title="Código postal data-rel="tooltip"">
                                            <span class="add-on"><i class="icon-envelope"></i></span><input class="input-large span10" name="codigoPostal" id="codigo_postal" type="text" placeholder="Código postal" data-prompt-position="topLeft:2%"  <?php if ($edit) { ?> value="<?php echo $apartamento['direccion']->codigoPostal; ?>" <?php } ?>/>
                                        </div>
                                    </div>                                        
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Número" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-pencil"></i></span><input class="input-large span10" name="numero" id="numero_teatro" type="text" placeholder="Número"  <?php if ($edit) { ?> value="<?php echo $apartamento['direccion']->numero; ?>" <?php } ?>/>
                                        </div>
                                    </div>                                     
                                </div>  
                            </div>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Latitud" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-map-marker"></i></span><input class="input-large span10" name="lat" id="username" type="text" placeholder="Latitud"  <?php if ($edit) { ?> value="<?php echo $apartamento['direccion']->lat; ?>" <?php } else { ?> value="40.4113554" <?php } ?>/>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend  center span12" title="Longitud" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-map-marker"></i></span><input class="input-large span10" name="lon" id="username" type="text" placeholder="Longitud" <?php if ($edit) { ?> value="<?php echo $apartamento['direccion']->lon; ?>" <?php } else { ?> value="-3.7028359" <?php } ?>/>
                                        </div>
                                    </div>                                        
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="País" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-globe"></i></span>
                                            <select class="input_large span10" name="idPais">
                                                <?php foreach ($paises as $pais) { ?>
                                                    <option value="<?php echo $pais->idPais ?>" <?php if ($pais->idPais == $apartamento['direccion']->idPais) echo 'selected="selected"' ?>><?php echo $pais->nombreCompleto ?></option>
                                                <?php } ?>   
                                            </select>        
                                        </div>                                          
                                    </div>                                
                                </div> 
                            </div>
                            <div class="span12 localizacion_container">
                                <h3>Especifique la localización <i><small>* Coge el icono y posiciónalo en la localización correcta</small></i></h3>
                                <div class="map_canvas"></div>
                            </div>


                        </div>
                        <legend class="legend_custom titulos_legend">Información privada para huéspedes confirmados</legend>
                        <div class="row-fluid">
                            <div class="span12 text-info">
                                <p>Esta información solo se proporcionará a los huéspedes que tengan una reserva confirmada contigo</p>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend span12 center" title="Idioma" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select id="idiomaInformacionPrivada" class="span10">
                                            <?php foreach($idiomas as $idioma) { ?>
                                            <option value="<?php echo $idioma->codigo; ?>"><?php echo $idioma->nombre; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span8">
                                <div class="control-group detalles_apartamento_descripcion">
                                    <textarea class="span12" title="Referencias" data-rel="tooltip" id="referencia" rows="5" placeholder="Información adicional para el usuario..."></textarea>                                        
                                    <input type="hidden" name="referencia" value='<?php if ($edit) { echo $apartamento['direccion']->referencia; } ?>'>
                                </div>                                     
                                <div class="control-group detalles_apartamento_descripcion">
                                    <textarea class="span12" title="Manuales" data-rel="tooltip" id="manual" rows="5" placeholder="Manual de la casa..."></textarea>                                        
                                    <input type="hidden" name="manual" value='<?php if ($edit) { echo $apartamento['apartamento']->manual; } ?>'>
                                </div>    
                                <div class="control-group detalles_apartamento_descripcion">
                                    <input class="span12" type="text" title="Contraseña del Wi-Fi" data-rel="tooltip" name="claveWifi" placeholder="Contraseña del Wi-Fi" value="<?php if ($edit) { echo $apartamento['apartamento']->claveWifi; } ?>" />
                                </div>
                            </div>
                            <!--<div class="span4">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="span11 detalles_apartamento_popover">
                                            <p>Explíca a tus huéspedes como llegar a tu casa facilmente.</p>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="span11 detalles_apartamento_popover">
                                                <p>Proporciónales la información para llegar de forma rápida y sencilla.</p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="span11 detalles_apartamento_popover">
                                            <p>Agrega información para que disfruten la propiedad cuando ya hayan ingresado.</p>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="span11 detalles_apartamento_popover">
                                                <p>Contraseñas;funciones del equipo de música, aire acondicionado.</p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <legend class="legend_custom titulos_legend">TPV</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend span12 center" title="Idioma" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select id="idiomaTPV" class="span10">
                                            <?php foreach($idiomas as $idioma) { ?>
                                            <option value="<?php echo $idioma->codigo; ?>"><?php echo $idioma->nombre; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="control-group detalles_apartamento_descripcion">
                                    <textarea class="editor span12 validate[required]" id="tpv" rows="11" placeholder="Descripción del tpv"></textarea>                                        
                                    <input type="hidden" name="tpv" value='<?php if ($edit) { ?><?php echo $apartamento['apartamento']->tpv; ?><?php } ?>'>
                                   <!-- <p>La descripción debe contener al menos 15 palabras.Las de los
                                        apartamentos más alquilados contienen más de 150 palabras</p>-->
                                </div>                                     
                            </div>   
                        </div>
                        <br>
                        <div class="row-fluid">
                            <div class=" span12 control-group center">
                                <?php if (!$edit) { ?> 
                                    <input type="hidden" class="actionGestionGeneral" name="action" value="insert"/>
                                <?php } else { ?>
                                    <input type="hidden" class="actionGestionGeneral" name="action" value="update"/>
                                    <input type="hidden" name="idApartamento" value="<?php echo $apartamento['apartamento']->idApartamento; ?>"/>
                                    <input type="hidden" name="idDireccion" value="<?php echo $apartamento['direccion']->idDireccion; ?>"/>
                                <?php } ?>
                                <button class="btn  btn-primary noty save_c submitApartamentoGenerales" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                                <button class="btn abort-act">Cancelar</button>                                 
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>
                    </form>
                </div> 
                <div class="tab-pane" id="demo2">
                    <div class="row-fluid">
                        <div class="span12 center">
                            <div class="detalles_contenedor_fotos">
                                <form action="<?php echo $this->base_url.'/admin-ajax-apartamento-adjunto/id:'.$apartamento['apartamento']->idApartamento;?>" class="dropzone" id="apartamentoDropzone">
                                    <input type="hidden" name="idApartamento" value="<?php echo $apartamento['apartamento']->idApartamento?>" />
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="documentos-tab">
                    
                    <form id="gestion_documentos_form" enctype="multipart/form-data" >
                        <legend class="legend_custom titulos_legend">Documentos</legend>
                        <input type="hidden" name="action" value="uploadDocumentos">
                        <input type="hidden" name="apartamentoId" value="<?php echo $apartamento['apartamento']->idApartamento; ?>">
                        <div class="row-fluid">
                            <div class="span4">
                                <p>Licencia Tur&iacute;stica. 
                                    <?php if($documentos['licenciaTuristica']) { ?>
                                        <a target="_blank" href="<?php echo $this->template_url . $documentos['licenciaTuristica']->ruta; ?>"><i class="icon-download-alt" title="Descargar"></i></a>
                                        <a class="eliminarDocumento" href="#borrar_documento_overlay" data-toggle="modal" tipo-documento="licenciaTuristica"><i class="icon-trash" title="Eliminar"></i></a>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="span4">
                                <p>Nota registral. 
                                    <?php if($documentos['notaRegistral']) { ?>
                                        <a target="_blank" href="<?php echo $this->template_url . $documentos['notaRegistral']->ruta; ?>"><i class="icon-download-alt"></i></a>
                                        <a class="eliminarDocumento" href="#borrar_documento_overlay" data-toggle="modal" tipo-documento="notaRegistral"><i class="icon-trash" title="Eliminar"></i></a>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div data-rel="tooltip" class="input-prepend center span12" title="Licencia Tur&iacute;stica">
                                        <span class="add-on"><i class="icon-upload"></i></span>
                                        <input type="file" id="licenciaTuristicaFile" name="licenciaTuristicaFile" style="display: none;">
                                        <input autocomplete="off" class="input span10 " name="licenciaTuristica" id="buscarEmpresa" type="text" placeholder="Licencia Tur&iacute;stica" data-provide="typeahead" data-items="10" data-source='[]' <?php if ($edit) { ?> value="<?php echo $documentos['licenciaTuristica']->nombre; ?>" <?php } ?>/>
                                    </div> 
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div data-rel="tooltip" class="input-prepend center span12" title="Nota registral">
                                        <span class="add-on"><i class="icon-upload"></i></span>
                                        <input type="file" id="notaRegistralFile" name="notaRegistralFile" style="display: none;">
                                        <input autocomplete="off" class="input span10 " name="notaRegistral" id="buscarEmpresa" type="text" placeholder="Nota registral" data-provide="typeahead" data-items="10" data-source='[]' <?php if ($edit) { ?> value="<?php echo $documentos['notaRegistral']->nombre; ?>" <?php } ?>/>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <p>Recibo IBI. 
                                    <?php if($documentos['reciboIBI']) { ?>
                                        <a target="_blank" href="<?php echo $this->template_url . $documentos['reciboIBI']->ruta; ?>"><i class="icon-download-alt"></i></a> 
                                        <a class="eliminarDocumento" href="#borrar_documento_overlay" data-toggle="modal" tipo-documento="reciboIBI"><i class="icon-trash" title="Eliminar"></i></a>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="span4">
                                <p>C&eacute;dula Habitalidad. 
                                    <?php if($documentos['cedulaHabitabilidad']) { ?>
                                        <a target="_blank" href="<?php echo $this->template_url . $documentos['cedulaHabitabilidad']->ruta; ?>"><i class="icon-download-alt"></i></a>
                                        <a class="eliminarDocumento" href="#borrar_documento_overlay" data-toggle="modal" tipo-documento="cedulaHabitabilidad"><i class="icon-trash" title="Eliminar"></i></a>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Recibo IBI" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-upload"></i></span>
                                        <input type="file" id="reciboIBIFile" name="reciboIBIFile" style="display: none;">
                                        <input autocomplete="off" class="input span10 validate[required]" name="reciboIBI"  type="text" placeholder="Recibo IBI" data-provide="typeahead" data-items="10" data-source='[]' <?php if ($edit) { ?> value="<?php echo $documentos['reciboIBI']->nombre; ?>" <?php } ?>/>
                                    </div> 
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Cédula de Habitabilidad" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-upload"></i></span>
                                        <input type="file" id="cedulaHabitabilidadFile" name="cedulaHabitabilidadFile" style="display: none;">
                                        <input autocomplete="off" class="input span10" name="cedulaHabitabilidad" type="text" placeholder="Cédula de Habitabilidad" data-provide="typeahead" data-items="10" data-source='[]' <?php if ($edit) { ?> value="<?php echo $documentos['cedulaHabitabilidad']->nombre; ?>" <?php } ?>/>
                                    </div> 
                                </div>
                            </div>
                            
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <p>DNI Propietario. 
                                    <?php if($documentos['dniPropietario']) { ?>
                                        <a target="_blank" href="<?php echo $this->template_url . $documentos['dniPropietario']->ruta; ?>"><i class="icon-download-alt"></i></a> 
                                        <a class="eliminarDocumento" href="#borrar_documento_overlay" data-toggle="modal" tipo-documento="dniPropietario"><i class="icon-trash" title="Eliminar"></i></a>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="span4">
                                <p>Certificado Comunidad. 
                                    <?php if($documentos['certificadoComunidad']) { ?>
                                        <a target="_blank" href="<?php echo $this->template_url . $documentos['certificadoComunidad']->ruta; ?>"><i class="icon-download-alt"></i></a>
                                        <a class="eliminarDocumento" href="#borrar_documento_overlay" data-toggle="modal" tipo-documento="certificadoComunidad"><i class="icon-trash" title="Eliminar"></i></a>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="DNI Propietario" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-upload"></i></span>
                                        <input type="file" id="dniPropietarioFile" name="dniPropietarioFile" style="display: none;">
                                        <input autocomplete="off" class="input span10 validate[required]" name="dniPropietario"  type="text" placeholder="DNI Propietario" data-provide="typeahead" data-items="10" data-source='[]' <?php if ($edit) { ?> value="<?php echo $documentos['dniPropietario']->nombre; ?>" <?php } ?>/>
                                    </div> 
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Certificado Comunidad" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-upload"></i></span>
                                        <input type="file" id="certificadoComunidadFile" name="certificadoComunidadFile" style="display: none;">
                                        <input autocomplete="off" class="input span10" name="certificadoComunidad" type="text" placeholder="Certificado Comunidad" data-provide="typeahead" data-items="10" data-source='[]' <?php if ($edit) { ?> value="<?php echo $documentos['certificadoComunidad']->nombre; ?>" <?php } ?>/>
                                    </div> 
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row-fluid">
                            <div class="span12 control-group center">
                                <input type="hidden" name="action" value="update"/>
                                <input type="hidden" name="idApartamento" value="<?php echo $apartamento['apartamento']->idApartamento; ?>"/>
                                <input type="hidden" name="idDireccion" value="<?php echo $apartamento['direccion']->idDireccion; ?>"/>
                                <button class="btn  btn-primary noty save_c submitApartamentoTarifas" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                                <button class="btn abort-act">Cancelar</button>                                 
                            </div>
                        </div>
                    </form>
                </div>
                <!--<div class="tab-pane" id="demo3">
                    <form id="gestion_tarifas_form">
                        <legend class="legend_custom titulos_legend">Tarifa normal</legend>
                        <div class="row-fluid">
                            <div class="span12">
                                <p>El precio por noche es necesario, y sólo aplica en días que no poseen un precio personalizado en el calendario.</p>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div data-rel="tooltip" class="input-prepend center span12" title="Precio por noche">
                                        <span class="add-on"><i class="icon-download-alt"></i></span>
                                        <input autocomplete="off" class="input span10 validate=[required]" name="tarifaBase" id="buscarEmpresa" type="text" placeholder="Precio por noche" data-provide="typeahead" data-items="10" data-source='[]' <?php if ($edit) { ?> value="<?php echo $apartamento['apartamento']->tarifaBase; ?>" <?php } ?>/>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <p>Los precios semanales y mensuales son opcional. El precio por semana aplica a todas las reservas de 7 noches o más.
                                    El precio por mes aplica a todas las reservas de 28 noches o más.</p>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Precio por semana" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-download-alt"></i></span>
                                        <input autocomplete="off" class="input span10 validate[required]" name="tarifaSemana" id="buscarEmpresa" type="text" placeholder="Precio por semana" data-provide="typeahead" data-items="10" data-source='[]' <?php if ($edit) { ?> value="<?php echo $apartamento['apartamento']->tarifaSemana; ?>" <?php } ?>/>
                                    </div> 
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Precio por mes" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-download-alt"></i></span>
                                        <input autocomplete="off" class="input span10" name="tarifaMes" id="buscarEmpresa" type="text" placeholder="Precio por mes" data-provide="typeahead" data-items="10" data-source='[]' <?php if ($edit) { ?> value="<?php echo $apartamento['apartamento']->tarifaMes; ?>" <?php } ?>/>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row-fluid">
                            <div class="span12 control-group center">
                                <input type="hidden" name="action" value="update"/>
                                <input type="hidden" name="idApartamento" value="<?php echo $apartamento['apartamento']->idApartamento; ?>"/>
                                <input type="hidden" name="idDireccion" value="<?php echo $apartamento['direccion']->idDireccion; ?>"/>
                                <button class="btn  btn-primary noty save_c submitApartamentoTarifas" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                                <button class="btn abort-act">Cancelar</button>                                 
                            </div>
                        </div>
                    </form>
                </div>-->
                <div class="tab-pane" id="demo4">
                    <form id="tab-avanzado-frm">
                        <input type="hidden" name="apartamentoId" value="<?php echo $apartamento['apartamento']->idApartamento; ?>">
                        <input type="hidden" name="action" value="updateAvanzados">
                    <legend class="legend_custom titulos_legend">Condiciones</legend>
                    <div class="row-fluid">
                        <div class="span12">
                            <p> Condiciones de reserva</p>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="control-group detalles_avanzado_alineacion">
                                <div class="input-prepend span12" title="Política de cancelaciones" data-rel="tooltip">
                                    <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                    <select title="Cancelaciones" class="span11" name="idPoliticaCancelacion">
                                        
                                        <?php foreach($politicas as $politica) { ?>
                                            <option value="<?php echo $politica->idPoliticaCancelacion; ?>" <?php  if($politica->idPoliticaCancelacion == $apartamento['apartamento']->idPoliticaCancelacion) echo 'selected'; ?> ><?php echo $politica->nombre; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>         
                        </div>
                        <a href="#myModal" data-toggle="modal">Más información</a>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <div class="control-group detalles_apartamento_alineacion">
                                <div class="input-prepend center span12" title="Estadía mínima,noches" data-rel="tooltip">
                                    <span class="add-on"><i class="icon-download-alt"></i></span>
                                    <input autocomplete="off" class="input span10" name="estadiaMinima" id="estadiaMinima" type="text" 
                                           placeholder="Estadía mínima, noches" data-provide="typeahead" data-items="" data-source='[]'
                                           value="<?php echo $apartamento['apartamento']->estadiaMinima; ?>"/>
                                </div> 
                            </div>
                        </div>
                       <!-- <div class="span3">
                            <div class="control-group">
                                <div class="input-prepend center span12" title="Estadía máxima,noches" data-rel="tooltip">
                                    <span class="add-on"><i class="icon-download-alt"></i></span>
                                    <input autocomplete="off" class="input span10" name="estadiaMaxima" id="estadiaMaxima" type="text" 
                                           placeholder="Estadía máxima, noches" data-provide="typeahead" data-items="10" data-source='[]'
                                           value="<?php echo $apartamento['apartamento']->estadiaMaxima; ?>"/>
                                </div> 
                            </div>
                        </div>-->
                        <div class="span3">
                            <div class="control-group">
                                <div class="input-prepend center span12" title="Llegada" data-rel="tooltip">
                                    <span class="detalles_apartamento_prepend"><i class="icon-time"></i></span>
                                    <select class="span10" title="Llegada" name="horarioEntrada" id="horarioEntrada">
                                        <option value="" disabled selected>Llegada a partir de las</option>
                                        <option>Flexible</option> 
                                        <?php
                                            for($i = 0; $i <= 23; $i++) {
                                                $hora = ($i < 10 ? "0". $i : $i) . ":00";
                                        ?>
                                            <option value="<?php echo $hora; ?>" <?php if($hora.":00" == $apartamento['apartamento']->horarioEntrada) echo "selected='selected'"; ?> ><?php echo $hora; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>         
                        </div>
                        <div class="span3">
                            <div class="control-group">
                                <div class="input-prepend center span12" title="Salida" data-rel="tooltip">
                                    <span class="detalles_apartamento_prepend"><i class="icon-time"></i></span>
                                    <select class="span10" name="horarioSalida" id="horarioSalida">
                                        <option value="" disabled selected>Salida a partir de las</option>
                                        <option>Flexible</option>                                       
                                        <?php
                                            for($i = 0; $i <= 23; $i++) {
                                                $hora = ($i < 10 ? "0". $i : $i) . ":00";
                                        ?>
                                            <option value="<?php echo $hora; ?>" <?php if($hora.":00" == $apartamento['apartamento']->horarioSalida) echo "selected='selected'"; ?> ><?php echo $hora; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>         
                        </div>
                    </div>
                    <legend class="legend_custom titulos_legend">Gastos adicionales</legend>
                    <!--<div class="row-fluid">
                        <div class="span12">
                            <p>Huéspedes adicionales</p>
                        </div>
                    </div>-->
                    <div class="row-fluid">
                        <!--<div class="span3">
                            <div class="control-group detalles_apartamento_alineacion">
                                <div class="input-prepend center span12" title="Tarifa por huésped adicional" data-rel="tooltip">
                                    <span class="add-on"><i class="icon-download-alt"></i></span>
                                    <input autocomplete="off" class="input span10" name="huespedAdicionalCosto" id="huespedAdicionalCosto" 
                                           type="text" placeholder="Tarifa por huésped adicional" data-provide="typeahead" 
                                           data-items="10" data-source='[]' value="<?php echo $apartamento['apartamento']->huespedAdicionalCosto; ?>"/>

                                </div> 
                            </div>
                        </div>
                        <div class="span3">
                            <p class="detalles_apartamento_parrafo">por noche, por cada huésped a partir de</p>
                        </div>       
                        <div class="span3">
                            <div class="control-group">
                                <div class="input-prepend center span12" title="Cantidad" data-rel="tooltip" >
                                    <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                    <select class="span10" name="huespedAdicionalApartir" id="huespedAdicionalApartir">
                                        <option value="" disabled selected>Cantidad</option>
                                        <?php
                                            for($i = 0; $i <= 15; $i++) {
                                                
                                        ?>
                                            <option value="<?php echo $i; ?>" <?php if($i == $apartamento['apartamento']->huespedAdicionalApartir) echo "selected='selected'"; ?> ><?php echo $i." Persona".($i==1?"":"s"); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>         
                        </div>-->
                        <div class="span3">
                            <div class="control-group">
                                <div class="input-prepend center span12" title="Costo de la limpieza" data-rel="tooltip" >
                                    <span class="add-on"><i class="icon-download-alt"></i></span>
                                    <input autocomplete="off" class="input span10" name="costoLimpieza" id="costoLimpieza" 
                                           type="text" placeholder="Costo de la limpieza" data-provide="typeahead" 
                                           data-items="10" data-source='[]' value="<?php echo $apartamento['apartamento']->costoLimpieza; ?>"/>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <legend class="legend_custom titulos_legend">Fianza</legend>
                    <div class="row-fluid">
                        <div class="span12">
                            <p>Este depósito es retenido, 
                                y es reintegrado al huésped de no realizarse un reclamo dentro de las 48 horas posteriores a la salida del huésped</p>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <div class="control-group detalles_apartamento_alineacion">
                                <div class="input-prepend center span12" title="Depósito de seguridad" data-rel="tooltip">
                                    <span class="add-on"><i class="icon-download-alt"></i></span>
                                    <input autocomplete="off" class="input span10" name="depositoSeguridad" id="depositoSeguridad" type="text" 
                                           placeholder="Depósito de seguridad" data-provide="typeahead" data-items="10" data-source='[]'
                                           value="<?php echo $apartamento['apartamento']->depositoSeguridad; ?>"/>
                                </div> 
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    <div class="row-fluid">
                        <div class="span12 control-group center">

                            <button class="btn  btn-primary noty save_c submitApartamento" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                            <button class="btn abort-act">Cancelar</button>                                 
                        </div>
                    </div>
                    </form>
                </div>
                <div class="tab-pane" id="demo5">
                    <div class="row-fluid calendar_tarifas_main">
                        <legend class="legend_custom titulos_legend contrato_element">Contrato del apartamento</legend>
                            <form id="contrato_apartamento_form" class="contrato_element">
                                <input type="hidden" name="idApartamento" value="<?php echo $apartamento['apartamento']->idApartamento;  ?>">
                                <div class="row-fluid contrato_container">
                                    <div class="span3">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Selecciona empresa" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-th-list"></i></span>
                                                <select class="span10 validate[required] empresa_contrato" name="idEmpresa" title="Empresas">
                                                    <option value="" disabled="disabled">Selecciona empresa</option>
                                                    <?php foreach ($empresas as $empresa):?>
                                                        <option value="<?php echo $empresa->idEmpresa?>" <?php if($apartamento['empresaContrato'] && $apartamento['empresaContrato']->idEmpresa == $empresa->idEmpresa) echo 'selected'; ?>><?php echo $empresa->nombreFiscal?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span9">
                                        <div class="row-fluid instalaciones_container">
                                            <div class="row-fluid">
                                                <div class="control-group span3">
                                                    <label class="checkbox inline" title="Si el cliente reserva una estancia de 28 días o más, Clickandbooking está autorizado a reducir el precio contratado por día y los gastos relacionados suplementarios del 20%" data-rel="tooltip">
                                                        <input type="checkbox" name="alquileresLargaEstancia" value="1" <?php if($apartamento['contrato'] && $apartamento['contrato']->alquileresLargaEstancia) echo 'checked="checked"';?>>Alquileres de larga estancia
                                                    </label> 
                                                </div>
                                                <div class="control-group span3">
                                                    <div class="input-prepend center span12" title="Días considerados larga estancia" data-rel="tooltip" >
                                                        <span class="add-on"><i class="icon-pencil"></i></span>
                                                        <input autocomplete="off" class="input span10" name="diasLargaEstancia" id="diasLargaEstancia" 
                                                               type="text" placeholder="Días" data-provide="typeahead" 
                                                               data-items="10" data-source='[]' value="<?php echo $apartamento['contrato']->diasLargaEstancia; ?>"/>
                                                    </div> 
                                                </div>
                                                <div class="control-group span3">
                                                    <div class="input-prepend center span12" title="Porciento" data-rel="tooltip" >
                                                        <span class="add-on"><i class="icon-pencil"></i></span>
                                                        <input autocomplete="off" class="input span10" name="porcientoLargaEstancia" id="porcientoLargaEstancia" 
                                                               type="text" placeholder="Porciento" data-provide="typeahead" 
                                                               data-items="10" data-source='[]' value="<?php echo $apartamento['contrato']->porcientoLargaEstancia; ?>"/>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="control-group span3">
                                                    <label class="checkbox inline" title="Si el cliente reserva sus vacaciones al menos 9 meses antes de la fecha de llegada, ClickAndBooking está autorizado a reducir el precio contratado por día y los gastos relacionados suplementarios del 10%" data-rel="tooltip">
                                                        <input type="checkbox" name="reservasAnticipadas" value="1" <?php if($apartamento['contrato'] && $apartamento['contrato']->reservasAnticipadas) echo 'checked="checked"';?>>Reserva anticipada (Early Birds)
                                                    </label> 
                                                </div>
                                                <div class="control-group span3">
                                                    <div class="input-prepend center span12" title="Meses de anticipación" data-rel="tooltip" >
                                                        <span class="add-on"><i class="icon-pencil"></i></span>
                                                        <input autocomplete="off" class="input span10" name="mesesReservasAnticipadas" id="mesesReservasAnticipadas" 
                                                               type="text" placeholder="Meses" data-provide="typeahead" 
                                                               data-items="10" data-source='[]' value="<?php echo $apartamento['contrato']->mesesReservasAnticipadas; ?>"/>
                                                    </div> 
                                                </div>
                                                <div class="control-group span3">
                                                    <div class="input-prepend center span12" title="Porciento" data-rel="tooltip" >
                                                        <span class="add-on"><i class="icon-pencil"></i></span>
                                                        <input autocomplete="off" class="input span10" name="porcientoReservasAnticipadas" id="porcientoReservasAnticipadas" 
                                                               type="text" placeholder="Porciento" data-provide="typeahead" 
                                                               data-items="10" data-source='[]' value="<?php echo $apartamento['contrato']->porcientoReservasAnticipadas; ?>"/>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="control-group span3">
                                                    <label class="checkbox inline"  title="Si el cliente reserva sus vacaciones 10 días antes de la llegada, ClickAndBooking está autorizado a reducir el precio contratado por día y los gastos relacionados suplementarios del 33% (válido únicamente para estancias de 7 noches)" data-rel="tooltip">
                                                        <input type="checkbox" name="reservasUltimoMinuto" value="1" <?php if($apartamento['contrato'] && $apartamento['contrato']->reservasUltimoMinuto) echo 'checked="checked"';?>>Reserva de último minuto
                                                    </label> 
                                                </div>
                                                <div class="control-group span3">
                                                    <div class="input-prepend center span12" title="Días de anticipación" data-rel="tooltip" >
                                                        <span class="add-on"><i class="icon-pencil"></i></span>
                                                        <input autocomplete="off" class="input span10" name="diasReservasUltimoMinuto" id="diasReservasUltimoMinuto" 
                                                               type="text" placeholder="Días" data-provide="typeahead" 
                                                               data-items="10" data-source='[]' value="<?php echo $apartamento['contrato']->diasReservasUltimoMinuto; ?>"/>
                                                    </div> 
                                                </div>
                                                <div class="control-group span3">
                                                    <div class="input-prepend center span12" title="Porciento" data-rel="tooltip" >
                                                        <span class="add-on"><i class="icon-pencil"></i></span>
                                                        <input autocomplete="off" class="input span10" name="porcientoReservasUltimoMinuto" id="porcientoReservasUltimoMinuto" 
                                                               type="text" placeholder="Porciento" data-provide="typeahead" 
                                                               data-items="10" data-source='[]' value="<?php echo $apartamento['contrato']->porcientoReservasUltimoMinuto; ?>"/>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="control-group">
                                                    <label class="checkbox inline" title="El propietario oferta a ClickAndBooking una estancia de una semana gratis en su casa de vacaciones con fines de márketing (no aplicable en temporada alta). A cambio, el propietario podrá elegir una estancia de una semana en una propiedad de ClickAndBooking de la misma categoría y calidad (no aplicable en temporada alta) Cualquier gasto adicional se pagará en el lugar" data-rel="tooltip">
                                                        <input type="checkbox" name="semanaGratis" value="1" <?php if($apartamento['contrato'] && $apartamento['contrato']->semanaGratis) echo 'checked="checked"';?>>
                                                        Semana gratis
                                                    </label> 
                                                </div>                                        
                                            </div>
                                        </div>

                                        <div class="row-fluid">
                                            <div class="row-fluid">
                                                <div class="control-group">
                                                    <label class="checkbox inline" title="Si durante las 8 semanas previas a la ocupación del alojamiento es más bajo del 25% sobre un periodo de 28 días, ClickAndBooking está autorizado a reducir el precio contratado por día y los gastos relacionados suplementarios del 20% para mejorar la tasa de ocupación." data-rel="tooltip">
                                                        <input type="checkbox" name="especiales" value="1" <?php if($apartamento['contrato'] && $apartamento['contrato']->especiales) echo 'checked="checked"';?>>
                                                        Especiales
                                                    </label> 
                                                </div>                                        
                                            </div>
                                            <div class="row-fluid">
                                                <div class="control-group">
                                                    <label class="checkbox inline" title="¿El cliente ya firmo el contrato?" data-rel="tooltip">
                                                        <input type="checkbox" name="firmado" value="1" <?php if($apartamento['contrato'] && $apartamento['contrato']->firmado) echo 'checked="checked"';?>>
                                                        Firmado por el cliente
                                                    </label> 
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid contrato_element">
                                    <div class="span12 control-group center">
                                            <input type="hidden" class="actionGestionGeneral" name="action" value="updateContrato">
                                            <input type="hidden" name="idApartamento" value="<?php echo $apartamento['apartamento']->idApartamento; ?>">
                                            <button class="btn  btn-primary noty save_c submitApartamentoGenerales" type="submit" > Guardar</button>
                                            <button class="btn abort-act">Cancelar</button>                                 
                                        </div>
                                    </div>
                            </form>


                            
                    </div>
                    <div class="row-fluid calendar_tarifas_main">
                        <input type="hidden" class="apartamentoId" name="idApartamento" value="<?php echo $apartamento['apartamento']->idApartamento; ?>"/>
                        <div class="portlet box calendar calendar_blue_border">
                            <div class="portlet-title calendar_blue_bg">
                                <div class="caption">
                                    <i class="icon-reorder"></i>
                                    <span id="calendar_caption">Calendario de disponibilidad</span>
                                </div>
                            </div>

                            <div class="portlet-body light-grey">
                                <div class="row-fluid">

                                    <div class="span3">
                                        <div class="modal-body-tarifa-gestion">
                                            <form class="tarifas_modal_form">
                                            <div class="row-fluid">
                                                <div class="span6">
                                                    <div class="control-group">
                                                        <div class="input-prepend center span9" title="Fecha inicio" data-rel="tooltip">
                                                            <label>Fecha Inicial</label>
                                                            <div id="date-start" class="input-append span12 date datepicker" data-date-format="dd-mm-yyyy">
                                                                <input  class="span10 validate[required] date-start" size="16" name="fechaInicio" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="span6">
                                                    <div class="control-group">
                                                        <div class="input-prepend center span9" title="Fecha final" data-rel="tooltip">
                                                            <label>Fecha Final</label>
                                                            <div id="date-end" class="input-append span12 date datepicker" data-date-format="dd-mm-yyyy">
                                                                <input  class="span10 validate[required] date-end" size="16" name="fechaFinal" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="span12">
                                                    <div class="control-group">
                                                        <div class="input-prepend center span12" title="Tipo de acción" data-rel="tooltip">
                                                            <label>Tipo de acción</label>
                                                            <span class="add-on"><i class="icon-check"></i></span>
                                                            <select class="span8 validate[required]" id="tipo_accion" name="tipo_accion">
                                                                <option value="" disabled>Tipo de acción</option>
                                                                    <option value="disponibilidad">Disponibilidad</option>
                                                                    <option value="precio_noche">Precio por noche</option>
                                                                    <option value="descuento">Descuento</option>
                                                                    <option value="minimo_noches">Mínimo de noches</option>
                                                                    <option value="descuento_consumo">Descuento por consumo</option>
                                                                    <option value="limpiar_todo">Limpiar todo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="span12 disponibilidad_accion tipo_accion">
                                                    <div class="control-group">
                                                        <div class="input-prepend center span12" title="Disponibilidad" data-rel="tooltip">
                                                            <label>Estatus</label>
                                                            <span class="add-on"><i class="icon-check"></i></span>
                                                            <select class="span8 validate[required]" name="estatus">
                                                                <option value="" disabled>Disponibilidad</option>
                                                                    <option value="disponible">Disponible</option>
                                                                    <option value="no disponible">No Disponible</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12  precio_noche_accion tipo_accion">
                                                    <div class="control-group">
                                                        <div class="input-prepend  center span12" title="Precio por noche" data-rel="tooltip">
                                                            <label>Precio por noche</label>
                                                            <span class="add-on"><i class="icon-briefcase"></i></span>
                                                            <input class="input-large span8 validate[required, custom[number]] disponible" name="precio" type="text" placeholder="Precio por noche" data-prompt-position="topLeft:2%"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="span12  descuento_accion tipo_accion">
                                                    <div class="control-group">
                                                        <div class="input-prepend  center span12" title="Descuento" data-rel="tooltip">
                                                            <label>Descuento</label>
                                                            <span class="add-on"><i class="icon-briefcase"></i></span>
                                                            <input class="input-large span8 validate[custom[number]] disponible" name="descuento" type="text" placeholder="Descuento" data-prompt-position="topLeft:2%"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <!--<div class="span6">
                                                    <div class="control-group">
                                                        <div class="input-prepend  center span12" title="Precio Final" data-rel="tooltip">
                                                            <label>Precio Final</label>
                                                            <span class="add-on"><i class="icon-briefcase"></i></span>
                                                            <input class="input-large span8 disponible" name="precioFinal" readOnly type="text" placeholder="Precio Final" data-prompt-position="topLeft:2%"/>
                                                        </div>
                                                    </div>
                                                </div>-->
                                                <div class="span12  minimo_noches_accion tipo_accion">
                                                    <div class="control-group">
                                                        <div class="input-prepend  center span12" title="M&iacute;nimo de noches" data-rel="tooltip">
                                                            <label>M&iacute;nimo de noches</label>
                                                            <span class="add-on"><i class="icon-briefcase"></i></span>
                                                            <select class="span8 validate[required] disponible" name="minimoNoches">
                                                                <?php for($i=0;$i<=30;$i++){ ?>
                                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                <?php } ?>    
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-fluid  descuento_consumo_accion tipo_accion">
                                                <div class="span6">
                                                    <div class="control-group">
                                                        <div class="input-prepend  center span12" title="Precio por consumo" data-rel="tooltip">
                                                            <label>Precio base</label>
                                                            <span class="add-on"><i class="icon-briefcase"></i></span>
                                                            <input class="input-large span8 validate[custom[number]] disponible" name="precioPorConsumo" type="text" placeholder="Precio por consumo" data-prompt-position="topLeft:2%"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="span6">
                                                    <div class="control-group">
                                                        <div class="input-prepend  center span12" title="Descuento por consumo" data-rel="tooltip">
                                                            <label>Descuento</label>
                                                            <span class="add-on"><i class="icon-briefcase"></i></span>
                                                            <input class="input-large span8 validate[custom[number]] disponible" name="descuentoPorConsumo" type="text" placeholder="Descuento por consumo" data-prompt-position="topLeft:2%"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-fluid buttons-tarifas-form">
                                                <input type="hidden" name="idApartamento" value="<?php echo $apartamento['apartamento']->idApartamento; ?>"/>
                                                <input type="hidden" name="action" value="agregar_tarifa" />
                                                <input type="submit" class="btn btn-primary" value="Guardar">
                                                <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="span9">
                                        <div class="row-fluid">
                                            <!--<div class="span2 responsive calendario_element" data-tablet="span12 fix-margin" data-desktop="span8">
                                                 <a href="javascript:void(0)" id="event_add" class="btn btn-primary" >Modificar</a>
                                            </div>
                                            <div style="margin-left:0px;" class="span2 responsive contrato_element" data-tablet="span12 fix-margin" data-desktop="span8">
                                                 <a href="#contrato_precios_overlay" id="event_contrato" class="btn btn-primary" data-toggle="modal">Precios</a>
                                            </div>-->
                                            <div class="span12">
                                                <div id="calendar" class="has-toolbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Política de cancelaciones</h3>
    </div>
    <div class="modal-body">
        <p>Flexible: Reembolso completo 1 dia antes de la llegada, a excepción de la comisión
            La tarifa de limpieza es siempre reembolsable si el huésped no realizó el check in.
            La comisión por el servicio no es reembolsable.
            Si existe alguna queja de cualquiera de las partes implicadas, se debe notificar dentro de las 24 horas después del check in.
            hará de mediador si fuera necesario y tiene la última palabra en todas las disputas.
            Una reserva está oficialmente cancelada cuando el huésped hace clic en el botón de cancelación en la página de confirmación de la cancelación.
            Las políticas de cancelación pueden ser reemplazadas por la política de Reembolso al huésped, cancelaciones por seguridad, o circunstancias atenuantes. Por favor revisa estas excepciones.</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        <!--<button class="btn btn-primary">Save changes</button>-->
    </div>
</div>

<div id="contrato_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="myModalLabel">Detalle de contrato</h3>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
            <p class="span6"><strong>Fecha inicial:</strong> <span class="fecha_inicio"></span></p>
            <p class="span6"><strong>Fecha final:</strong> <span class="fecha_fin"></span></p>
        </div>
        <div class="row-fluid">
            <p class="span6"><strong>Porcentaje:</strong> <span class="porcentaje"></span></p>
            <p class="span6"><strong>Precio:</strong> <span class="precio"></span></p>
        </div>
        <p><strong>Descripción:</strong> <span class="descripcion"></span></p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        <!--<button class="btn btn-primary">Save changes</button>-->
    </div>
</div>
<!--
<div id="disponibilidad_overlay" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form class="tarifas_modal_form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Disponibilidades</h3>
        </div>
        <div class="modal-body">
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend center span9" title="Fecha inicio" data-rel="tooltip">
                            <label>Fecha Inicial</label>
                            <div id="date-start" class="input-append span12 date datepicker" data-date-format="dd-mm-yyyy">
                                <input  class="span10 validate[required] date-start" size="16" name="fechaInicio" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend center span9" title="Fecha final" data-rel="tooltip">
                            <label>Fecha Final</label>
                            <div id="date-end" class="input-append span12 date datepicker" data-date-format="dd-mm-yyyy">
                                <input  class="span10 validate[required] date-end" size="16" name="fechaFinal" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="span12">
                    <div class="control-group">
                        <div class="input-prepend center span12" title="Disponibilidad" data-rel="tooltip">
                            <label>Estatus</label>
                            <span class="add-on"><i class="icon-check"></i></span>
                            <select class="span8 validate[required]" name="estatus">
                                <option value="" disabled>Disponibilidad</option>
                                    <option value="disponible">Disponible</option>
                                    <option value="no disponible">No Disponible</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Precio por noche" data-rel="tooltip">
                            <label>Precio por noche</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span8 validate[required, custom[number]] disponible" name="precio" type="text" placeholder="Precio por noche" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Descuento" data-rel="tooltip">
                            <label>Descuento</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span8 validate[custom[number]] disponible" name="descuento" type="text" placeholder="Descuento" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Precio Final" data-rel="tooltip">
                            <label>Precio Final</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span8 disponible" name="precioFinal" readOnly type="text" placeholder="Precio Final" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="M&iacute;nimo de noches" data-rel="tooltip">
                            <label>M&iacute;nimo de noches</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <select class="span8 validate[required] disponible" name="minimoNoches">
                                <?php for($i=0;$i<=30;$i++){ ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>    
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Precio por consumo" data-rel="tooltip">
                            <label>Precio por consumo</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span8 validate[custom[number]] disponible" name="precioPorConsumo" type="text" placeholder="Precio por consumo" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Descuento por consumo" data-rel="tooltip">
                            <label>Descuento por consumo</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span8 validate[custom[number]] disponible" name="descuentoPorConsumo" type="text" placeholder="Descuento por consumo" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="idApartamento" value="<?php echo $apartamento['apartamento']->idApartamento; ?>"/>
            <input type="hidden" name="action" value="agregar_tarifa" />
            <input type="submit" class="btn btn-primary" value="Guardar">
            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
    </form>
</div>-->


<div id="contrato_precios_overlay" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form class="tarifas_modal_form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Precios del contrato</h3>
        </div>
        <div class="modal-body">
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend center span9" title="Fecha inicio" data-rel="tooltip">
                            <div class="date-start input-append span12 date datepicker" data-date-format="dd-mm-yyyy">
                                <input  class="span10 validate[required]" size="16" name="fechaInicio" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend center span9" title="Fecha final" data-rel="tooltip">
                            <div class="date-end input-append span12 date datepicker" data-date-format="dd-mm-yyyy">
                                <input  class="span10 validate[required]" size="16" name="fechaFinal" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="span12">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Precio" data-rel="tooltip">
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span6 validate[required]" name="precioContrato" type="text" placeholder="Precio" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="idApartamento" value="<?php echo $apartamento['apartamento']->idApartamento; ?>"/>
            <input type="hidden" name="action" value="agregar_tarifa" />
            <input type="submit" class="btn btn-primary" value="Guardar">
            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
    </form>
</div>


<div id="borrar_documento_overlay" class="modal hide fade" 
     tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
     aria-hidden="true" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Eliminar</h3>
    </div>
    <div class="modal-body">
        <input type="hidden" id="tipoDocumentoBorrar" name="tipoDocumento">
        Está seguro que desea borrar el documento?
    </div>
    <div class="modal-footer">
        <button id="btn_eliminar_documento" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Aceptar</button>
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    </div>
</div>