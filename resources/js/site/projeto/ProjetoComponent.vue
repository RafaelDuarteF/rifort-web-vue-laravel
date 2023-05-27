<template>
    <div class="raio"></div>
    <div class="raio raio2"></div>
    <div class="projetoFundo" v-if="$store.state.paths.videosPath">
        <h2>Tecnologia e conforto em seu transporte.</h2>
        <span>Confira todas as informações sobre nosso projeto.</span>
        <video autoplay muted loop>
            <source :src="$store.state.paths.videosPath + '/projeto-fundo.mp4'" type="video/mp4"/>
        </video>
    </div>
    <div class="infosProjeto sw" v-if="$store.state.paths.artsPath">
        <div class="sobreProjeto">
            <h2>O que é?</h2>
            <div class="infos_sobreProjeto" id="projetoSecao1">
                <img alt="Sobre o projeto" :src="$store.state.paths.artsPath + '/bus-stop.png'"/>
                <span>Nosso projeto consiste em realizar a contagem de passageiros através de um
                 sensor, usando uma tecnologia que é capaz de saber se o ônibus desejado está com
                 uma capacidade cheia, média ou vazia. O sensor é um dispositivo capaz de detectar
                 ações de fenômeno físico com interações de um meio, seja pela temperatura, luz
                 ou impedância elétrica, e ele transmitirá um sinal para o dispositivo de controle
                 do nosso projeto. Trazendo um conforto e segurança para aqueles que necessitam
                 do transporte público.
                </span>
            </div>
            <h2>Como é usado?</h2>
            <div class="infos_sobreProjeto" id="projetoSecao2">
                <h4>Protótipo</h4>
                <video autoplay muted loop>
                    <source :src="'assets/videos/prototipo-projeto.mp4'" type="video/mp4"/>
                </video>
                <progress id="barraDeProgresso" value="0" max="100"></progress>
                <span>Ele se instala nas portas do automóvel para embarque e desembarque de passageiros,
                 quando o passageiro entrar no ônibus o sensor automaticamente irá realizar a contagem
                 dos mesmos através de números, acrescentando-o aos desamais passageiros contados no
                 local. Se o passageiro realizar o desembarque, o sensor irá efetivar um decremento, ou
                 seja, irá diminuir a quantidade já estabelecida no local. Assim, o sensor terá o controle
                 da estatística dos passageiros e irá fornecer uma mensagem como comando para identificar
                 a lotação do mesmo.<br> Acima, o protótipo de funcionamento dos sensores.
                </span>
            </div>
            <div class="infos_sobreProjeto" id="projetoSecao3">
                <h2>Identidade Visual</h2>
                <span>Nossa Identidade Visual busca proporcionar uma facilidade em trazer para o nosso público uma
                     comunicação dos nossos valores e do nosso propósito. Definimos de forma visual o reconhecimento
                     e valor da RifortBus através do documento seguinte:
                </span>
                <iframe src="seu_pdf.pdf" width="90%" height="900px"></iframe>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['arts', 'videos'],
        mounted() {
            this.$store.commit('SET_ARTS_PATH', this.arts);
            this.$store.commit('SET_VIDEOS_PATH', this.videos);
            $(".navSobreProjeto").on('click', function() {
                $('html, body').animate({
                scrollTop: $('#projetoSecao1').offset().top - 200
                }, 1000);
            });
            $(".navSobreUso").on('click', function() {
                $('html, body').animate({
                scrollTop: $('#projetoSecao2').offset().top - 200
                }, 1000);
            });
            $(".navIdentidadeVisual").on('click', function() {
                $('html, body').animate({
                scrollTop: $('#projetoSecao3').offset().top - 70
                }, 1000);
            });
            let video = document.querySelector('#projetoSecao2 video');
            let progressBar = document.getElementById('barraDeProgresso');

            video.addEventListener('timeupdate', function() {
                let percent = Math.floor((100 / video.duration) * video.currentTime);
                progressBar.value = percent;
            });
        },
    }
</script>
<style lang="scss">
    @import './style.scss';
</style>