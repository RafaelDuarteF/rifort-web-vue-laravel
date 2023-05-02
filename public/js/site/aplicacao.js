$(document).ready(() => {
    $(".aplicacaoWrapper").css("display", 'flex')
});
chegadas = false;
function verificarChegada(url) { 
  // Verifica as informações de chegada e lotação dos ônibus na linha e parada informada
    let linhaIn = document.querySelector('#linha').value;
    let paradaIn = document.querySelector('#parada').value;
    $.ajax({
        url: url,
        method: "GET",
        data: { linha: linhaIn, parada: paradaIn },
        success: response => exibir(response),
        error: function(xhr, status, error) {
          console.log("Ocorreu um erro: " + error);
          alert(url)
        },
    });
    function exibir (res) {
      if(res == 0) {
        Swal.fire({
          title: 'Parada inválida', 
          text: 'A parada não é correspondente na linha informada', 
          icon: 'error'
        });
      }
      else if(res == 'empty') {
        Swal.fire({
          title: 'Preencha a linha e a parada',
          text: 'A linha e a parada precisa ser informada!',
          icon: 'error'
        });
      }
      else if(res == 'invalid') {
        Swal.fire({
          title: 'Dados inválidos',
          text: 'As informações de linha ou/e parada são inválidas!',
          icon: 'error'
        });
      }
      else {
        if(!chegadas) {
          // Verifica se já foi solicitado anteriormente
          $(".resLotacao").css({
            display: 'flex',
            height: 0
            }).animate({
              height: '50%'
          }, 500); // animação de 500ms (meio segundo)
          $(".mapa").css('heigth', '50%');
        } 
        chegadas = true;
        let linha = res['linha']['tp'];
        let chegada1 = res && res['chegada'] && res['chegada']['vs'] && res['chegada']['vs'][0] && res['chegada']['vs'][0]['t'] ? res['chegada']['vs'][0]['t'] : false;
        let chegada2 = res && res['chegada'] && res['chegada']['vs'] && res['chegada']['vs'][1] && res['chegada']['vs'][1]['t'] ? res['chegada']['vs'][1]['t'] : false;
        $('.tituloLinhaImg h2').text('Linha - ' + res['linha']['lt'] + ' ' + linha);
        if(!chegada1) {
          $('.onibus').css('width', '92%');
          $('.primeiroOnibus').css('display', 'none');
          $('.segundoOnibus').css('display', 'none');
          $('.semInfos').css('display', 'flex');
        }
        else {
          $('.primeiroOnibus .infosOnibus h3').text('Chegada: ' + chegada1);
          if (!chegada2) {
            $('.onibus').css('width', '92%');
            $('.segundoOnibus').css('display', 'none');
          } else {
              $('.segundoOnibus .infosOnibus h3').text('Chegada: ' + chegada2);
          }
        }
      }
    }
}