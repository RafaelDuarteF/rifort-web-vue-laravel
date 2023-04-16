@extends('general.basic')
@section('assets.css')
    <link href="{{ asset($cssPath . 'aplicacao.css')}}" type="text/css" rel="stylesheet"/>
@endsection
@section('assets.js')
    <script src="{{ asset($jsPath . 'aplicacao.js') }}"></script>
@endsection

@section('header')
@endsection

@section('conteudo')

    <div class="aplicacaoWrapper">
        <div class="leftAplicacao">
            <div class="divImgBus">
                <img alt="Página principal" class="logoBus" onclick="redirect('{{ route('site.index') }}')" src="{{ asset($artsPath . 'logoHeader.png') }}"/>
                <!-- <h1>Verifique a lotação do seu ônibus em São Paulo!</h1> -->
                <img src="{{ asset($artsPath . 'onibus.jpg') }}" class="imgBus"/>
            </div>
            <div class="pesquisa">
                <form>
                    <label for="linha">Linha de ônibus</label>
                    <input type="text" id="linha"name="linha" placeholder="Ex: Vila sabrina / 1720-10" class="caixa caixa1"/>
                    <label for="parada">Ponto de parada</label>
                    <input type="text" id="parada" name="parada" placeholder="Ex: Avenida Paulista 1421" class="caixa caixa2"/>
                    <button type="button" onclick="verificarChegada('{{ route('site.application.verificarChegadas') }}')">Verificar</button>
                </form>
            </div>
            <div class="guiaPesquisa">
                <span>Insira a <a>linha de ônibus</a> e a <a>parada</a> desejada e saiba a exata lotação dos próximos ônibus a caminho.</span>
            </div>
        </div>
        <div class="rightAplicacao">
            <div class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3823.282456902198!2d-49.18339678464761!3d-16.612587448036287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935eed0c9fe78fd1%3A0xea07ea56bb53a074!2sR.%20das%20Palmeiras%20-%20Res.%20Aldeia%20do%20Vale%2C%20Goi%C3%A2nia%20-%20GO%2C%2074680-210!5e0!3m2!1spt-BR!2sbr!4v1636306791673!5m2!1spt-BR!2sbr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="resLotacao">
                <div class="part-one">
                    <div class="left-part-one">
                        <div class="tituloLinhaImg">
                            <img alt="Linha" class="onibusVetor" src="{{ asset($artsPath . 'vetorOnibus.png') }}"/>
                            <h2></h2>
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
                            <h3></h3>
                            <span>Lotação máxima: 45 passageiros</span>
                            <span>Lotação atual: 15 passageiros</span>
                            <span>Lotação porcentual: 20%</span>
                        </div>
                    </div>
                    <div class="segundoOnibus onibus">
                        <div class="corLotacao"></div>
                        <div class="infosOnibus">
                            <h3></h3>
                            <span>Lotação máxima: 45 passageiros</span>
                            <span>Lotação atual: 15 passageiros</span>
                            <span>Lotação porcentual: 20%</span>
                        </div>
                    </div>
                    <div class="redesSociais">
                        <img alt="Instagram" class="logo instagramLogo" src="{{ asset($artsPath . 'instagramLogo.png') }}"/>
                        <img alt="Facebook" class="logo facebookLogo" src="{{ asset($artsPath . 'facebookLogo.png') }}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
@endsection