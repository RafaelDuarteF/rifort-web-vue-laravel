<template>
    <div class="aplicacaoWrapper">
        <div class="leftAplicacao" v-if="$store.state.paths.artsPath">
            <div class="divImgBus">
                <img alt="Página principal" class="logoBus" @click="redirect(route_index)" :src="$store.state.paths.artsPath + 'logoheader.png'"/>
                <img :src="$store.state.paths.artsPath + 'onibus.jpg'" class="imgBus"/>
            </div>
            <div class="pesquisa">
                <form>
                    <label for="linha">Linha de ônibus</label>
                    <input type="text" id="linha" name="linha" placeholder="Ex: Vila sabrina / 1720-10" class="caixa caixa1"/>
                    <label for="parada">Ponto de parada</label>
                    <input type="text" id="parada" name="parada" placeholder="Ex: Avenida Paulista 1421" class="caixa caixa2"/>
                    <button type="button" @click="verificarChegada(route_verificar_chegadas)">Verificar</button>
                </form>
            </div>
            <div class="guiaPesquisa">
                <span>Insira a <a>linha de ônibus</a> e a <a>parada</a> desejada e saiba a exata lotação dos próximos ônibus a caminho.</span>
            </div>
        </div>
        <div class="rightAplicacao">
            <div class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3823.282456902198!2d-49.18339678464761!3d-16.612587448036287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935eed0c9fe78fd1%3A0xea07ea56bb53a074!2sR.%20das%20Palmeiras%20-%20Res.%20Aldeia%20do%20Vale%2C%20Goi%C3%A2nia%20-%20GO%2C%2074680-210!5e0!3m2!1spt-BR!2sbr!4v1636306791673!5m2!1spt-BR!2sbr" width="100%" height="100%" style="border:0;" loading="lazy"></iframe>
            </div>
            <div class="resLotacao">
                <div class="part-one">
                    <div class="left-part-one">
                        <div class="tituloLinhaImg">
                            <img alt="Linha" class="onibusVetor" :src="$store.state.paths.artsPath + 'vetorOnibus.png'"/>
                            <h2>{{ linhaOnibus }}</h2>
                        </div>
                        <h2 class="titulo">Próximos Ônibus</h2>
                    </div>
                    <div class="right-part-one">
                        <h3>Lotação</h3>
                        <div class="tiposLotacao">
                            <div class="vermelha tipos">
                                <div class="vermelhaColor cores"></div>
                                <span class="vermelhaDesc descricao">próxima ou atingida</span>
                            </div>
                            <div class="laranja tipos">
                                <div class="laranjaColor cores"></div>
                                <span class="laranjaDesc descricao">intermediária</span>
                            </div>
                            <div class="verde tipos">
                                <div class="verdeColor cores"></div>
                                <span class="verdeDesc descricao">vazia</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="part-two">
                    <div class="semInfos">
                        <span>Não há informações de chegada.</span>
                    </div>
                    <div class="primeiroOnibus onibus">
                        <div class="corLotacao"></div>
                        <div class="infosOnibus">
                            <h3>{{ onibus1 }}</h3>
                            <span>Lotação máxima: 45 passageiros</span>
                            <span>Lotação atual: 15 passageiros</span>
                            <span>Lotação porcentual: 20%</span>
                        </div>
                    </div>
                    <div class="segundoOnibus onibus">
                        <div class="corLotacao"></div>
                        <div class="infosOnibus">
                            <h3>{{ onibus2 }}</h3>
                            <span>Lotação máxima: 45 passageiros</span>
                            <span>Lotação atual: 15 passageiros</span>
                            <span>Lotação porcentual: 20%</span>
                        </div>
                    </div>
                    <div class="redesSociais">
                        <img alt="Instagram" class="logo instagramLogo" :src="$store.state.paths.artsPath + 'instagramLogo.png'"/>
                        <img alt="Facebook" class="logo facebookLogo" :src="$store.state.paths.artsPath + 'facebookLogo.png'"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['arts', 'route_verificar_chegadas', 'route_index'],
        data() {
            return {
                chegadas: false,
                linhaOnibus: '',
                onibus1: '',
                onibus2: '',
                intervalId: null,
            };
        },
        mounted() {
            this.$store.commit('SET_ARTS_PATH', this.arts);
            $(".aplicacaoWrapper").css("display", 'flex')
        },
        methods: {
            redirect(route) {
                location.assign(route);
            },
            verificarChegada(route) {
                let linhaIn = document.querySelector('#linha').value;
                let paradaIn = document.querySelector('#parada').value;
                let retorno = '';

                axios.get(route, { params: { linha: linhaIn, parada: paradaIn } })
                    .then(response => {
                        retorno = exibir(response.data)
                        if(retorno == 'interval') {
                            clearInterval(this.intervalId);
                            this.intervalId = setInterval(() => {
                                this.verificarChegada(route);
                            }, 10000);
                        }
                        else {
                            clearInterval(this.intervalId);
                        }
                        
                    })
                    .catch(errors => {
                        console.log(errors)
                    })

                const exibir = (res) => {
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
                    else if(res == 'noperation') {
                        Swal.fire({
                            title: 'Fora de operação.',
                            text: 'A partir da meia noite, os ônibus encerram suas operações!',
                            icon: 'warning'
                        });
                    }
                    else {
                        if(!this.chegadas) {
                            // Verifica se já foi solicitado anteriormente
                            $(".resLotacao").css({
                                display: 'flex',
                                height: 0
                                }).animate({
                                height: '50%'
                            }, 500); // animação de 500ms (meio segundo)
                            $(".mapa").css('heigth', '50%');
                        } 
                        this.chegadas = true;
                        let linha = res['linha']['tp'];
                        let chegada1 = res?.chegada?.vs?.[0]?.t ?? false;
                        let chegada2 = res?.chegada?.vs?.[1]?.t ?? false;
                        this.linhaOnibus = 'Linha - ' + res['linha']['lt'] + ' ' + linha;
                        if(!chegada1) {
                            $('.onibus').css('width', '92%');
                            $('.primeiroOnibus').css('display', 'none');
                            $('.segundoOnibus').css('display', 'none');
                            $('.semInfos').css('display', 'flex');
                        }
                        else {
                            this.onibus1 = 'Chegada: ' + chegada1;
                            if (!chegada2) {
                                $('.onibus').css('width', '92%');
                                $('.segundoOnibus').css('display', 'none');
                            } else {
                                this.onibus2 = 'Chegada: ' + chegada2;
                            }
                        }
                        return 'interval';
                    }
                }
            }
        }
    }
</script>

<style lang="scss">
    @import './style.scss';
</style>