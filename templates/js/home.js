var map;

//var myLatlng = new google.maps.LatLng("40.4216737855101","-3.7001175433777");
var marcadores = [];
var MOVING_MAP = false;
function initialize() {
    var mapOptions = {
        zoom: 15,
        'scrollwheel': false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('details-map-location'), mapOptions);

    google.maps.event.addListener(map, 'dragend', function() {

        filtrarPorMapa();

    });
    google.maps.event.addListenerOnce(map, 'idle', function(){
        MOVING_MAP = true;
    });
    
    google.maps.event.addListener(map, 'zoom_changed', function() {
        if(MOVING_MAP) {
            filtrarPorMapa();
            MOVING_MAP = false;
        }

    });
    
}
function initCarousel(){
    $('.carousel').carousel({
        interval: false
    });

    $('.carousel').one('slid', function (e) {
        var active = $(this).find('.item.active');
        var idx = active.index();
        var _this = this;
        
        $(this).find('.item').each(function(){
            var that = this;
            $(this).html("<div class='loading_ajax'><img src='"+BASE_URL+'/templates/img/loader.gif'+"' /></div>");
            var url = $(this).data('urls');
            $('<img src="'+ url +'">').load(function() {
              $(that).html($(this));
            });
        });
        $(_this).carousel(idx);
    });
}
$(document).ready(function() {

    $('.selectpicker').selectpicker();
    initCarousel();
    
    ordenar();

    actualizarMapa();
    calendarios();
    ENABLE_DATES = [];
    /*for(i = 0; i < disponibles.length; i++) {
        ENABLE_DATES.push(new Date(disponibles[i]).getTime());
    }*/
    $('.date-start').datepicker({
        autoclose: true,
        //enableDates: ENABLE_DATES,
        format: "dd-mm-yyyy",
        startDate: new Date(new Date().setDate(new Date().getDate() - 1))
    }).on('changeDate', function(ev) {
        $('.date-end').datepicker('setStartDate', ev.date);
    });

    //$('.date-start').datepicker('setStartDate', new Date());

    $('.date-end').datepicker({
        autoclose: true,
        //enableDates: ENABLE_DATES,
        format: "dd-mm-yyyy",
        startDate: new Date()
    }).on('changeDate', function(ev) {
        $('.date-start').datepicker('setEndDate', ev.date);
    });

    filtrar();
    
    pagination();
    
    masFiltros();
    
    mostrarComplejo();

    followme();


    
});
function ordenar() {
    /*$('#resultados').mixitup();
    
    $('#sorter').on('change', function(){
        filter = eval($(this).val());
        console.log(filter);
        $('#resultados').mixitup('sort',filter);
    })
    
    filter = eval($('#sorter').val());   
    $('#resultados').mixitup('sort', 'data-price');
    $('#resultados').mixitup('sort',filter);*/
}

var infowindow;

function actualizarMapa() {

    //var myLatlng;

    if (!map) {
        initialize();
        google.maps.event.trigger(map, 'resize');
        infowindow = new google.maps.InfoWindow({
                            content: ''
                    });
        
    } else {
        
        for (i = 0; i < marcadores.length; i++) {
            
            if (marcadores[i])
                marcadores[i].setMap(null);
        }
        marcadores = [];
    }

    var latlngbounds = new google.maps.LatLngBounds();
    $('.result-list-container .result-item:not(:hidden)').each(function() {
        var nombre = $(this).find('input[name=nombre]').val();
        var lat = $(this).find('input[name=lat]').val();
        var lon = $(this).find('input[name=lon]').val();
        var type = $(this).find('input[name=type]').val();
        var icon = '/templates/img/map_icons/house.png';
        var idApto = $(this).parent().attr('data-id');
        if(type=='complejo'){
            icon = '/templates/img/map_icons/condominium.png';
        }

        var parliament = new google.maps.LatLng(lat, lon);
        latlngbounds.extend(parliament);
        var marker = new google.maps.Marker({
            title: nombre,
            position: parliament,
            map: map,
            icon: BASE_URL + icon,
            idApto: idApto 
        });

        marcadores.push(marker);
        google.maps.event.addListener(marker, 'click', function() {
                idApto = marker.idApto;
                $.ajax({
                    url: BASE_URL + '/ajax-apartamento',
                    data: {action:'informacionMapa', id:idApto},
                    type: 'post',
                    dataType: 'json',
                    success: function(resp) {
                        if(resp.msg == 'ok') {
                            infowindow.setContent(resp.html);
                            infowindow.open(map, marker);
                        }
                    }
                });
                
        });

    });

    map.setCenter(latlngbounds.getCenter());
    map.fitBounds(latlngbounds);
    if(map.getZoom() > 9) {
        map.setZoom(9);
    }
}

