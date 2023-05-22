<template>
    <div class="raio"></div>
    <div class="raio raio2"></div>
    <div class="videoFundo">
        <h2>Um toque de conforto e segurança em cada viagem.</h2>
        <span>Apoie o projeto RIFORT.</span>
        <video autoplay muted loop>
            <source :src="$store.state.paths.videosPath + '/fundo.mp4'" type="video/mp4"/>
        </video>
    </div>
    <div class="wrapperInfos sw">
        <div class="infos box" id="secao1">
            <h2>Seu transporte público com conforto e segurança que apenas a RIFORT pode proporcionar</h2>
            <div class="textImg">
                <img alt="Proposta" :src="$store.state.paths.artsPath + '/proposta.svg'"/>
                <span>Com nossos sensores, trazemos uma solução para o gigante problema de qualidade e segurança
                 relacionada as lotações dos ônibus nas grandes metrópoles.<br><br>
                Saiba todos os detalhes de nosso projeto <a :href="route_projeto">clicando aqui</a>.
                </span>
            </div>
        </div>
        <index-sobre-nos-component></index-sobre-nos-component>
        <index-contato-component></index-contato-component>
    </div>
</template>
<script>
    export default{
        props: ['participantes', 'arts', 'videos', 'route_projeto'],
        mounted() {
            this.$store.commit('SET_PARTICIPANTES_PATH', this.participantes);
            this.$store.commit('SET_ARTS_PATH', this.arts);
            this.$store.commit('SET_VIDEOS_PATH', this.videos);
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
        }
    }
</script>

<style>
    @import './style.css';
</style>