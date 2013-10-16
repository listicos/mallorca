$(document).ready(function() {
  if(typeof disponibles !== 'undefined')
    disponibles = eval(disponibles);

   $(".datepicker_checkin").datepicker({minDate: 0, onSelect: function(dateStr) {
            var dateMin = $(this).datepicker('getDate');
            var dateMinA = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate() + 1);
            $('.datepicker_checkout').datepicker('option', 'minDate', dateMinA || '0'); 
        }, beforeShowDay: isAvailable
    });

    $(".datepicker_checkout").datepicker({minDate: 0, beforeShowDay: isAvailable});
    
    $(".opiniones_colorbox").colorbox({
        inline: true,
        innerWidth: 700,
        innerHeight: 300
    });

   $('ul li:has(ul)').hover(
      function(e)
      {
         $(this).find('ul').css({display: "block"});
      },
      function(e)
      {
         $(this).find('ul').css({display: "none"});
      }
   );
});

function isAvailable(date){
  if(typeof disponibles === 'undefined') return true;
    var dateAsString = date.getFullYear().toString() + "-" + (date.getMonth()+1).toString() + "-" + date.getDate();
    var result = $.inArray( dateAsString, disponibles ) ==-1 ? [false] : [true];
  return result
}

function login_register_facebook(facebook_obj){
    if(facebook_obj){
      facebook_obj['action'] = 'login_register';
        $.ajax({
          dataType: "json",
          url: BASE_URL + "/ajax-facebook",
          type: "POST",
          data: facebook_obj,
          success: function(response) {
              if (response.msg === 'ok') {
                location.href = BASE_URL;
              }else{
                alert('Error al querer registrar usuario.');
              }
          }
      
      }); 
    }
}