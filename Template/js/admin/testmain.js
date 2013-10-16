   
$(document).ready(function(){

    $('.add_contrato').click(function() {
        $('.contrato_list').slideDown();
        $(this).attr("disabled", "disabled");
        $('.delete_contrato').removeAttr("disabled"); 
    });
    
    $('.delete_contrato').click(function() {
        $('.contrato_list').slideUp();
        $(this).attr("disabled","disabled");
        $('.add_contrato').removeAttr("disabled");     
    });
    
    $('#buscarEmpresa').change(function(e){
        Smessage();
        //$('.searched-info').slideDown();
    });  
    
    $('#paypalcheck').click(function(e){
    
        if ($('#paypalcheck').attr("checked")){
            $('.ppal').fadeIn();
        }
        else {
            $('.ppal').fadeOut(); 
        };
    });    
  
    $('#new_producto').click(function(e){
        $('.Nproducto').slideDown();        
    });
    
    /*$('.save_c').click(function(e) {
        var test;
        test = $("#contenido-empresa").validationEngine('validate');
        //alert($("#contenido-empresa").validationEngine('validate'));

        $('.show-info').removeAttr("disabled");
        return false;
    });*/
    
    $('.show-info').click(function(e){
        e.preventDefault();
        //$('.show-info').attr("disabled", "disabled");
        //Smessage();
        $('.searched-info').toggle('fast');
        $('#username').val("");
        $('#apellidos').val("");
        $('#email').val("");
        $('#nfiscal').val("");
        $('#cif').val("");
        $('#nmbcalle').val("");
        $('#ncalle').val("");
        $('#provincia').val("");  
        $('#cp').val("");  
        $('#cIBAN').val("");  
        $('#Swift').val(""); 
        
        return false;
    });
    
    
    $('.abort-act').click(function(e){
        $(this).parents('.btn-minimize').click();
        $('.searched-info').slideUp();
        $('.show-info').removeAttr("disabled");        
        return false;
    });


    $('#typeahead1').change(function(e){
        var randomnumber=Math.floor(Math.random()*1000000000);        
        $('.searched-edi').slideDown(); 
        $('#idEdificio').val(randomnumber);
        $('#nombre-ap').val("Apartamentos SunRise");
        $('#tipo-ap').val("información de prueba");
        $('#playa-ap').val("Playa de prueba"); 
        $('#dist-playa-ap').val("45");   
        $('#aeropuerto-ap').val("Aeropuerto de prueba"); 
        $('#dist-aeropuerto-ap').val("45");
        $('#centro-ap').val("Centro de prueba"); 
        $('#dist-centro-ap').val("45");   
        $('#trans-ap').val("Transporte de prueba"); 
        $('#dist-trans-ap').val("45"); 
        $('#desc-pub').val("Esta es una descripción de prueba ...");        
 
        
    });
    
    $('.show-edi').click(function(e){
        var randomnumber=Math.floor(Math.random()*1000000000);        
        $('.show-edi').attr("disabled", "disabled");
        Smessage();
        $('.searched-edi').slideDown();
        $('#idEdificio').val(randomnumber);
        
    });    
    
    
    /*$('.save_edi').click(function(e) {
        var valor_bol;        
        valor_bol = $("#contenido-apartamento").validationEngine('validate');
        //alert(valor_bol);
        if (valor_bol) {
            $('.searched-edi').slideUp();
        }
        ;
        $('.show-edi').removeAttr("disabled");
        return false;
    });*/
    
    
    $('.abort-edi').click(function(e){
        $(this).parents('.btn-minimize').click();
        $('.searched-edi').slideUp();
        $('.show-edi').removeAttr("disabled");        
        return false;
    });
    
    $('#checkboxHentrada').click(function(e) {

        if ($('#checkboxHentrada').attr("checked")) {
            $('.horario-entrada').fadeIn();
        }
        else {
            $('.horario-entrada').fadeOut();
        }
    ;
    });  
    
    $('#checkboxHsalida').click(function(e) {

        if ($('#checkboxHsalida').attr("checked")) {
            $('.horario-salida').fadeIn();
        }
        else {
            $('.horario-salida').fadeOut();
        }
    ;
    });      
    
    $('#guardar_direccion').click(function(){
        $('.localizacion_container').slideUp();
       
    });
  
/*$('.babiescheck').click(function(e) {

        if ($('.babiescheck').attr("checked")) {
            $('.kids-num').fadeIn();
        }
        else {
            $('.kids-num').fadeOut();
        }
        ;
    });  */  


    
});

function Smessage() {
/*setInterval(function() {
        $('.notify-save').click();
    }, 45000);*/
}

