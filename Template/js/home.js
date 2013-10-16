$(document).ready(function(){
	 $('#layerslider').layerSlider({
        skinsPath : TEMPLATE_URL+'/css/layerslider/skins/',
        skin : 'lightskin',
        thumbnailNavigation : 'hover'
    });
      

	$('.submitFormBuscarDisponibilidadTarifas').click(function(){
		$('.formBuscarDisponibilidadTarifas').submit();
		return false;
	});
});