function toTop(){
     $('html, body').animate({
        scrollTop: $(".house_side").offset().top-2
    }, 400);
}

 function filtrarPorMapa() {
    toTop();
    bounds = map.getBounds();
    var form = $('#filtrosFrm').serialize();
    form += ("&order=" + $('select[name=order]').val());
    form += ("&bounds[]=" + bounds.getNorthEast().lat() + "&bounds[]=" + bounds.getNorthEast().lng());
    form += ("&bounds[]=" + bounds.getSouthWest().lat() + "&bounds[]=" + bounds.getSouthWest().lng());
    $('#resultados').fadeOut();
    $('#loading-filters').fadeIn();
    $.ajax({
        url: BASE_URL + '/ajax-filtros',
        data: form,
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#resultados').html(response.html);
            
            $('#loading-filters').fadeOut();
            $('#resultados').fadeIn();
            
             initCarousel();

             actualizarFiltros(response);
             calendarios();
             MOVING_MAP = true;
             
             if($('#resultados .result-item').length == 0) {
                 $('select[name=order]').addClass('hidden');
             } else {
                 $('select[name=order]').removeClass('hidden');
             }

        }
    });
 
 
 }

function filtrar() {
    
    $('.checkbox-inline span').click(function(e){
        e.preventDefault();
        $(this).parent().find('input').click();
    })
    
    $('#filtrosFrm input, #filtrosFrm select, select[name=order]').off('change').on('change', function(e) {
        toTop();
        e.preventDefault();
        
        var valid = $(this).attr('name') != 'dateStart' && $(this).attr('name') != 'dateEnd';
        if(!valid) {
            valid = ($('#llegada').val() == $('#salida').val() || ($('#llegada').val() && $('#salida').val() && $('#llegada').val() != "" && $('#salida').val() != ""));
        }
        if (valid) {
            var form = $('#filtrosFrm').serialize();
            form += ("&order=" + $('select[name=order]').val());
            $('#resultados').fadeOut();
            $('#loading-filters').fadeIn();
            $.ajax({
                url: BASE_URL + '/ajax-filtros',
                data: form,
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    
                    $('#resultados').html(response.html);
                    
                    actualizarFiltros(response);
                    
                    $('#loading-filters').fadeOut();
                    $('#resultados').fadeIn();
                    
                     initCarousel();
                     MOVING_MAP = false;
                     mostrarComplejo();
                     actualizarMapa();

                    calendarios();
                    MOVING_MAP = true;
                    
                    if($('#resultados .result-item').length == 0) {
                        $('select[name=order]').addClass('hidden');
                    } else {
                        $('select[name=order]').removeClass('hidden');
                    }
                }
            });
        }
    });
}


function carruselVisitados() {
    /*$('#visitados').movingBoxes({
        startPanel: 2,
        panelWidth: .45,
        buildNav: false
    });*/
}

function calendarios() {
    $('a.ver-disponibilidad').off('click').on('click', function(e){
        $('#calendario_modal').modal();
        e.preventDefault();
        $('#calendarioDisponibilidad').fullCalendar( 'destroy');
        //Load calendar pro
        
            $('#calendarioDisponibilidad').fullCalendar({
            header: {
                left: 'title',
                right: 'prev,next,month'
            },
            firstDay: 1,
            slotMinutes: 15,
            editable: false,
            droppable: false,

            events: {
                dataType: "json",
                 url: BASE_URL + "/ajax-calendario",
                 type: "POST",
                 cache: true,
                 data: {
                     idApartamento: $(this).attr('apartamento-id'),
                     action: 'getTarifas'
                 },
                 beforeSend: function(){
                    
                },
                complete: function(){
                  
                }
            }
        });

        setTimeout(function(){
            $('#calendarioDisponibilidad').fullCalendar('render');    
        },800);
        
        /*$('#blocker').show();
        $.ajax({
            dataType: "json",
             url: BASE_URL + "/ajax-calendario",
             type: "POST",
             data: {
                 idApartamento: $(this).attr('apartamento-id'),
                 action: 'getTarifas'
             },
             success: function(response) {
                $('#blocker').fadeOut('slow');
                 if(response.msg == 'ok'){
                     
                     var _tarifas = response.tarifas
                     if(_tarifas.length > 0){
                         var tarifas_array = [];
                         for(var i=0;i < _tarifas.length;i++){
                             var tarifa_temp;
                             var price = _tarifas[i].precio ? _tarifas[i].precio+"€" : " 0,00€";

                             if(_tarifas[i].estatus == 'disponible')
                                 tarifa_temp = {'title': price, 'start': _tarifas[i].fechaInicio, 'end': _tarifas[i].fechaFinal, 'backgroundColor': App.getLayoutColorCode('green')};
                             else
                                 tarifa_temp = {'title': price, 'start': _tarifas[i].fechaInicio, 'end': _tarifas[i].fechaFinal, 'backgroundColor': App.getLayoutColorCode('red')};

                             tarifas_array.push(tarifa_temp)
                         }
                         setTarifasToCalendar(tarifas_array);
                     }else{
                         setTarifasToCalendar();
                     }
                 }else{
                     setTarifasToCalendar();
                 }
             }
         });
*/

    });   
    
}

