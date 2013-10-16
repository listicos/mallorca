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
<div class="sidebar-nav-content">
    <div class="box box_templete">
        <div class="box-header well">
            <h2><i class="icon-th"></i>Datos del apartamento</h2>              
        </div>
        <div class="box-content">
            <form id="contenido-apartamento-editar">
                <fieldset>
                    
                </fieldset>
            </form>
        </div>
    </div>
</div>