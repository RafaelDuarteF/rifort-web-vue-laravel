
$(window).scroll(function() {
    let scroll = $(window).scrollTop();
    if(scroll > 100) {
        $('.header').stop().animate({backgroundColor: $.Color('rgba(40, 40, 40, 0.9)')}, 500);
    } else {
        $('.header').stop().animate({backgroundColor: $.Color('rgb(43, 43, 43, 0)')}, 500);
    }
});
jQuery(function($) {
    $(".sw").css("width", window.screen.width - 8); 
    // classe sw possui width do tamanho do monitor do usuário, menos 8px do scrollbar
     
    const sr = ScrollReveal();
    sr.reveal('body > *', { duration: 1000, easing: 'ease-in-out' });

    // Adiciona a classe de transição a todos os elementos revelados
    document.querySelectorAll('body > *').forEach(element => {
        element.classList.add('smooth-scroll');
    });
    var loading = document.getElementById('loading');
    loading.style.display = 'none';
});
function redirect(link, tipo = 'assign') {
    if(tipo == 'assign')
        location.assign(link);
    else if(tipo == 'replace')
        window.open(link, '_blank');
}
