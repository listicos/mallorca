$(document).ready(function(){
    
    $('#gestion_empresas_form').submit(function(ev){
        ev.preventDefault();
        var form = $(this);
        var valid_form;
        valid_form = form.validationEngine('validate');
        
        if(valid_form){
            $.ajax({
                dataType: "json",
                url: BASE_URL + "/admin-ajax-empresas",
                type: "POST",
                data: form.serialize(),
                success: function(response) {    
                    if(response.msg == 'ok'){
                        noty({
                            "text":response.data,
                            "layout":"top",
                            "type":"success"
                        });
                        window.setTimeout(function(){
                            window.location = BASE_URL+'/admin-empresa-lista';
                        },2500);
                    }else{
                        noty({
                            "text":response.data,
                            "layout":"top",
                            "type":"error"
                        });
                    }
                }
            }); 
        }else{
            console.log('invalid form !')
        }
    });
    
    addContratoRow();
    deleteContratoEmpresa()
    initDates();
});

function addContratoRow(){
    $('.add_contrato_button_container #add_contrato').click(function(){
        var new_contrato = $('.render_contratos_container').html();
        $('.new_contratos_list_container').append(new_contrato);
        initDates();
        deleteContratoRow();
        return false;
    });
}

function deleteContratoEmpresa(){
    $('.delete_contrato_exist').off().on('click',function(){
        //$(this).parents('.render_row').remove()
        var anchor = $(this);
        var idEmpresaContrato = anchor.attr('contratoemp-id');
        var result = confirm("¿Desea remover el contrato?.")
        if(result){
            $.ajax({
                dataType: "json",
                url: BASE_URL + "/admin-ajax-contrato-gestion",
                type: "POST",
                data: {
                    action: 'deleteEmpresaContrato',
                    idEmpresaContrato: idEmpresaContrato
                },
                success: function(response) {    
                    if(response.msg == 'ok'){
                        noty({
                            "text":response.data,
                            "layout":"top",
                            "type":"notification"
                        });
                        anchor.parents('.contrato_child_content').remove();
                    }else{
                        noty({
                            "text":response.data,
                            "layout":"top",
                            "type":"error"
                        });
                    }
                }
            }); 
        }
        return false;
    });
}

function deleteContratoRow(){
    $('.delete_node_contrato').off().on('click',function(){
        $(this).parents('.render_row').remove()
        return false;
    });
}

function initDates(){
    $('.date-start').datepicker({
        autoclose: true
    }).on('changeDate', function(ev) {
        var dateEnd = $(this).parents('.contrato-group').find('.date-end');
        dateEnd.datepicker('setStartDate', ev.date);
        dateEnd.datepicker('show');
    });

    $('.date-start').datepicker('setStartDate', new Date());

    $('.date-end').datepicker({
        autoclose: true
    }).on('changeDate', function(ev) {

        });

    $('.date-end').datepicker('setStartDate', new Date());
}