function setTarifasToCalendar(tarifas){
    
    h = {
        left: 'title',
        center: '',
        right: 'prev,next,month'
    }
    $('#calendarioDisponibilidad').removeClass("mobile");
    $('#calendarioDisponibilidad').fullCalendar('destroy');
    if(tarifas){
        
        $('#calendarioDisponibilidad').fullCalendar({
            header: h,
            firstDay: 1,
            slotMinutes: 15,
            editable: false,
            droppable: false,
            events: tarifas
        });
    }else{
        
        $('#calendarioDisponibilidad').fullCalendar({
            header: h,
            slotMinutes: 15,
            editable: false,
            droppable: false,
            events: []
        });
    }
    
    
}

var IS_GETTING_EMP = false;
function pagination() {
    $(document).scroll(function(e) {
            
        if(IS_GETTING_EMP)
            return false;
        
        if(!IS_GETTING_EMP){
            if ($('.result-item').length > 0 && $('.result-item').length % 10 == 0 && $(window).scrollTop() > $('.result-item').last().offset().top) {
                
                IS_GETTING_EMP = true;
                
                var form = $('#filtrosFrm').serialize();
                form += ("&order=" + $('select[name=order]').val());
                form += ("&start=" + $('.result-item').length);
                $('#loading-filters').fadeIn();
                $.ajax({
                    url: BASE_URL + '/ajax-filtros',
                    data: form,
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        $('#resultados').append(response.html);
                        
                        $('#loading-filters').fadeOut();
                        
                        initCarousel();
                        MOVING_MAP = false;
                        mostrarComplejo();
                         actualizarMapa();

                        calendarios();
                        MOVING_MAP = true;
                        IS_GETTING_EMP = false;

                    }
                });
                
            }
        }
    });
}

function masFiltros() {
    $('#moreFiltersBtn').off('click').on('click', function(e){
        e.preventDefault();
        
        $('input[name=instalaciones]').prop('checked', false);
        $('#filtrosServicios input[name="instalaciones[]"]:checked').each(function(){
            $('input[name=instalaciones][value="' + $(this).val() + '"]').prop('checked', true);
        })
        $('#servicios_modal').modal();
    })
    
    $('#filtrarServiciosBtn').off('click').on('click', function(){
        if($('input[name=instalaciones]:checked').length == 0) {
            $('#servicios_modal').modal('toggle');
            return false;
        }
        
        masFiltrosMarcados = $('input[name=instalaciones]:checked');
        filtrosMarcados = $('#filtrosServicios input[name="instalaciones[]"]:checked');
        
        esta = true;
        if(masFiltrosMarcados.length == filtrosMarcados.length) {
            esta = false;
            for (i=0;i<masFiltrosMarcados.length; i++) {
                esta = false;
                for(j=0;j<filtrosMarcados.length;j++) {
                    if($(masFiltrosMarcados[i]).val() == $(filtrosMarcados[j]).val()){
                        esta = true;
                        break;
                    } 
                }
                if(!esta) {
                    break;
                }
            }
            
            if(esta) {
                $('#servicios_modal').modal('toggle');
                return false;
            }
        }
        
        btn = $('#filtrosServicios .more-checkbox').clone();
        $('#filtrosServicios').html('');
        $('input[name=instalaciones]:checked').each(function(){
            input = $(this).parent().clone();
            input.find('input').attr('name', "instalaciones[]");
            input.find('input').prop('checked', true);
            
            $('#filtrosServicios').append(input);
        })
        $('#filtrosServicios').append(btn);
        $('#servicios_modal').modal('toggle');
        filtrar();
        masFiltros();
        
        var form = $('#filtrosFrm').serialize();
        form += ("&order=" + $('select[name=order]').val());
        $.ajax({
            url: BASE_URL + '/ajax-filtros',
            data: form,
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $('#resultados').html(response.html);
                initCarousel();
                 actualizarFiltros(response);
                 mostrarComplejo();
                 actualizarMapa();

                calendarios();
                
                if($('#resultados .result-item').length == 0) {
                    $('select[name=order]').addClass('hidden');
                } else {
                    $('select[name=order]').removeClass('hidden');
                }

            }
        });
    })
}

