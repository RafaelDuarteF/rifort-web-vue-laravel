// Javascript de funções gerais

$(window).scroll(function() {
    let scroll = $(window).scrollTop();
    if(scroll > 100) {
        $('header').stop().animate({backgroundColor: $.Color('rgba(40, 40, 40, 0.9)')}, 500);
    } else {
        $('header').stop().animate({backgroundColor: $.Color('rgb(43, 43, 43, 0)')}, 500);
    }
});
$(document).ready(function() {
    $(".sw").css("width", $(window).width());
     
    const sr = ScrollReveal();
    sr.reveal('body > *', { duration: 1000, easing: 'ease-in-out' });

    // Adiciona a classe de transição a todos os elementos revelados
    document.querySelectorAll('body > *').forEach(element => {
        element.classList.add('smooth-scroll');
    });
});
function redirect(link) {
    location.assign(link);
}
