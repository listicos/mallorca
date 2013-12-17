{extends file="index.tpl"}

{block name="style" append}
  <link rel="stylesheet" type="text/css" href="{$template_url_s}/css/reservar.css" />
  <link rel="stylesheet" type="text/css" href="{$template_url_s}/css/toastr.css" />
  <link rel="stylesheet" type="text/css" href="{$template_url}/css/admin/validationEngine.jquery.css" />
  <link rel="stylesheet" type="text/css" href="{$template_url_s}/css/flexslider.css" />
{/block}

{block name="script" append}
<script src="{$template_url_s}/js/reservas.js"></script>
<script src="{$template_url}/js/toastr.js"></script>
<script src="{$template_url_s}/js/jquery.creditCardValidator.js"></script>
<script src="{$template_url}/js/admin/jquery.validationEngine.js"></script>
<script src="{$template_url}/js/admin/jquery.validationEngine-es.js"></script>
<script src="{$template_url_s}/js/jquery.flexslider.js"></script>

{/block}

{block name="content" append}
<div class="main_content content body-content">
    <div class="row-fluid">
        <div class="row">
            <div class="col-md-12 reserva-left-side">
                 <ol class="breadcrumb">
                  <li><a href="{$base_url}">{#inicio#}</a></li>
                  <li><a href="{$base_url}/apartamento/id:{$apartamento['apartamento']->idApartamento}">{$apartamento['apartamento']->nombre}</a></li>
                  <li class="active">{#reservar#}</li>
                </ol>
                    <div class="row reservas-list-main tab-content">
                        <form id="reservaFrm">
                        <!-- reservation_step -->
                        <div class="tab-pane active clearfix" id="reservation_step">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h1 class="text-center panel-title">{#datos_de_tu_reserva#}</h1>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                 <div class="flexslider">
                                                      <ul class="slides">
                                                      {foreach from=$apartamento['adjuntos'] item=imagen}
                                                        <li class="slide">
                                                          <img src="{$template_url}{$imagen->ruta}">  
                                                        </li>
                                                      {/foreach}
                                                      </ul>
                                                    </div>
                                            </div>
                                            <div class="reserva-description col-sm-9">
                                                <h3 class="text-primary">{$apartamento['apartamento']->nombre}</h3>
                                                <p class="text-muted">Llegada: {$entrada}</p>
                                                <p class="text-muted">Salida: {$salida}</p>
                                                <p class="text-muted">{$noches} Noche(s)</p>
                                                <div class="reserva-hotel-detalles" style="margin-top: 10px;">
                                                    <h4>Datos del apartamento</h4>
                                                    <table class="table table-striped table-bordered">
                                                        <tr>
                                                            <td>{#tipo_de_alojamiento#}</td>
                                                            <td class="value">{$apartamento['apartamento']->tipo->nombre}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{#capacidad#}</td>
                                                            <td class="value">{$apartamento['apartamento']->capacidadPersonas} {#personas#}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{#dormitorios#}</td>
                                                            <td class="value">{$apartamento['apartamento']->habitaciones}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{#camas#}</td>
                                                            <td class="value">{$apartamento['apartamento']->camas}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{#banios#}</td>
                                                            <td class="value">{$apartamento['apartamento']->banio}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h1 class="text-center panel-title">{#completa_tus_datos#}</h1>
                                    </div>
                                    <div class="panel-body">
                                  <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6 form-group">
                                                            <label for="nombre_viajero">{#nombre#}</label>
                                                            <input type="text" name="nombre" class="form-control validate[required]" placeholder="Nombre/s"/>
                                                        </div>
                                                        <div class="col-sm-6 form-group">
                                                            <label for="apellido_viajero">{#apellidos#}</label>
                                                            <input type="text" name="apellidoPaterno" class="form-control validate[required]" placeholder="Apellido/s"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                         <div class="col-sm-6 form-group">
                                                             <label>{#correo_electronico#}</label>
                                                             <input type="text" name="email" class="form-control validate[required, custom[email]]" placeholder="Correo electrónico">
                                                         </div>
                                                         <div class="col-sm-6 form-group">
                                                             <label>{#repita_el_correo_electronico#}</label>
                                                             <input type="text" name="repeatEmail" class="form-control validate[required, custom[confirmationEmail]]" placeholder="Repita el correo electrónico">
                                                         </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 form-group">
                                                            <label for="apellido_viajero">{#telefono_movil#}</label>
                                                            <input type="text" name="telefono" class="form-control" placeholder="Teléfono móvil (para incidencias)"/>
                                                        </div>
                                                        <div class="col-sm-6 form-group">
                                                            <label>{#pais_de_residencia#}</label>
                                                            <select class="form-control" name="pais">
                                                                <option value="1">España</option>
                                                                <option value="2">México</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row-fluid form-group">
                                                        <label>Observaciones</label>
                                                        <textarea name="observaciones" class="form-control" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                              </div>
                        </div>
                        </div>
                        <!-- end reservation_step -->
                        <br />
                        <!-- data_step -->
                        <div class="tab-pane active" id="data_step">
                            
                                <!--<div class="panel panel-default panel-success">
                                <div class="panel-heading">
                                  <h1 class="panel-title text-center">✓ Cobraremos de tu tarjeta: {$menor_precio}</h1>
                                </div>
                                <div class="panel-body">
                                            <div class="row datos-pago-content">
                                                
                                                <div class="col-sm-12">
                                                    <div class="row datos-pago">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12 form-group">
                                                                    <div class="col-md-12">
                                                                        <ul class="cards">                                                                            
                                                                                <li card="visa" title="Visa" class="visa off">Visa</li>                                                                            
                                                                                <li title="MasterCard" card="mastercard" class="mastercard off">Master Card</li>                                                                            
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                            <label>Número de tarjeta</label>
                                                                            <input class="form-control validate[required, custom[customCreditCard]]" type=text name="numero" placeholder="{#numero_tarjeta_credito#}" />
                                                                            <input type="hidden" name="tipoTarjeta">
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label>Nombre del titular que aparece en la tarjeta</label>
                                                                        <input type="text" class="form-control validate[required]" name="titular"/>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                

                                                                <div class="col-md-6 form-group">
                                                                    <label class="display-block">Fecha de vencimiento</label>
                                                                    <div class="col-md-6">
                                                                    <select class="form-control vencimiento-option inline" name="caducidadMes">
                                                                        <option value="0">Mes</option>
                                                                        <option value="01">01</option>
                                                                        <option value="02">02</option>
                                                                        <option value="03">03</option>
                                                                        <option value="04">04</option>
                                                                        <option value="05">05</option>
                                                                        <option value="06">06</option>
                                                                        <option value="07">07</option>
                                                                        <option value="08">08</option>
                                                                        <option value="09">09</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                    </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <select class="form-control vencimiento-option inline" name="caducidadAnio">
                                                                        <option value="0">Año</option>
                                                                        <option value="14">14</option>
                                                                        <option value="15">15</option>
                                                                        <option value="16">16</option>
                                                                        <option value="17">17</option>
                                                                        <option value="18">18</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 form-group">
                                                                    <label>CVV</label>
                                                                    <input type="text" class="form-control validate[required, custom[integer]]" maxlength="4" name="cvv">
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                                                                           
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                
                                
                                    <br />-->
                                
               
                                    <div class="col-md-12">
                                     <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h1 class="text-center panel-title">{#termina_tu_reserva#}</h1>
                                            </div>
                                            <div class="panel-body">
                                                 <p>{#te_enviaremos_tu_reserva_por_mail_a#}<br />
                                                    {$apartamento['apartamento']->tpv}</p>

                                               <div class="checkbox">
                                                   <input type="checkbox" name="aceptoPoliticas" class="validate[required]">
                                                   {#entiendo_y_acepto_las#} <a id="privacy_policies" href="javascript:void(0)">{#politicas_de_privacidad#}</a> {#y_las#} <a id="book_conditions" href="javascript:void(0)">{#condiciones_de_reserva#}</a>
                                               </div>
                                               <div class="checkbox">
                                                   <input type="checkbox" name="fechasFlexibles" class="">{#mis_fechas_son_flexibles#}<br>
                                                   <span class="flexibles_p">{#explicacion_fechas_flexibles#}</span>
                                               </div>
                                             <div class="total-bottom-content">
                                            <p class="text-primary font-s24 text-right">{#total#} {$menor_precio}</p>
                                            <p class="text-right"><small>El importe incluye todos los impuestos</small></p>
                                        </div>
                                        
                                        <div class="text-right">
                                            <input type="hidden" name="idApartamento" value="{$apartamento['apartamento']->idApartamento}">
                                            <input type="hidden" name="action" value="insert">
                                            <input type="submit" class="btn btn-primary pay_booking" value="Finalizar reserva">
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                       
                                        </div>
                                    </div>
                        </div>
                        <!-- end data_step -->
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="privacy_policies_modal">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Pol&iacute;ticas de privacidad</h4>
            </div>
            <div class="modal-body">
<div style="overflow-y: auto; max-height: 400px">
    <p><b>Nuestro compromiso por cumplir la Ley</b></p>
    <p>
        Esta Política de Privacidad únicamente afecta a aquellos datos que aportes a outlet-rooms.com, bien a través de los formularios, bien a través de cualquier otro medio a tu disposición. Al aceptar esta Política de Privacidad, das tu consentimiento para que outlet-rooms.com trate tus datos personales para los fines que se indican a continuación.
    </p>
    
    <p><b>¿Qué información recopilaremos?</b></p>
    <p>
        Al realizar una reserva, te pediremos datos personales identificativos (nombre, apellido, dirección...) así como en su caso, el medio de pago para realizar la reserva, por lo que podríamos solicitar tus datos de tarjeta bancaria para gestionar los pagos. También puedes aportarnos datos a través de encuestas y formularios en la web.
        <br>
        Además, por el uso que hagas de outlet-rooms.com podrás ir aportando diversa información personal, incluido (sin carácter excluyente) comentarios, tus gustos y preferencias a la hora de realizar reservas, etc.
        <br>
        El Usuario se compromete a facilitar sus datos de forma veraz y real en los procesos de reserva establecidos en la Página.
    </p>
    
    <p><b>¿Para qué utilizaremos tus datos?</b></p>
    <p>
        Cuando sea información aportada directamente por ti, la utilizaremos para realizar nuestros servicios: gestionar tu reserva y contestar a las dudas y preguntas que nos formules, permitir la utilización de servicios de comentarios, etc. 
        <br>
        Cuando se obtenga información automáticamente por tu uso de la Página, la utilizaremos para elaborar estadísticas y, en caso de usar esas estadísticas, disociaremos en todo caso tus datos. Es decir, que la información no hará referencia ti nunca. Estas estadísticas las utilizaremos para mejorar los servicios de outlet-rooms.com ofreciéndote un servicio más personalizado, así como para ofrecer información segmentada a nuestros asociados y también para mejorar la publicidad que recibas.
        <br>
        También utilizaremos tus datos, siempre que nos lo hayas permitido de forma previa, para enviarte ofertas relacionadas con los servicios de outlet-rooms.com, especialmente por correo electrónico. Estas comunicaciones pueden incluir publicidad de terceros ajenos a outlet-rooms.com, pero estarán relacionados con los servicios que ofrecemos (venta de productos similares, organización de ferias o eventos relacionados, etc). En caso de que no desees recibir comunicaciones comerciales de este tipo cuando efectúes una reserva podrás marcar la casilla de no recibir publicidad, escríbenos a info@outlet-rooms.com o haz clic en el botón habilitado para ello en los correos que recibas.
    </p>
    
    <p><b>Comunicación de tus datos a terceros</b></p>
    <p>
        Para la consecución de la prestación del servicio de reserva de entradas, ten en cuenta que será necesario comunicar tus datos al Promotor o a las empresas que gestione el evento, para la correcta gestión de la reserva. Esta comunicación es necesaria para la prestación del servicio. 
        En cualquier caso, los datos comunicados serán los imprescindibles para esta gestión. 
        <br>
        Fuera de estos casos, no comunicaremos tus datos personales a terceros sin tu consentimiento. 
    </p>
    
    <p><b>Seguridad de los datos</b></p>
    <p>
        Toda la parte de reserva en outlet-rooms.com estará protegida mediante un protocolo de seguridad SSL, para que tus datos y tus fotos estén seguras. De esta forma evitamos que terceras personas puedan acceder a ellos, pues ponemos todos los esfuerzos razonables para ello.
    </p>
    
    <p><b>Cookies</b></p>
    <p>
        outlet-rooms.com puede disponer de tecnología para la implantación de archivos denominados "cookies" en el equipo que utilices para acceder. Las cookies que se emplean únicamente son técnicas y se utilizarán para que el usuario, cada vez que haga clic en un enlace, no tenga que introducir de nuevo la contraseña. Además, cuando el usuario cierra el navegador, la cookie se borrará.
        <br>
        Puedes desactivar la instalación de estas cookies a través de las opciones de configuración de tu navegador. También puedes borrar las cookies una vez hayas terminado de usar outlet-rooms.com. 
        <br>
        outlet-rooms.com también puede emplear otros mecanismos informáticos de obtención de información de navegación para la comprobación del tráfico y las estadísticas. A través de ellos sólo se obtendrían datos de tráfico, nunca tus datos personales.
    </p>
    
    <p><b>Tus derechos</b></p>
    <p>
        Puedes ejercer tus derechos de acceso, rectificación, cancelación y oposición según la ley enviándonos una petición escrita a Booking DeTeatros S.L. Urbanización las Margaritas 43, 35660 Corralejo, (Fuerteventura-España), o a info@outlet-rooms.com.  Tienes que acompañar una fotocopia de tu DNI u otro documento oficial que te identifique, pues por seguridad, tenemos que comprobar que eres tú para no dar tus datos a otra persona.
    </p>
    
    <p><b>Idioma</b></p>
    <p>
        El idioma aplicable a esta Política de Privacidad es el español. Si se te han ofrecido versiones de esta Política de Privacidad en otros idiomas, ha sido para tu comodidad y aceptas expresamente que las mismas se regirán siempre por la versión en español.
        <br>
        Si hay alguna contradicción entre lo que dice la versión en español de esta Política de Privacidad y lo que dice la traducción, en todo caso prevalecerá la versión en español.
    </p>
    
    <p><b>Dudas y consultas</b></p>
    <p>
        Por supuesto, si tienes dudas o consultas sobre la protección de tus datos en outlet-rooms.com, podrás enviarnos un email a info@outlet-rooms.com. Trataremos de solucionarte lo antes posible tus dudas.
    </p>
    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{#cerrar#}</button>
            </div>
        </div>
    </div>
</div>
        
<div class="modal fade" id="book_conditions_modal">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">{#condiciones_de_reserva#}</h4>
            </div>
            <div class="modal-body">
        <div style="overflow-y: auto; max-height: 400px">
        <p><b>Condiciones generales de compra</b></p><p></p><p><b>3. Obligaciones del usuario</b></p><p>Como Usuario, por la mera visita o navegación por la web, debes:
                   - Utilizar la Página y sus servicios y funcionalidades respetando la legislación aplicable (en especial las de propiedad intelectual e industrial y las leyes de protección de datos de carácter personal), así como la moral y buenas costumbres generalmente aceptadas, el orden público y las presentes Condiciones Generales de Uso.
                   - Utilizar la Página de una forma diligente, correcta y lícita.
                   - Si hacemos cambios en estas Condiciones Generales de Uso o en la Política de Privacidad, revísalos: pueden ser importantes.
                   - En su caso, revisa también las notificaciones que te enviemos, pueden contener información importante.
               Asimismo, como usuario, te comprometes a respetar outlet-rooms.com y cumplir con las siguientes condiciones:
                - No incumplir estas Condiciones Generales de Uso ni ninguna de sus condiciones ni de las obligaciones asumidas en ellas.
                - No infringir ningún derecho o interés de outlet-rooms.com ni de terceros, tales como derechos de propiedad intelectual o industrial (patentes, marcas, secretos comerciales, derechos de copyright u otros derechos  de nuestra propiedad).
                - No utilizar la Página para recabar información y contenidos para prestar cualquier servicio que, a criterio de outlet-rooms.com, le correspondan o compitan con el mismo.
                - No introducir por cualquier medio virus informáticos, gusanos, troyanos o cualquier otra clase de códigos maliciosos dirigidos a interrumpir, destruir o limitar la funcionalidad de outlet-rooms.com.
                - No utilizar técnicas de ingeniería inversa y/o descompilar o descifrar o utilizar cualquier otro sistema para conocer el código fuente de la Página o de cualquier elemento sujeto a copyright o propiedad intelectual subyacente.
                - No modificar la Página de ninguna forma o manera posible.
                - No dañar, deshabilitar, sobrecargar o dificultar el servicio (o la red o las redes conectadas al servicio), o interferir en el uso y disfrute del servicio por parte de cualquier usuario.
                - No realizar acciones o utilizar medios para simular la apariencia o función de outlet-rooms.com con cualquier finalidad</p><p><b>9. Legislación y fuero</b></p><p>Las relaciones entre outlet-rooms.com con los Usuarios de sus servicios telemáticos, presentes en la web, se encuentran sometidas a la legislación española. Las partes, con renuncia expresa a cualquier fuero que pudiera corresponderles, se someten a la jurisdicción de los Juzgados y Tribunales de Madrid.</p><p><b>1. Identificación de las Partes. Objeto y Duración</b></p><p>Las presentes Condiciones de Contratación, son suscritas:
De una parte por Booking DeTeatros S.L., (en adelante outlet-rooms.com), con domicilio social en Urbanización las Margaritas 43, 35660 Corralejo, (Fuerteventura-España) y CIF B76153725, registrado en el Registro Mercantil de Las Palmas, Tomo 159, Folio 84, Sección 8, H IFolio 7103, I/A 1ª, titular de la Página Web http://www.outlet-rooms.com, (en adelante, la Página), 
De otra parte, por el Promotor, entendido como toda persona física o jurídica dedicada a la organización de espectáculos artísticos o actividades escénicas, como teatro, cine, danza, conciertos, etc., que se registre en la Página con el fin de establecer una relación con outlet-rooms.com para la intermediación y promoción por parte de éste de entradas y reservas de entradas para los eventos o espectáculos del Promotor a través de Internet, así como la puesta a disposición del Promotor de herramientas de compra de entradas a través de Internet.
El Promotor, al marcar la casilla de verificación del consentimiento correspondiente a estas Condiciones Generales declara conocer las características esenciales de la Página y las presentes Condiciones Particulares y someterse a las mismas, sin perjuicio de la aplicación de otras condiciones particulares vigentes entre las partes. 
outlet-rooms.com pone a disposición del Promotor un servicio de atención de consultas a través del correo electrónico info@outlet-rooms.com por el que el usuario podrá solicitar información. 
El Promotor contrata los servicios de outlet-rooms.com con duración indefinida. Las Partes podrán resolver el Contrato en cualquier momento, y acuerdan comunicar tal voluntad con la antelación de un (1) mes, en consonancia con la buena fe contractual.
</p><p><b>2. Qué es outlet-rooms.com (desplegable)</b></p><p>El principal servicio de outlet-rooms.com es la intermediación del Promotor con los Usuarios de Internet, ofreciendo a éstos un sistema de contratación de entradas o reservas de entradas por Internet fácil y sencillo. Además, outlet-rooms.com ofrece al Promotor una herramienta de control y gestión de eventos y espectáculos, una fórmula para promocionar adecuadamente sus servicios y una central de reservas para los casos en los que el usuario o comprador quiera adquirir entradas a través de medios telefónicos o telemáticos al propio Promotor.
De forma general, outlet-rooms.com permite a los Teatros:
a) Añadir y suprimir eventos que vayan a celebrarse en cada recinto cuya cuenta gestione el Promotor y cuyas entradas éste puede poner a disposición del público a través de outlet-rooms.com. 
b) Esto se hace de manera muy sencilla a través de la sección “Panel de control” que, además,  permite introducir todo tipo de datos relativos a los eventos (nombre, precio/s y tarifas, fechas, género, artistas que intervienen, formato, sinopsis...), fotografías y enlaces a vídeos, imágenes y redes sociales así como, si la hubiera.
c) A medida que los usuarios de outlet-rooms.com vayan reservando entradas, desde el Panel de Control el Promotor puede obtener información de las reservas (datos personales del usuario que efectúe la reserva, evento, localizador, butaca/s, fecha, forma de pago elegida...) y aprobar o denegar las mismas. 
d) Es importante ofrecer al público información acerca del recinto y de las obras o espectáculos por lo que, también desde el Panel de Control, el Promotor cuenta con secciones destinadas a tal efecto: dirección, formas y medios de contacto, descripción, condiciones de compra, imágenes, datos sobre las salas...).
e) Además, el Promotor, podrá establecer Condiciones Particulares para la venta o reserva de entradas para sus eventos o espectáculos.
f) Gestionar la venta de entradas o reservas a través de un TPV virtual de forma que el Promotor pueda cobrar y controlar las ventas de sus entradas a través de Internet de forma fácil y segura. 
g) outlet-rooms.com cuenta, además, con una herramienta que te permite ver la facturación de cada evento o espectáculo.
</p><p><b>3. Obligaciones del Promotor (desplegable)</b></p><p>3.1. Para contratarse con outlet-rooms.com, el Promotor debe registrarse en la Página a través de un formulario de contacto. outlet-rooms.com, verificará los datos y enviará un correo electrónico informando al Promotor de cómo completar el proceso de contratación.
3.2. Es requisito para poder Registrarse en outlet-rooms.com:
a) Estar autorizado para representar y comprometerse tanto sí mismo como a la sociedad a la que represente.
b) La exactitud y veracidad de todos los datos aportados.
c) Tener cocimiento de la finalidad y uso de la Página así como de la plataforma de control de reservas y control de información, (en adelante la Plataforma).
d) Tener capacidad legal y de obrar para obligarse según estas Condiciones. 
3.3. Aceptando estas Condiciones Generales de Contratación, reconoces que cumples las anteriores condiciones y que eres el único responsable de las consecuencias derivadas de no cumplirlas.
3.4. El Promotor se obliga a pagar a outlet-rooms.com las comisiones correspondientes por las labores de promoción e intermediación de la venta o reserva de entradas y por la utilización de la Plataforma.
3.5. El Promotor se compromete a ofrecer a outlet-rooms.com, a efecto de su uso en la Página, unas tarifas iguales o mejores a las que ofrezca directamente, o ponga a disposición de otros intermediarios o de cualquier tercero, incluidas empresas pertenecientes a su mismo grupo
3.6. El Promotor se obliga a incorporar a sus propios procedimientos de reserva y venta de entradas, la gestión de las entradas o reservas contratadas por los Usuarios de Internet a través de outlet-rooms.com.
3.7. Asimismo, el Promotor se obliga a prestar los servicios que le sean contratados por los Usuarios de Internet a través de outlet-rooms.com. En caso de que, por cualquier causa, no pueda cumplir con estas obligaciones, lo pondrá de inmediato en conocimiento de outlet-rooms.com, y realizará los esfuerzos que resulten razonables para procurar a los usuarios servicios alternativos, de calidad igual o superior a los reservados.
A todos los efectos, la recepción de la reserva por el Promotor vinculará a éste tanto en lo relativo a precios y condiciones como en el resto de condiciones legales o contractuales con el Comprador, no teniendo outlet-rooms.com ninguna responsabilidad.
3.8. En caso de cambios o cancelaciones en los eventos o espectáculos ofertados, el Promotor se obliga a comunicar a los Compradores estos cambios o cancelaciones. También podrá comunicarlos a outlet-rooms.com para que, como intermediario, realice la comunicación a los Compradores. No obstante, outlet-rooms.com, no será responsable de estos cambios o cancelaciones ni de los daños y perjuicios que se deriven de los mismos para el Promotor. 
3.9. El Promotor a los efectos de este Contrato, se compromete, además a:
a) No utilizar o intentar utilizar la cuenta de otro Establecimiento sin autorización.
b) Ser el único responsable de todas las actividades que se realicen desde tu cuenta de Establecimiento.
c) Velar para que tus datos de acceso sean confidenciales. Serás responsable de cualquier daño que sufras tú o terceros por incumplir estas Condiciones Generales de Contratación.
d) También eres responsable de lo que suceda en tu cuenta de Promotor de outlet-rooms.com mientras no la canceles o demuestres que la seguridad de la misma se ha visto comprometida por causas ajenas a ti. En especial deberás:
?   Mantener tu cuenta actualizada.
?   Mantener tu contraseña de forma confidencial.
?   Controlar quién utiliza la cuenta, conforme a la cláusula de confidencialidad.
?   No vender, comercializar o transferir tu cuenta a un tercero.
?   No utilizar las cuentas de terceros sin su consentimiento.
?   Facilitar datos reales mediante tu cuenta de Promotor en outlet-rooms.com. Eres el único responsable de hacerlo y eximes a outlet-rooms.com de cualquier responsabilidad derivada de  ello.   
e) En particular, sobre los contenidos que publiques y compartas, asumes y te obligas a:
?   Facilitar la información necesaria de manera exacta, completa y actualizada y, en especial, la relativa a disponibilidad, tarifas, ofertas y condiciones de reserva que sean publicadas en la Página.
?   No publicar contenido ilegal, inapropiado, inexacto, injurioso, discriminatorio u ofensivo. Por supuesto, no acosar, abusar o dañar a otra persona o Establecimiento a través de outlet-rooms.com.
?   No incluir ningún tipo de publicidad o realizar acciones de marketing directo a otros usuarios o terceros para cualquier fin.
?   Publicar contenidos adecuados y que no vulneren ningún tipo de cuestión contenida en estas Condiciones Generales de Contratación. En tal sentido asumes que outlet-rooms.com puede no controlar ni aprobar el contenido que publiques o proporciones a través de la Página y, en consecuencia, no se responsabiliza por la misma.
f) El Promotor será en todo caso responsable de lo que publique y comparta así como de las consecuencias que de ello se deriven. En especial, será responsable de las violaciones de derechos de propiedad intelectual o industrial que infrinja con ocasión de las funciones y servicios disponibles en su cuenta de Promotor en outlet-rooms.com. 
g) Toda vez que detectemos o seamos informados de cualquier hecho que pueda ser contrario a lo establecido en este apartado, nos facultará para bloquear el acceso a la Página o Plataforma y retirar contenidos de la cuenta de Promotor sin derecho a indemnización alguna.
h) El Establecimiento se abstendrá de remitir comunicaciones comerciales, por cualquier medio, a los clientes que reciba a través de outlet-rooms.com o de la Plataforma.
i) Permitir a outlet-rooms.com realizar campañas publicitarias u otras acciones promocionales en espacios diferentes de la Página para ofrecer mayor visibilidad a las ofertas y servicios de la Página. 
El coste de las acciones previstas en el párrafo anterior será, salvo acuerdo entre las Partes, por cuenta de outlet-rooms.com, excepto que el presente contrato sea resuelto por el Promotor o finalice por cualquier causa imputable a éste, dentro del período de desarrollo de una campaña publicitaria o acción promocional. En tal caso, el Promotor deberá abonar a outlet-rooms.com el coste íntegro de la referida campaña o acción.
</p><p><b>4. Obligaciones de outlet-rooms.com (desplegable)</b></p><p>outlet-rooms.com se obliga a:
a) outlet-rooms.com gestionará la información y promoverá, conforme a su leal saber y entender, los servicios del Promotor en la Página y, de esta forma, los Usuarios de la misma puedan contratar los servicios del Promotor.
b) Ofrecer los servicios de outlet-rooms.com descritos y velar porque los mismos sean duraderos en el tiempo, así como mejorarlos y expandirlos, de tal forma que el Promotor pueda acceder en cada momento, tal y como se muestre  la Página y la Plataforma y según su disponibilidad y limitaciones.
c) Ofrecer un sistema de TPV virtual (pasarela de pago) segura, habida cuenta el estado de la tecnología, aplicando los sistemas adecuados para la protección de la información de los Compradores.
d) Velar porque el sistema de contratación por el que los Usuarios de Internet pueden adquirir entradas o reservar entradas para eventos o espectáculos de los Pomotores se ajuste a la legalidad vigente.
e) Asimismo, se obliga a ofrecer al Usuario de Internet y Comprador, la información adecuada para la compra, entre ella, los precios y condiciones generales aplicables.
f) También se obliga a informar de aquellas Condiciones Particulares que el Promotor quiera aplicar a cada uno de sus eventos, etc. Para ello, outlet-rooms.com ha creado una herramienta en la Plataforma para que el Promotor pueda crear estas condiciones y puedan ser introducidas automáticamente en la Página.
</p><p><b>5. Condiciones económicas (desplegable)</b></p><p>outlet-rooms.com, por su labor de intermediación y promoción de la venta de entradas y reservas a través de la Página, así como por la puesta a disposición de la Plataforma a disposición del Promotor, percibirá como contraprestación una comisión variable según el evento a promocionar, la cual se estipula en el alta del evento.
En caso de no estipular una comisión determinada, se aplica una comisión por defecto del 10%. 