function actualizarFiltros(response) {
    instalaciones = response.filtrosInstalaciones;
    var array_instalaciones = [];
    for(var i in instalaciones) {
        var instalacion = instalaciones[i];
        $('input[name^="instalaciones"][value=' + instalacion.idInstalacion + ']').parent().show().find('strong').html(' (' + instalacion.apartamentos + ')');
        array_instalaciones.push(instalacion.idInstalacion);
    }
    $('input[name^="instalaciones"]').each(function(){
        if(-1 == $.inArray($(this).val(), array_instalaciones)) {
            $(this).parent().hide();
        }
    })
    
    tipos = response.filtrosApartamentosTipos;
    var array_tipos = [];
    for(var t in tipos) {
        var tipo = tipos[t];
        $('input[name="tiposApartamento[]"][value=' + tipo.idApartamentosTipo + ']').parent().show().find('strong').html(' (' + tipo.apartamentos + ')');
        array_tipos.push(tipo.idApartamentosTipo);
    }
    $('input[name="tiposApartamento[]"]').each(function(){
        if(-1 == $.inArray($(this).val(), array_tipos)) {
            $(this).parent().hide();
        }
    })
    /*
    tipoHabitacion = response.filtrosApartamentosTiposHabitacion;
    
    if(tipoHabitacion[0].apartamentos == 0) {
        $('#villas').hide();
    } else {
        $('#villas').show().find('strong').html('(' + tipoHabitacion[0].apartamentos + ')');
    }
    
    if(tipoHabitacion[1].apartamentos == 0) {
        $('#rural').hide();
    } else {
        $('#rural').show().find('strong').html('(' + tipoHabitacion[1].apartamentos + ')')
    }*/
}

function mostrarComplejo() {
    $('.complejo-mark a').off('click').click(function(e) {
        
        e.preventDefault();
        
        $.ajax({
            url: BASE_URL + '/ajax-complejo',
            data: {idComplejo: $(this).attr('id-complejo')},
            type: 'post',
            dataType: 'json', 
            success: function(response) {
                if(response.msg == 'ok') {
                    $('#complejo-modal .modal-dialog').html(response.html);

                    $('#complejo-modal').modal();
                    $('#complejo-modal .carrusel').carousel({
                        interval: false
                    }).carousel('pause');

                }
            }
        })
    })
}
function fixWidth(){
    $('.filtros_main_container > div').width($('.filtros_main_container').width());
}
function followme() {
    var windowWidth = $(window).width();
    var filtrosContainerTop = $('.filtros_main_container').offset().top;
    var filtrosHeight = $('.filtros_main_container > div').height();
    var filtros = $('.filtros_main_container > div');

    $(window).resize(function() {
        fixWidth();
        windowWidth = $(window).width();
        filtrosContainerTop = $('.filtros_main_container').offset().top;
        filtrosHeight = $('.filtros_main_container > div').height();
    });
    fixWidth();

    $(window).scroll(function(e){
        var windowTop = $(window).scrollTop();
        var limite = $('.footer_container').offset().top - filtrosHeight - 35;

        if(limite > (filtrosHeight - 35) && windowWidth > 800){
            if(windowTop >= filtrosContainerTop && windowTop<limite){
                filtros.css({
                    position:'fixed',
                    top: 0
                });
            }else{
                if(windowTop<limite){
                    filtros.css('position','static');
                }else{
                    margin = $('.footer_container').offset().top - filtrosHeight-35;
                    filtros.css({
                        position: 'absolute',
                        top: margin
                    }); 
                }
            }
        }else{
            filtros.css('position','static');
        }
    });
/*
    $(window).scroll(function(e){
        windowTop = $(window).scrollTop();
        
        filtrosHeight = $('.filtros_main_container > div').height();
        
        filtrosContainerTop = $('.filtros_main_container').offset().top;
        
        filtros = $('.filtros_main_container > div');
        
        filtrosTop = filtros.offset().top;
        
        
        
        limite = $('#resultados').offset().top + $('#resultados').height();
        
        marginActual = parseInt($('.filtros_main_container > div').css('margin-top'));
        
        if($('#resultados').height() > filtrosHeight && $(window).width() > 768) {
            
            if(windowTop > filtrosContainerTop) {
                margin = windowTop - filtrosContainerTop;
                if(margin + filtrosHeight <= limite)
                    filtros.css('margin-top', margin + 'px');
            } else {
                filtros.css('margin-top', 0);
            }
            
        } else {
            filtros.css('margin-top', 0);
        }
    });*/
}
