// Javascript da página principal

$(document).ready(function() {
    $(".navSobreNos").on('click', function() {
        $('html, body').animate({
        scrollTop: $('#secao2').offset().top -100
        }, 1000);
    });
    $(".navProposta").on('click', function() {
        $('html, body').animate({
        scrollTop: $('#secao1').offset().top -80
        }, 1000);
    });
    $(".navContato").on('click', function() {
        $('html, body').animate({
        scrollTop: $('#secao3').offset().top -100
        }, 1000);
    });
});