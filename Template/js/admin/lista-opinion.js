var LAST_LOAD_OPIN = 20;
var IS_GETTING_OPIN = false;

$(document).ready(function(){

    getOpinionesByArgs();
    
    $('.selectpicker').selectpicker();
    
    $('#ordena_opiniones, #ordena_tipo').change(function(){
        getOpinionesByArgs();
    });
    
    $('#opinionesListForm').submit(function(ev){
        ev.preventDefault();
        getOpinionesByArgs();
        return false;
    });
    
    $(document).scroll(function(e) {
            
        if(IS_GETTING_OPIN)
            return false;
        
        if(!IS_GETTING_OPIN){
            if ($(window).scrollTop() >= ($(document).height() - $(window).height()) * 0.9) {
                LAST_LOAD_OPIN = LAST_LOAD_OPIN + 5;
                $('#limitSearch').val(LAST_LOAD_OPIN);
                IS_GETTING_OPIN = true;
                getOpinionesByPagination();
            }
        }
    });
    
    $('#btn_eliminar_opinion').click(function(){
        var opinionId = $('#opinionId').val();
        $.ajax({
           url: BASE_URL + '/admin-ajax-opinion-filtros',
           type: 'post',
           dataType: 'json',
           data: {action:'deleteOpinion', opinionId: opinionId},
           success : function(response) {
               if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getOpinionesByArgs();
               }
           }
        });
    });

});

function getOpinionesByPagination(){
    $('#opiniones_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-opinion-filtros',
        type: 'POST',
        data: $('#opinionesListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#opiniones_table_list').find('tbody').html(response.html);
                $('#opiniones_table_list a.borrarOpinion').click(function(e){
                   var opinion = $(this).attr('opinion-id');
                   $('#opinionId').val(opinion);
                });
                enviarCorreoFromOpinion();
            }
            IS_GETTING_OPIN = false;
        }
    });
}

function getOpinionesByArgs(){
    LAST_LOAD_OPIN = 20;
    $('#limitSearch').val(LAST_LOAD_OPIN);
    $('#opiniones_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-opinion-filtros',
        type: 'POST',
        data: $('#opinionesListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#opiniones_table_list').find('tbody').html(response.html);
                $('#opiniones_table_list a.borrarOpinion').click(function(e){
                   var opinion = $(this).attr('opinion-id');
                   $('#opinionId').val(opinion);
                });
                enviarCorreoFromOpinion();
            }
            IS_GETTING_OPIN = false;
        }
    });
}

function enviarCorreoFromOpinion(){
    $('.openModalCorreoOpinion').click(function(){
        var idOpinion = $(this).attr('opinion-id');
        $('#correo_opinion_overlay').find('.modal-body').html(AJAX_MAIN);
        $.ajax({
            dataType: 'json',
            url: BASE_URL + '/admin-ajax-opinion-email',
            type: 'POST',
            data: {
                idOpinion: idOpinion,
                action: 'getEmailToOverlay'
            },
            success: function(response){
                if(response.msg == 'ok'){
                    $('#correo_opinion_overlay').find('.modal-body').html(response.html);
                    sendEmailOpinion();
                }
            }
        });
    });
}
function sendEmailOpinion() {
    console.log('view send ...')
    $('#correo_opinion_form').submit(function(ev){
        ev.preventDefault();
        console.log(EMAIL_EDITOR.getData())
        
        $.ajax({
            dataType: 'json',
            url: BASE_URL + '/admin-ajax-opinion-email',
            type: 'POST',
            data: {
                from: $(this).find('#from').val(),
                to: $(this).find('#to').val(),
                subject: $(this).find('#subject').val(),
                body: EMAIL_EDITOR.getData(),
                action: 'sendEmailFromOverlay'
            },
            success: function(response){
                if(response.msg == 'ok'){
                    noty({
                       type: 'success',
                       text: response.data,
                       layout: 'top'
                    });
                }
                else {
                    noty({
                       type: 'error',
                       text: response.data,
                       layout: 'top'
                    });
                }
                $('#cerrarCorreoOpinion').click();
            }
        });
        return false;
    });
}