Los anteriores porcentajes se liquidarán mensualmente, para la determinación de los mismos, outlet-rooms.com utilizará los datos de reservas y compras efectuados a través de su Página y TPV virtual.
</p><p><b>6. Exclusión de responsabilidad (desplegable)</b></p><p>6.1. outlet-rooms.com no tiene más obligación que lo contenido en estas Condiciones Generales de Contratación. No obstante, pueden existir otras condiciones legales especiales, en cuyo caso, también sean de aplicación.
6.2. outlet-rooms.com no será en ningún caso responsables de cómo el Promotor utilice la Página ni la Plataforma, de cómo se relacione con los Compradores, ni de cualquier eventualidad que acontezca en los recintos o durante los espectáculos relacionada con los Compradores de las entradas a través de outlet-rooms.com.
6.3. El outlet-rooms.com, en lo referente a los servicios ofrecidos en la Página, se configura como un mero intermediador entre el Promotor que vende y reserva entradas para espectáculos y eventos y el usuario de Internet como Comprador o adquirente de las mismas. En tal sentido, no será responsable por la información facilitada por el Promotor, ni por las reclamaciones de ningún tipo efectuadas por los Compradores respecto a los bienes o servicios del Promotor adquiridos a través de la Página.
En tal sentido, la información que aparece en outlet-rooms.com es publicada por los Promotores, por lo que, conforme al artículo 16 de la Ley 34/2004, de 11 de julio, de servicios de la sociedad de la información y del comercio electrónico, outlet-rooms.com se configura a los efectos de prestar este servicio como un prestador de servicios de alojamiento o almacenamiento de datos. En consecuencia, no se hace responsable de la ilegalidad, falsedad o inexactitud de los contenidos publicados por sus Teatros dado que el servicio opera de forma automática. En particular, no se hace responsable por infracciones de derechos de propiedad intelectual, industrial o de imagen. Si crees que algún contenido no es conforme con la Ley o que existen errores, por favor comunícanoslo a info@outlet-rooms.com.
6.4. El Promotor asumirá cualquier reclamación que reciba el outlet-rooms.com, manteniéndole indemne de toda responsabilidad o gasto que se pudiere generar, por cualesquiera de las siguientes causas:
a. Las derivadas de cualquier inexactitud, error u omisión en relación con la información facilitada por el Promotor;
b. Las relacionadas con la propiedad intelectual o industrial de la información, documentación o contenidos literarios, gráficos, audiovisuales o de cualquier tipo facilitados por el Promotor para su incorporación a la Página;
c. Las ocasionadas con motivo de la carencia, por parte del Promotor, de los permisos, autorizaciones o licencias oficiales necesarios para el desarrollo de la actividad de alojamiento turístico.
d. Las relacionadas con la prestación de los servicios reservados por los usuarios o el incumplimiento de las condiciones contratadas con los mismos; o
e. Las ocasionadas por la cancelación unilateral de reservas por el Promotor.
6.5. outlet-rooms.com no será responsable de los actos u omisiones de los Usuarios que reserven los servicios de Promotor a través de la Página, incluyendo expresamente el denominado “no-show” y las cantidades debidas formal y definitivamente no pagadas por aquéllos.
6.6. El Promotor garantiza que desarrollará las obligaciones asumidas en las presentes Condiciones conforme a la buena fe y con lealtad para con outlet-rooms.com.
6.7. Las partes acuerdan que la responsabilidad que asume outlet-rooms.com frente al Promotor, derivada del presente contrato, en ningún caso incluye el lucro cesante y se limitará, en cualquier caso, como máximo y por cualquier concepto, al importe total percibido por outlet-rooms.com del Promotor en concepto de honorarios por la prestación de los servicios objeto del presente contrato.
6.8. outlet-rooms.com no garantiza la absoluta continuidad del servicio o la ausencia de virus informáticos en los servicios prestados a través de su red, que puedan producir alteraciones en los programas o documentos almacenados en sus sistemas de información, si bien llevará a cabo los mejores esfuerzos para evitar que se produzcan estas circunstancias. Dado que el servicio es gratuito, y outlet-rooms.com únicamente cobra comisiones por las efectivas ventas de reservas o entradas a través de la Página, no será responsable ni indemnizará al Promotor por la falta de servicio de la Página.
</p><p><b>7. Propiedad intelectual e industrial (desplegable</b></p><p>Los derechos de propiedad intelectual del contenido de las páginas web, su diseño gráfico y códigos son de outlet-rooms.com en exclusiva o cuenta con los oportunos derechos y/o autorizaciones para su publicación en la Página y, por tanto, queda prohibida su reproducción, distribución, comunicación pública, transformación o cualquier otra actividad que se pueda realizar con los contenidos de sus páginas web ni aún citando las fuentes, salvo consentimiento por escrito de outlet-rooms.com o del titular en exclusiva del derecho.
El Establecimiento, como titular de los derechos de propiedad intelectual o de una autorización bastante sobre la información, documentación o contenidos literarios, gráficos, audiovisuales o de cualquier tipo que proporcione a outlet-rooms.com para su publicación en la Página, concede a éste una licencia sobre los contenidos (i) de forma no exclusiva, pero con el carácter de transferible a terceros, (ii) por el tiempo de vigencia del presente contrato y (iii) sin límite territorial, y por tanto para todos los territorios del mundo. La licencia incluye la reproducción, distribución, comunicación pública y transformación de dichos contenidos, siempre que su uso esté relacionado con la actividad de intermediación y promoción de la venta de entradas y reservas para los espectáculos del Promotor, o con la promoción de la misma.
Todos los nombres comerciales, marcas o signos distintivos de cualquier clase contenidos en la Página y todas sus secciones son propiedad de sus dueños o titulares legítimos y están protegidos por ley.
El Promotor autoriza expresamente a outlet-rooms.com para que éste utilice las marcas y logos de aquél en la Página, si bien únicamente en relación con el objeto de las presentes Condiciones.
El Promotor autoriza expresamente a outlet-rooms.com a recabar, de su propio sitio web o de sitios web de terceros, aquellos datos que sean precisos para completar la información del Promotor en la Página, licenciándole en los términos previstos en el párrafo anterior.
El Promotor es responsable de la obtención de cualesquiera derechos o autorizaciones que fuesen necesarios, así como el cumplimiento de cualquier obligación, sobre los derechos de propiedad intelectual o industrial de terceros que pudieran afectar a la información que facilite a outlet-rooms.com para su incorporación a la Página, y sobre la que outlet-rooms.com no realizará ningún tipo de control previo. outlet-rooms.com no se hace responsable de las infracciones de propiedad intelectual e industrial derivadas de la actividad de sus Promotor conforme queda recogido en la cláusula 11. Si crees que tu derecho de propiedad intelectual o industrial ha sido infringido o que un contenido no es conforme con la Ley, por favor comunícanoslo a: info@outlet-rooms.com.
</p><p><b>8. Protección de datos (desplegable)</b></p><p>outlet-rooms.com será responsable del fichero, conforme a la Ley Orgánica de Protección de Datos (LOPD), respecto de aquella información personal que puedan recibir en virtud de las presentes Condiciones. En este sentido, cuando un usuario realice una reserva a través de la Página se le informará de que está facilitando sus datos a outlet-rooms.com, y que ésta se los comunicará al Promotor para la prestación del servicio o efectuar la compra.
outlet-rooms.com cederá los datos de cada reserva al Promotor para la única la finalidad de la gestión y prestación de los servicios reservados. En tal caso, el Promotor será a los efectos de la legislación de protección de datos responsable de los ficheros de datos personales de los compradores.
Ambas Partes se comprometen a observar estrictamente las obligaciones y deberes que les incumben con arreglo a lo estipulado en la presente cláusula, así como en la legislación vigente en materia de protección de datos, así como a comunicar y hacer cumplir estrictamente dichas obligaciones y deberes al personal a su servicio, reconociendo expresamente que los datos incorporados al fichero son o pueden ser de nivel básico.
</p><p><b>9. Miscelánea (desplegable)</b></p><p>9.1. Modificaciones
outlet-rooms.com se reserva el derecho de modificar, eliminar o alterar en cualquier momento los servicios ofrecidos a través de la la Página, sean propios o de terceros.
9.2. Cualquier incumplimiento de estas Condiciones por parte del Promotor, podría suponer para nosotros daños y perjuicios. De tal forma, si por incumplimientos del Promotor sufriéramos daños, perjuicios, cualquier tipo de pérdidas y costes (como pueden ser los honorarios de abogados y procuradores), aquél estará obligado a resarcirnos. 
Asimismo, si por los incumplimientos del Promotor se generaran cualquier tipo de reclamaciones o procedimientos contra nosotros, el Establecimiento dejará indemne a outlet-rooms.com, pudiendo reclamarle cualquier gasto, coste, daño o perjuicio derivado de sus acciones.
9.3. Las comunicaciones entre las Partes relativas al Contrato se realizarán por escrito, mediante cualquier medio que permita acreditar su recepción y contenido a las direcciones de correo electrónico comunicadas por cada una de las partes
9.4. Salvaguarda e interpretación de las Condiciones Generales
outlet-rooms.com y el Promotor son, en todo caso, partes contractuales independientes. En ningún caso el presente Contrato supone la creación de vínculo alguno entre las partes más que el derivado del estricto contenido del mismo, sin que en virtud de sus cláusulas se cree o se establezca relación alguna de agencia, laboral, de franquicia, Joint venture, sociedad o se confiera representación legal a una parte para actuar en nombre de la otra.
Las totalidad de las presentes Condiciones Generales de Contratación constituyen un acuerdo único entre el Promotor de outlet-rooms.com. Cualquier contrato posterior entre las Partes para idéntico objeto complementará las presentes Condiciones y, en caso de contradicción, se dará preferencia a aquél. 
Si cualquier disposición de las Condiciones fuera considerada ilegal, inválida o no ejecutable según la disposición de la Autoridad competente, la misma podrá ser modificada o interpretada de otra manera del modo en que pueda ser ejecutable y, al mismo tiempo, efectiva del modo más próximo posible a la intención original de la disposición.
Cualquier referencia realizada en las presentes Condiciones a un artículo o cuerpo normativo que resulte derogado se entenderá realizada a la disposición equivalente que lo sustituya.
La no exigencia del cumplimiento estricto de alguno de los términos de estas Condiciones, no supone ni puede interpretarse como una renuncia por nuestra parte a exigir su cumplimiento en sus estrictos términos en el futuro.
La declaración de nulidad de alguna o algunas de las cláusulas establecidas en las presentes Condiciones por la Autoridad competente no perjudicará la validez de las restantes. En este caso, las partes contratantes se comprometen a negociar una nueva cláusula en sustitución de la anulada con la mayor identidad posible con la misma. Si la sustitución deviniese imposible y la cláusula fuese esencial para las Condiciones, a juicio de la parte perjudicada por su eliminación, ésta podrá optar por la resolución del contrato.
9.5. Legislación y fuero
Las relaciones entre outlet-rooms.com con los usuarios Registrados de sus servicios telemáticos, presentes en la web, se encuentran sometidas a la legislación y jurisdicción españolas.
Como regla general, para la resolución de conflictos relativos a las Condiciones, outlet-rooms.com y el el usuario registrado, con renuncia expresa a cualquier otro fuero, se someten a la jurisdicción de los Juzgados y Tribunales de la residencia habitual del usuario. No obstante, en el caso de que éste tenga su domicilio fuera de España, outlet-rooms.com y el usuario registrado se someten, con renuncia expresa a cualquier otro fuero, a los juzgados y tribunales de Madrid.
En caso de que el contrato se haya celebrado entre outlet-rooms.com y una empresa o profesional, se someterán, con renuncia expresa a cualquier otro fuero, a la jurisdicción que corresponda conforme a la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico. 
</p><p><b>7. Salvaguarda e interpretación de las Condiciones</b></p><p>Las presentes Condiciones Generales de Uso y todas sus Condiciones Particulares de Registro constituyen un acuerdo único entre tú, como usuario, y nosotros como titulares de outlet-rooms.com.
Si cualquier disposición de las Condiciones fuera considerada ilegal, inválida o no ejecutable según la disposición de la Autoridad competente, la misma será modificada de modo que se pueda interpretar como ejecutable y efectiva del modo más próximo posible a la intención original de la disposición.
La no exigencia del cumplimiento estricto de alguno de los términos de estas Condiciones, no supone ni puede interpretarse como una renuncia por nuestra parte a exigir su cumplimiento en sus estrictos términos en el futuro.
La declaración de nulidad de alguna o algunas de las cláusulas establecidas en las presentes Condiciones Generales de Uso por la Autoridad competente no perjudicará la validez de las restantes.
</p>
    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{#cerrar#}</button>
            </div>
        </div>
    </div>
</div>

{/block}