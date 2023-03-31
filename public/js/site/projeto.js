// Javascript da página principal

$(document).ready(function() {
    $(".navSobreProjeto").on('click', function() {
        $('html, body').animate({
        scrollTop: $('#secao1').offset().top - 200
        }, 1000);
    });
    $(".navSobreUso").on('click', function() {
        $('html, body').animate({
        scrollTop: $('#secao2').offset().top - 200
        }, 1000);
    });
});
let video = document.querySelector('#secao2 video');
let progressBar = document.getElementById('barraDeProgresso');

video.addEventListener('timeupdate', function() {
  let percent = Math.floor((100 / video.duration) * video.currentTime);
  progressBar.value = percent;
});