<?php $fotos = $this->getAttribute('fotos'); ?>

<?php foreach ($fotos as $foto) { ?>
    <div class="dz-preview dz-processing dz-image-preview dz-success">
        <div class="dz-details">
            <div class="dz-filename"><span data-dz-name><?php echo $foto['foto']->nombre; ?></span></div>
            <div class="dz-size" data-dz-size><strong><?php echo $foto['foto']->size; ?></strong> MB</div>
            <img data-dz-thumbnail alt="<?php echo $foto['foto']->nombre; ?>" src="<?php echo $this->template_url.$foto['foto']->ruta; ?>"/>
        </div>
        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress style="width: 100%;"></span></div>
        <div class="dz-success-mark"><span></span></div>
        <div class="dz-error-mark"><span></span></div>
        <div class="dz-error-message"><span data-dz-errormessage></span></div>
        <a href="#" class="dz-remove delete_foto" data-deptoadj="<?php echo $foto['apartamentoAdjunto']; ?>" data-ruta="<?php echo $foto['foto']->ruta; ?>">Borrar foto</a>
    </div>
<?php
}?>