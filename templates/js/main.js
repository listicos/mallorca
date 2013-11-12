$(document).ready(function() {
    $('#blocker').fadeOut('slow');
    $(document).ajaxStart(function(){ 
        $('#blocker').fadeIn(); 
    }).ajaxStop(function(){
        $('#blocker').fadeOut('slow'); 
    });
    $('.to_scroll_top').click(function() {
        $("html, body").animate({scrollTop: $("body").offset().top - 57}, 400);
        return false;
    });
    
});