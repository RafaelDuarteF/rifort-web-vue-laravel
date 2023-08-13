<template>
    <div class="aplicacaoWrapper">
        <div class="leftAplicacao" v-if="$store.state.paths.artsPath">
            <div class="divImgBus">
                <img alt="Página principal" class="logoBus" @click="redirect(route_index)" :src="$store.state.paths.artsPath + 'logoheader.png'"/>
                <img alt="Ônibus" :src="$store.state.paths.artsPath + 'onibus.jpg'" class="imgBus"/>
            </div>
            <div class="pesquisa">
                <form>
                    <label for="linha">Número da linha</label>
                    <input type="text" id="numLinha" name="numLinha" placeholder="Ex: 1732-10" class="caixa caixa1"/>
                    <label for="linha">Sentido da linha</label>
                    <input type="text" id="linha" name="linha" placeholder="Ex: Vila sabrina" class="caixa caixa2"/>
                    <label for="parada">Ponto de parada</label>
                    <input type="text" id="parada" name="parada" placeholder="Ex: Avenida Paulista 1421" class="caixa caixa3"/>
                    <button type="button" @click="verificarChegada(route_verificar_chegadas)">Verificar</button>
                </form>
            </div>
            <div class="guiaPesquisa">
                <span>Insira a <a>linha de ônibus</a> e a <a>parada</a> desejada e saiba a exata lotação dos próximos ônibus a caminho.</span>
            </div>
        </div>
        <div class="rightAplicacao">
            <div id="map"></div>
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
            window.addEventListener('load', () => {
                let location = this.getUserLocation();
                this.initMap([location?.lat ?? -23.5475000, 0], [location?.lng ?? -46.6361100, 0], false);
            });
            
            this.$store.commit('SET_ARTS_PATH', this.arts);
            $(".aplicacaoWrapper").css("display", 'flex')
        },
        methods: {
            initMap(latitudes, longitudes, marcador = false) {
                // Coordenadas do local que você deseja exibir
                var locations = [
                    { lat: latitudes[0], lng: longitudes[0] },
                    { lat: latitudes[1], lng: longitudes[1] }
                ];
                
                 // Configurações do mapa
                var mapOptions = {
                    center: locations[0],
                    zoom: marcador == false ? 11 : 15,
                };
                
                // Criação do mapa
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);

                // Adiciona os marcadores
                if(marcador != false) {
                    locations.forEach(location => {
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map,
                            title: 'Localização do ônibus',
                            icon: {
                                url: './assets/arts/marker.png',
                                scaledSize: new google.maps.Size(50, 50), 
                            }
                            
                        });
                    });
                }
            },
            async getUserLocation() {
                return new Promise((resolve, reject) => {
                    if ("geolocation" in navigator) {
                    navigator.geolocation.getCurrentPosition(position => {
                        var userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        resolve(userLocation);
                    }, error => {
                        reject(error);
                    });
                    } else {
                        reject("Geolocalização não suportada.");
                    }
                });
            },
            redirect(route) {
                location.assign(route);
            },
            verificarChegada(route) {
                let linhaIn = document.querySelector('#linha').value;
                let numLinhaIn = document.querySelector('#numLinha').value;
                let paradaIn = document.querySelector('#parada').value;
                let retorno = '';

                if(linhaIn == '' || numLinhaIn == '' || paradaIn == '') {
                    Swal.fire({
                            title: 'Preencha a linha e a parada',
                            text: 'A linha e a parada precisa ser informada!',
                            icon: 'error'
                    });
                } else {
                    axios.get(route, { params: { linha: linhaIn, parada: paradaIn, numLinha: numLinhaIn } })
                        .then(response => {
                            retorno = exibir(response.data)
                            // if(retorno == 'interval') {
                            //     clearInterval(this.intervalId);
                            //     this.intervalId = setInterval(() => {
                            //         this.verificarChegada(route);
                            //     }, 10000);
                            // }
                            // else {
                            //     clearInterval(this.intervalId);
                            // }
                            
                        })
                        .catch(errors => {
                            console.log(errors)
                        })
                }
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
                        let linha = res['linha']['nome'];
                        let chegada1 = res?.chegada?.vs?.[0]?.t ?? false;
                        let chegada2 = res?.chegada?.vs?.[1]?.t ?? false;
                        this.linhaOnibus = 'Linha - ' + res['linha']['num'] + ' ' + linha;
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
                            let latitude1 = res?.chegada?.vs?.[0]?.py ?? 0;
                            let longitude1 = res?.chegada?.vs?.[0]?.px ?? 0;
                            let latitude2 = res?.chegada?.vs?.[1]?.py ?? 0;
                            let longitude2 = res?.chegada?.vs?.[1]?.px ?? 0;
                            let latitudes = [latitude1, latitude2];
                            let longitudes = [longitude1, longitude2];
                            this.initMap(latitudes, longitudes, true);
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