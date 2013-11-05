var Calendar = function () {

    var h = {
                left: 'title',
                center: '',
                right: 'prev,next,month'
            };

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();


    return {
        //main function to initiate the module
        init: function () {

            /*App.addResponsiveHandler(function () {
                Calendar.initCalendar();
            });*/

        },

        initCalendar: function () {

            if (!jQuery().fullCalendar) {
                return;
            }

            /*var h = {};*/

            /* FIX PARA WEB ...POR LA TAB QUE ESTA OCULTA */
            $('#calendar').removeClass("mobile");
            /*h = {
                left: 'title',
                center: '',
                right: 'prev,next,month'
            };*/

            $('#calendar').fullCalendar('destroy'); // destroy the calendar
            Calendar.createTarifas()

        },

        createTarifas: function (){
            $.ajax({
                dataType: "json",
                url: BASE_URL + "/admin-ajax-calendario",
                type: "POST",
                data: {
                    idApartamento: $('.calendar_tarifas_main').find('.apartamentoId').val(),
                    action: 'getTarifas'
                },
                success: function(response) {    
                    if(response.msg == 'ok'){
                        var _tarifas = response.tarifas
                        if(_tarifas.length > 0){
                            var tarifas_array = []
                            for(var i=0;i < _tarifas.length;i++){
                                var tarifa_temp;
                                var price = _tarifas[i].precio ? _tarifas[i].precio+"€ ("+_tarifas[i].precioContrato+'€)' : " 0,00€";

                                if(_tarifas[i].estatus == 'disponible')
                                    tarifa_temp = {'title': price, 'start': _tarifas[i].fechaInicio, 'end': _tarifas[i].fechaFinal, 'backgroundColor': App.getLayoutColorCode('green')};
                                else
                                    tarifa_temp = {'title': price, 'start': _tarifas[i].fechaInicio, 'end': _tarifas[i].fechaFinal, 'backgroundColor': App.getLayoutColorCode('red')};
                                
                                tarifas_array.push(tarifa_temp)
                            }
                            Calendar.setTarifasToCalendar(tarifas_array);
                        }else{
                            Calendar.setTarifasToCalendar();
                        }
                    }else{
                        Calendar.setTarifasToCalendar();
                    }
                }
            }); 
        },

        setTarifasToCalendar: function (tarifas){

            if(tarifas){
                $('#calendar').fullCalendar({
                    header: h,
                    firstDay: 1,
                    slotMinutes: 15,
                    editable: false,
                    droppable: false,
                    events: tarifas
                });
            }else{
                $('#calendar').fullCalendar({
                    header: h,
                    slotMinutes: 15,
                    editable: false,
                    droppable: false,
                    events: []
                });
            }
        }

    };

}();