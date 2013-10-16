$(document).ready(function(){
  $('#login_face').click(function(){
     FB.login(function(response) {
      
    } , {scope:'email'}); 
  });
});


window.fbAsyncInit = function() {
  FB.init({
    appId      : '335469189915773', 
    status     : true,
    cookie     : true,
    xfbml      : true
  });

  FB.Event.subscribe('auth.authResponseChange', function(response) {
    if (response.status === 'connected') {
      testAPI();
    } else if (response.status === 'not_authorized') {
      FB.login({scope: 'email'});
    } else {
      FB.login({scope: 'email'});
    }
  });
  };
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  function testAPI() {
    FB.api('/me', function(response) {
      login_register_facebook(response);
    });
}