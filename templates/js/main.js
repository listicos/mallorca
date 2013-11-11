$(document).ready(function() {
    $('.to_scroll_top').click(function() {
        $("html, body").animate({scrollTop: $("body").offset().top - 57}, 400);
        return false;
    });
});