{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/contacto.css" rel="stylesheet">
{/block}

{block name="content" append}
        <div class="container row-fluid">
            <div class="titulo row-fluid">
                <div class="col-xs-12">
                    <h2>Contacto</h2>
                </div>
            </div>

            <div class="contenedor-mapa row-fluid">

                <div class="container-mapa">

                    Aqui va un mapa
                </div>      
            </div> 


            <div class="container-columnas row">
                <div class="contacto col-md-8">
                    <div class="titulo-contacto col-md-12">
                        <h3>Contáctanos</h3>
                    </div>
                    <div class="datos-contacto row">
                        <form class="form-inline col-md-12" role="form">
                            <div class="form-group col-md-6">  
                                <label class="sr-only" for="exampleInputEmail2">Nombre completo</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nombre completo">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="sr-only" for="exampleInputEmail2">Correo eletrónico</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo electrónico">
                            </div>
                        </form>
                    </div>
                    <div class="contenedor-textarea row-fluid">
                        <form class="bs-example col-md-12">
                            <textarea class="btn-box-text validate[required]" name="mensaje" placeholder="Mensaje" style="margin: 16px 0px 0px; height: 150px; width: 723px;"></textarea>
                        </form>
                    </div>
                    <div class="contenedor-boton row-fluid">

                        <button type="button" class="btn btn-primary">Enviar</button>

                    </div>
                </div>
                <div class="columna-derecha row-fluid col-md-4">
                    <div class="boletin-informativo col-md-12">
                        <h3>Boletín Informativo</h3>
                    </div>
                    <div class="contenido-boletin">
                        <p class="col-md-12">Suscríbete a nuestro boletín ahora para estar actualizado con las novedades.</p>
                    </div>
                    <form role="form">
                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo eletrónico">
                        </div>
                        <div class="contenedor-enviar col-md-12">
                            <button type="button" class="btn btn-primary pull-right">Enviar</button>
                        </div>
                        <div class="detalles col-md-12">
                            <h3>Detalles</h3>
                        </div>
                        <div class="contenido-detalles  row-fluid col-md-12">

                            <p><strong>Empresa:</strong> Fuertetour </p>
                            <p><strong>CIF:</strong> 34678637485 </p>
                            <p><strong>Dirección:</strong> Mi calle mi número </p>

                        </div>
                    </form>
                </div>
            </div> 
        </div>
{/block}