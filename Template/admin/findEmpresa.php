
<noscript>
<div class="alert alert-block span10">
    <h4 class="alert-heading">Warning!</h4>
    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
</div>
</noscript>

<div class="sidebar-nav-content">
    <div>
        <div class="box">
            <div class="box-header well">
                <h2><i class="icon-th"></i> Detalles del Propietario</h2>              
                <div class="box-icon">
                    <!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-down"></i></a>
                    <!--<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
                </div>
            </div>

            <div class="box-content">
                <div>
                    <form id="contenido-empresa">
                        <fieldset>
                            <legend class="legend_custom">Buscar o agregar propietario</legend>                                                     
                            <div class="row-fluid">

                                <div class="span8">
                                    <div class="control-group pleft">
                                        <div class="input-prepend span6 typeahead" title="Buscar Propietario" data-rel="tooltip">
                                           <span class="add-on"><i class="icon-download-alt"></i></span><input autofocus autocomplete="off" class="input-large span10" name="buscarEmpresa" id="typeahead" type="text" placeholder="Buscar empresa" data-provide="typeahead" data-items="4" data-source='["Hotel Meliá Cohiba","Hotel Fuerte Ventura Libre","Hotel Placeholder1","Hotel Placeholder2","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'/>
                                        </div> 
                                        <button class="btn mtop btn-primary noty show-info" id="boton_nuevaEmpresa" data-noty-options='{"text":"Por favor llena todos los campos","layout":"top","type":"information"}'> Agregar nueva</button>                                        
                                    </div>
                                </div>                         
                            </div>
                            <div class="save-message" style="display: none">
                                <button class="btn btn-primary noty notify-save" data-noty-options='{"text":"Se ha efectuado un respaldo automático de su información","layout":"top","type":"information"}'> Agregar Nueva</button>                                
                            </div>

                            <div class="searched-info hidden-obj">
                                <legend class="legend_custom">Responsable</legend>


                                <div class="row-fluid">
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="respondable_nombre" id="respondable_nombre" type="text" placeholder="Nombre" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div> 
                                    </div>
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Apellido paterno" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="respondable_apellidoP" id="respondable_apellidoP" type="text" placeholder="Apellido paterno" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div>                                     
                                    </div>
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Apellido materno" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="respondable_apellidoM" id="respondable_apellidoM" type="text" placeholder="Apellido materno" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div>                                     
                                    </div>  
                                </div>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Email" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-envelope"></i></span><input autofocus class="input-large span10 validate[required,custom[email]]" name="respondable_email" id="respondable_email" type="text" placeholder="Email" data-prompt-position="topLeft:2%"/>
                                            </div>                                        
                                        </div>                                     
                                    </div>                                       
                                </div>

                                <legend class="legend_custom">Datos generales</legend>
                                <div class="row-fluid">

                                    <div class="span4">
                                        <div class="control-group">                                   
                                            <div class="input-prepend center span12" title="Nombre fiscal(propietario)" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-briefcase"></i></span><input autofocus class="input-large span10 validate[required]" name="nfiscal" id="nfiscal" type="text" placeholder="Nombre fiscal(empresa)" data-prompt-position="topLeft:2%"/>
                                            </div>
                                        </div> 
                                        <div class="control-group">                                    
                                            <div class="input-prepend center span12" title="CIF" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-file"></i></span><input autofocus class="input-large span10 validate[required]" name="cif" id="cif" type="text" placeholder="CIF" data-prompt-position="topLeft:2%"/>
                                            </div> 
                                        </div>
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Nombre de la calle" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span10" name="nmbcalle" id="nmbcalle" type="text" placeholder="Nombre de la calle" />
                                            </div>
                                        </div>
                                        <div class="control-group"> 
                                            <div class="input-prepend center span12" title="Número de la calle" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span10" name="ncalle" id="ncalle" type="text" placeholder="Número" />
                                            </div>                                    
                                        </div>                                        
                                    </div>
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Provincia o estado" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-globe"></i></span><input autofocus class="input-large span10" name="provincia" id="provincia" type="text" placeholder="Provincia o estado" />
                                            </div>                                          
                                        </div>
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Código postal" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-envelope"></i></span><input autofocus class="input-large span10" name="cp" id="cp" type="text" placeholder="Código postal" />
                                            </div>                                            
                                        </div>   
                                        <div class="control-group">                                    
                                            <div class="input-prepend center span12" title="Número de cuenta IBAN" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-lock"></i></span><input autofocus class="input-large span10 validate[required]" name="cIBAN" id="cIBAN" type="text" placeholder="Número de cuenta IBAN" data-prompt-position="topLeft:2%"/>
                                            </div>                                         
                                        </div> 

                                    </div>
                                    <div class="span4 no_right_margin">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="País" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-globe"></i></span>
                                                <select class="input_large span10" name="pais" id="select_pais">
                                                    <option value="1" disabled selected>País</option>                                        
                                                    <option value="2">Mexico</option>
                                                    <option value="4">Russia</option>
                                                    <option value="5">Alemania</option>
                                                    <option value="6">Australia</option>
                                                    <option Selected value="7">Espana</option></select>                                    
                                            </div>                                          
                                        </div>
                                        <div class="control-group">                                    
                                            <div class="input-prepend center span12" title="Swift" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-file"></i></span><input autofocus class="input-large span10 validate[required]" name="swift" id="swift" type="text" placeholder="Swift" data-prompt-position="topLeft:2%"/>
                                            </div>                                        
                                        </div>

                                        <div class="control-group">                                    
                                            <div class="input-prepend center span12" title="Moneda base" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-globe"></i></span>
                                                <select class="input_large span10" name="moneda">
                                                    <option value="" disabled selected>Moneda Base</option>                                        
                                                    <option Selected>Euros</option>
                                                    <option>Dolares</option>
                                                    <option>Pesos Mexicanos</option>
                                                    <option>Yenes</option></select>                                    
                                            </div>                                                                               
                                        </div>                                          
                                    </div>

                                </div>           

                                <div class="hidden-obj">                                                                       
                                    <input name="funcion_go" id="funcion_go" value="placeholder" type="hidden"/>                                                                            
                                </div> 

                                <div class="control-group center">
                                    <!--<input class="submit btn  btn-primary" type="submit" value="Guardar">-->
                                    <button class="btn  btn-primary noty save_c" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                                    <button class="btn abort-act">Cancelar</button>                                                         
                                </div>                              
                            </div> 

                        </fieldset>
                    </form>                               
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>

</div>
