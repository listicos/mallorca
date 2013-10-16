$(document).ready(function(){
    
    //$("#contenido-empresa").validationEngine(); 
    //$("#contenido-apartamento").validationEngine(); 
    //$("#contenido-apartamento").validationEngine();      
    $('#horaEntrada').timepicker({
        minuteStep: 5,
        template: 'modal',
        showMeridian: false
    });
    $('#horaSalida').timepicker({
        minuteStep: 5,
        template: 'modal',
        showMeridian: false
    });
    //$('#horadesde').timepicker();
    //$('#horahasta').timepicker();  
    
    $('.focus-time-e').click( function(){
        $('#horaEntrada').click();
    });
    
    $('.focus-time-s').click( function(){
        $('#horaSalida').click();       
    });    
    $("#geocomplete").geocomplete({
        map: ".map_canvas",
        details: ".formulario_localizacion ",
        markerOptions: {
            draggable: true
        }
    });

    $("#geocomplete").on("geocode:dragged", function(event, latLng) {
        $("input[name=lat]").val(latLng.lat());
        $("input[name=lon]").val(latLng.lng());
    });
    
    $("#buscar_direccion").click(function() {
        
        $('.localizacion_container').slideDown('fast', function() {
            var map = $("#geocomplete").geocomplete("map");

            google.maps.event.trigger(map, "resize");
            console.log()
            var lat_ = $("input[name=lat]").val()
            var lon_ = $("input[name=lon]").val()
            window.setTimeout(function() {
                map.setCenter(new google.maps.LatLng($("input[name=lat]").val(), $("input[name=lon]").val()));
                $("input[name=lat]").val(lat_)
                $("input[name=lon]").val(lon_)
            }, 20);
        });

        $("#geocomplete").trigger("geocode");

    });
    
    $('#accordion_panel_main').collapse({
        toggle: false,
        parent: true
    });
    
    //$('#menuControl a:last').tab('show');
    
    $('#menuControl a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    
    /*$("#attendance_chart").fullCalendar({
        theme: false,
        header: {
            left: 'prev title next',
            center: '',
            right: ''
        },
        firstDay: 1,
        useOutsetHeader: true,
        disableDragging: true
    });*/

    $('.add_impuesto').click(function(){
        var content = $('.impuesto_piece').html();
        $('.impuestos_list').prepend(content);
        deleteImpuesto();
        return false;
    });
    
    deleteImpuesto();
    
    $(".new-zone").click(function() {


        $("#impuestos_list").append($('.ul_child_impuesto').html());
        deleteNode();
        return false;
    });

    deleteNode();
    showNode();
    hideNode();     
    hideDetallesAloj();
    showDetallesAloj();    
    
    $("#new_compra").click(function(){
 
        //$("#content ul").append('<li><div class="control-group"><div class="span12"><div class="span6  text-left"><p class="F_size_13">Empresa 1</p></div><div class="span6 text-right"><a href="#datosEmpresaForm.php" class="btn  btn-round right"><i class="icon-cog"></i></a><a href="#" class="btn btn-setting btn-round right"><i class="icon-trash"></i></a><a href="#" class="btn btn-close btn-round right"><i class="icon-remove"></i></a></div></div></div></li>');
        $("#compras_list").append($('.ul_child_compra').html()); 
        deleteNode();
        showNode();
        hideNode();
        return false;        
    });

    $("#new_alojamiento").click(function() {
        $("#alojamiento_list").append($('.ul_child_alojamiento').html());
        deleteNode();
        hideDetallesAloj();
        showDetallesAloj();
        return false;
    });


    $('.save_changes').click(function() {
        hideNode();
        return false; 
    });


    $('.cf_bt').click(function() {
        showNode();
        return false; 
    });
    
   
    $('.save_aloj').click(function() {
        hideDetallesAloj();
        return false; 
    });    
    
    $('.cf_apart').click(function() {
        showDetallesAloj();
        return false; 
    });  
    
   
    
});
function deleteImpuesto(){
    $('.delete_impuesto').click(function(){
        $(this).parents('.impuesto_container').remove();
        return false;
    });
}
/*window.onload = function(){
    $("#attendance_chart").fullCalendar({
        theme: false,
        header: {
            left: 'prev title next',
            center: '',
            right: ''
        },
        firstDay: 1,
        useOutsetHeader: true,
        disableDragging: true
    });
};*/

function deleteNode() {
    $('.delete_node').click(function() {
        $(this).parents('li').remove();
        return false;
    });
}

function showNode() {
    $(".cf_bt").click(function() {
        $(this).parents('li').find('.config_cond_compra').slideDown(); 
        //$(this).parents('li').find('.config_cond_compra').show();        
        $(this).parents('li').find('.cond_compra').hide();   
        return false;  
    });
   
}

function hideNode() {
    $(".save_changes").click(function() {
        
        $(this).parents('li').find('.config_cond_compra').hide();
        $(this).parents('li').find('.cond_compra').slideDown();
        //$(this).parents('li').find('.cond_compra').show();        
      
        return false;
    });
    
}

function showDetallesAloj() {
    $(".cf_apart").click(function() {
        
        
        $(this).parents('li').find('.detalles-aloj').slideDown();       
        return false;  
    });
   
}

function hideDetallesAloj() {
    $(".save_aloj").click(function() {
        
        $(this).parents('li').find('.detalles-aloj').slideUp();
        return false;
    });
    
}

$('#element').popover('show');
