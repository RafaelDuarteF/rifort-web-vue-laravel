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
    <div class="wrapperInfos sw" v-if="$store.state.paths.artsPath">

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

        <div class="infos box" id="secao2">
            <h2>Aplicação</h2>
            <div class="textImg aplicacao">
                <span>Utilize a nossa aplicação por <a :href="route_aplicacao">aqui</a>. Nela, você pode verificar a lotação dos próximos
                     ônibus que você deseja usufruir em São Paulo!
                </span>
                <object type="image/svg+xml" :data="$store.state.paths.videosPath + 'aplicacao.svg'"></object>
            </div>
            <a class="redirectAplicacao" :href="route_aplicacao">Ir para a aplicação</a>
        </div>

        <index-sobre-nos-component></index-sobre-nos-component>
        <index-contato-component 
            :erro_preenchimento="erro_preenchimento" 
            :contato_enviado="contato_enviado" 
            :erro_contato="erro_contato" 
            :csrf="csrf" 
            :route_contato="route_contato"
            :erro_email="erro_email"
            :erro_assunto="erro_assunto"
            :erro_mensagem="erro_mensagem"
            :old_contato_email="old_contato_email"
            :old_contato_assunto="old_contato_assunto"
            :old_contato_mensagem="old_contato_mensagem"
        >
        </index-contato-component>

    </div>
</template>
<script>
    export default{
        props: {
            participantes: {
                type: String,
                required: true
            },
            arts: {
                type: String,
                required: true
            },
            videos: {
                type: String,
                required: true
            },
            route_projeto: {
                type: String,
                required: true
            },
            route_contato: {
                type: String,
                required: true
            },
            route_aplicacao: {
                type: String,
                required: true,
            },
            csrf: {
                type: String,
                required: true
            },
            erro_preenchimento: {
                type: String,
                required: false
            },
            contato_enviado: {
                type: String,
                required: false
            },
            erro_contato: {
                type: String,
                required: false
            },
            erro_email: {
                type: String,
                required: false,
            },
            erro_assunto: {
                type: String,
                required: false,
            },
            erro_mensagem: {
                type: String,
                required: false,
            },
            old_contato_email: {
                type: String,
                required: false,
            },
            old_contato_assunto: {
                type: String,
                required: false,
            },
            old_contato_mensagem: {
                type: String,
                required: false,
            },
        },
        mounted() {
            this.$store.commit('SET_PARTICIPANTES_PATH', this.participantes);
            this.$store.commit('SET_ARTS_PATH', this.arts);
            this.$store.commit('SET_VIDEOS_PATH', this.videos);
            $(".navSobreNos").on('click', function() {
                $('html, body').animate({
                    scrollTop: $('#secao3').offset().top -100
                }, 1000);
            });
            $(".navProposta").on('click', function() {
                $('html, body').animate({
                scrollTop: $('#secao1').offset().top -80
                }, 1000);
            });
            $(".navContato").on('click', function() {
                $('html, body').animate({
                scrollTop: $('#secao4').offset().top -100
                }, 1000);
            });
            $(".navAplicacao").on('click', function() {
                $('html, body').animate({
                scrollTop: $('#secao2').offset().top -100
                }, 1000);
            });
        }
    }
</script>

<style lang="scss">
    @import './style.scss';
</style>