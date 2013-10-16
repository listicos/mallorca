var AJAX_MAIN = "<div class='ajax-container'><img src='"+BASE_URL+"/Template/imagen/ajax-loading.gif'/></div>";
$(document).ready(function(){
	$('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"top",delay: { show: 1, hide: 10 }});
	$('.raty').raty({
		score : 4,path:TEMPLATE_URL+'/imagen/'
	});

});