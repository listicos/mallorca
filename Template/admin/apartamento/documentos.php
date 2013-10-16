<?php 

$apartamentoId = $this->getAttribute('apartamentoId');

$documentos = $this->getAttribute('documentos');

$edit = true;

?>

<form id="gestion_documentos_form" enctype="multipart/form-data" >
                        <legend class="legend_custom titulos_legend">Documentos</legend>
                        <input type="hidden" name="action" value="uploadDocumentos">
                        <input type="hidden" name="apartamentoId" value="<?php echo $apartamentoId; ?>">
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
