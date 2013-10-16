<noscript>
<div class="alert alert-block span10">
    <h4 class="alert-heading">Warning!</h4>
    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
</div>
</noscript>
<div class="sidebar-nav-content">
    <div class="box box_templete">
        <div class="box-header well">
            <h2><i class="icon-th"></i>Reservas</h2>              
        </div>
        <div class="box-content">
            <form id="">
                <fieldset>
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="control-group">
                                <div class="input-prepend center span12 typeahead" title="Buscar" data-rel="tooltip">
                                    <span class="add-on"><i class="icon-download-alt"></i></span><input autofocus autocomplete="off" class="input span10" name="buscarReserva" id="buscarEmpresa" type="text" placeholder="Buscar reserva" data-provide="typeahead" data-items="10" data-source='[]'/>
                                </div> 
                            </div>
                        </div>
                        <div class="span4">     
                            <div class="control-group">
                                <!--<button class="btn mtop btn-primary noty show-info" id="boton_nuevaEmpresa" data-noty-options='{"text":"Por favor llena todos los campos","layout":"top","type":"information"}'>Agregar</button>-->                                        
                                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Agregar</button>
                            </div>
                        </div>                         
                        <div class="span4">
                        </div>
                    </div>
                    <div class="save-message" style="display: none">
                        <button class="btn btn-primary noty notify-save" data-noty-options='{"text":"Se ha efectuado un respaldo automático de su información","layout":"top","type":"information"}'> Agregar Nueva</button>                                
                    </div>
                    <div id="demo" class="collapse out">
                        <legend class="legend_custom">Datos del titular</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="nombre" id="respondable_nombre" type="text" placeholder="Nombre" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Apellido paterno" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="apellidoPaterno" id="respondable_apellidoP" type="text" placeholder="Apellido paterno" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div>                                     
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Apellido materno" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="apellidoMaterno" id="respondable_apellidoM" type="text" placeholder="Apellido materno" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div>                                     
                            </div>  
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12">
                                        <span class="add-on"><i class="icon-globe"></i></span>
                                        <select class="input span10">
                                            <option value="" disabled selected>País de residencia</option>
                                            <option>España</option>
                                            <option>Italia</option>
                                            <option>Francia</option>
                                            <option>México</option>
                                        </select>
                                    </div>
                                <!--<span class="add-on"><i class="icon-"></i></span>-->
                                    <!-- <div class="input-prepend center span12" title="País de residencia" data-rel="tooltip">
                                         <span class="add-on"><i class="icon-home"></i></span><input autofocus class="input-large span10 validate[required,custom[email]]" name="buscarApartamento" id="respondable_email" type="text" placeholder="Pais de residencia" data-prompt-position="topLeft:2%"/>
                                     </div>-->                                        
                                </div>                                     
                            </div>                                       
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Teléfono" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-headphones"></i></span><input autofocus class="input-large span10 validate[required,custom[email]]" name="teléfono" id="respondable_email" type="text" placeholder="Teléfono" data-prompt-position="topLeft:2%"/>
                                    </div>                                        
                                </div>                                     
                            </div>     
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="e-mail" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-envelope"></i></span><input autofocus class="input-large span10 validate[required,custom[email]]" name="email" id="respondable_email" type="mail" placeholder="e-mail" data-prompt-position="topLeft:2%"/>
                                    </div>                                        
                                </div>                                     
                            </div>     
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Repetir e-mail" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-envelope"></i></span><input autofocus class="input-large span10 validate[required,custom[email]]" name="repetirEmail" id="respondable_email" type="email" placeholder="Repetir e-mail" data-prompt-position="topLeft:2%"/>
                                    </div>                                       
                                </div>                                     
                            </div>                                       
                            <div class="span4">
                                <div class="reserva_formulario_peticiones">
                                    <textarea rows="3" placeholder="Peticiones especiales" style="width: 300px"></textarea>                                        
                                </div>                                     
                            </div>     
                            <div class="span4">
                            </div>
                        </div>
                        <legend class="legend_custom">Datos de alojamiento</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-home"></i></span><input autofocus class="input-large span10 validate[required]" name="nombre" id="respondable_nombre" type="text" placeholder="Nombre" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Tipo de tarifa" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-tag"></i></span><input autofocus class="input-large span10 validate[required]" name="tipoTarifa" id="respondable_apellidoP" type="text" placeholder="Tipo de tarifa" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div>                                     
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12">
                                        <span class="add-on"><i class="icon-globe"></i></span>
                                        <select class="input span10">
                                            <option value="" disabled selected>Moneda</option>
                                            <option value="1">€ euro</option>
                                            <option value="2">$ dolar</option>
                                        </select>
                                    </div>
                                </div>                                 
                            </div>  
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Total reserva" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-list"></i></span><input autofocus class="input-large span10 validate[required]" name="totalReserva" id="respondable_apellidoM" type="text" placeholder="Total reserva" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div>   
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Anticipo" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-list"></i></span><input autofocus class="input-large span10 validate[required]" name="anticipo" id="respondable_nombre" type="text" placeholder="Anticipo,pagar ahora" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Liquidación" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-list"></i></span><input autofocus class="input-large span10 validate[required]" name="liquidacion" id="respondable_apellidoP" type="text" placeholder="Liquidación,al llegar al hotel" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div>                                     
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="entrada" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-calendar"></i></span><input autofocus class="input-large span10 validate[required]"  value="entrada" name="entrada" id="" type="date" placeholder="Entrada" data-prompt-position="topLeft:"/>
                                        </div>                                      
                                    </div>    
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="salida" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-calendar"></i></span><input autofocus class="input-large span10 validate[required]" name="salida" id="" type="date" placeholder="Salida" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div>                                     
                                </div>      
                                <div class="row-fluid">
                                    <div class="span4">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <div class="span7">    
                                                    <div class="control-group reserva_formulario_dias">
                                                        <div class="input-prepend center span12">
                                                            <span class="add-on"><i class="icon-globe"></i></span>
                                                            <select class="input span9">
                                                                <option value="" disabled selected>Dias</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="span5">
                                                    <div class="control-group reserva_formulario_noches">
                                                        <div class="input-prepend  span12">
                                                            <span class="add-on"><i class="icon-globe"></i></span>
                                                            <select class="input span9">
                                                                <option value="" disabled selected>Noches</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Huéspedes" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <select class="input span10">
                                            <option value="" disabled selected>Huéspedes</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>         
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Tipo de habitación" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-globe"></i></span>
                                        <select class="input span10">
                                            <option value="" disabled selected>Tipo de habitación</option>
                                            <option>1</option>
                                            <option>1</option>
                                            <option>1</option>
                                        </select>
                                    </div>
                                </div>         
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Servicio" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-briefcase"></i></span>
                                        <select class="input span10">
                                            <option value="" disabled selected>Servicio</option>
                                            <option>1</option>
                                            <option>1</option>
                                            <option>1</option>
                                        </select>
                                    </div>
                                </div>         
                            </div>
                            <div class="span4">
                            </div>                                     
                        </div> 
                        <legend class="legend_custom">Total a pagar</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="nombre" id="respondable_nombre" type="text" placeholder="Nombre del Titular" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Apellido paterno" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="apellidoPaterno" id="respondable_apellidoP" type="text" placeholder="Apellido paterno" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div>                                     
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Apellido materno" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="apellidoMaterno" id="respondable_apellidoM" type="text" placeholder="Apellido materno" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div>                                     
                            </div>  
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Total a pagar" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-list"></i></span><input autofocus class="input-large span10 validate[required]" name="totalReserva" id="respondable_apellidoM" type="text" placeholder="Total a pagar" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div>   
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" name="tarjeta" title="Tarjeta" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-globe"></i></span>
                                        <select class="input span10">
                                            <option value="" disabled selected>Tarjeta</option>
                                            <option>Visa crédito - 2,00€</option>
                                            <option>Visa débito - 00,50€</option>
                                            <option>Master Card - 5,00€</option>
                                            <option>American Express - 12,00€</option>
                                        </select>
                                    </div>
                                </div>                                 
                            </div>  
                            <div class="span4">
                                <div class="control-group center">
                                    <span class="help-inline">Número</span><input  class="reserva_numero_tarjeta" type="text" maxlength="4">
                                    <span class="help-inline">-</span><input class="reserva_numero_tarjeta" type="text" maxlength="4">
                                    <span class="help-inline">-</span><input class="reserva_numero_tarjeta" type="text" maxlength="4">
                                    <span class="help-inline">-</span><input class="reserva_numero_tarjeta" type="text" maxlength="4">
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2 offset2">
                                <div class="control-group center">
                                    <span class="help-inline">(CVC/CVV)</span><input  class="reserva_numero_tarjeta" type="text" maxlength="4">
                                </div>  
                            </div>
                            <div class="span7">
                                <div class="control-group">
                                    <div class="input-prepend span5">
                                        <span class="help-inline">Vigencia &nbsp;&nbsp</span><span class="add-on"><i class="icon-globe"></i></span>
                                        <select class="input span5">
                                            <option value="" disabled selected>mes</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="control-group">
                                    <div class="input-prepend span5">
                                        <span class="add-on"><i class="icon-globe"></i></span>
                                        <select class="input span5">
                                            <option value="" disabled selected>año</option>
                                            <option>2013</option>
                                            <option>2014</option>
                                            <option>2015</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                            </div>
                        </div>
                        <div class="control-group offset4">
                            <button class="btn  btn-primary noty save_c" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                            <button class="btn abort-act">Cancelar</button>                                 
                        </div>                              
                    </div> 
                </fieldset>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>

    
    