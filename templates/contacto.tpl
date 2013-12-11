{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/contacto.js"></script>
    <script type="text/javascript">
        var lat = "{$config->direccion->lat}";
        var lon = "{$config->direccion->lon}";
    </script>
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/contacto.css" rel="stylesheet">
{/block}

{block name="content" append}
        <div class="container row-fluid body-content">
            <div class="titulo row-fluid">
                <div class="col-xs-12">
                    <h2>{#contacto#}</h2>
                </div>
            </div>

            <div class="contenedor-mapa row-fluid">

                <div class="container-mapa" id="container-mapa">

                </div>      
            </div> 


            <div class="container-columnas row">
                <div class="contacto col-md-8">
                    <form class="form-inline col-md-12" role="form" id="contactoForm">
                    <div class="titulo-contacto col-md-12">
                        <h3>{#contactanos#}</h3>
                    </div>
                    <div class="datos-contacto row">
                        
                            <div class="form-group col-md-6">  
                                <label class="sr-only" for="nombre">{#nombre_completo#}</label>
                                <input type="text" class="form-control validate[required]" name="nombre" placeholder="Nombre completo">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="sr-only" for="email">{#correo_eletronico#}</label>
                                <input type="email" class="form-control validate[required, custom[email]]" name="email" placeholder="Correo electrónico">
                            </div>
                        
                    </div>
                    <div class="contenedor-textarea row-fluid">
                        
                            <textarea class="btn-box-text validate[required]" name="mensaje" placeholder="Mensaje" style=""></textarea>
                        
                    </div>
                    <div class="contenedor-boton row-fluid">

                        <button type="submit" class="btn btn-primary">{#enviar#}</button>

                    </div>
                    </form>
                </div>
                <div class="columna-derecha row-fluid col-md-4">
                    <div class="boletin-informativo col-md-12">
                        <h3>{#boletin_informativo#}</h3>
                    </div>
                    <div class="contenido-boletin">
                        <p class="col-md-12">{#suscribete_a_nuestro_boletin_ahora_para_estar_actualizado_con_las_novedades#}</p>
                    </div>
                    <form role="form" id="suscripcionForm">
                        <div class="form-group col-md-12">
                            <input type="email" class="form-control validate[required, custom[email]]" name="email" placeholder="Correo eletrónico">
                        </div>
                        <div class="contenedor-enviar col-md-12">
                            <button type="submit" class="btn btn-primary pull-right">{#enviar#}</button>
                        </div>
                        <div class="detalles col-md-12">
                            <h3>{#detalles#}</h3>
                        </div>
                        <div class="contenido-detalles  row-fluid col-md-12">

                            <p><strong>{#empresa#}</strong> Fuertetour </p>
                            <p><strong>CIF:</strong> 34678637485 </p>
                            <p><strong>{#direccion#}</strong>{#mi_calle_mi_numero#} </p>

                        </div>
                    </form>
                </div>
            </div> 
        </div>
{/block}