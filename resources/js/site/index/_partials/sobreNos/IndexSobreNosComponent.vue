<template>

    <div class="sobrenos box" id="secao2">
        <h2>Sobre Nós</h2>
        <span>Somos uma equipe de pequenos empreendedores, cuja iniciativa é investir
        num projeto público, para melhor solução das lotações nos transportes e problemas
        correlacionados do dia a dia nos ônibus.
        </span>
        <div class="perfis">
            <div class="perfil" id="betsabePerfil">
                <img alt="Betsabe Aparecida" :src="$store.state.paths.participantesPath + '/betsabe.jpg'"/>
                <div class="infosPerfil">
                    <h3>Betsabe Aparecida Jorge Ylla</h3>
                    <span>Uma estudante em formação do curso de Desenvolvimento de Sistemas na ETEC SEBRAE.
                    Neste projeto, sua colaboração foi feita através da comunicação, no desenvolvimento do design,
                    e participações e colaborações' no levantamento das pesquisas.
                    </span>
                </div>
            </div>
            <div class="perfil" id="gabrielLeal">
                <img alt="Gabriel Leal" :src="$store.state.paths.participantesPath + '/gabriel.jpeg'"/>
                <div class="infosPerfil">
                    <h3>Gabriel Leal Bonfim</h3>
                    <span>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica
                    e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido
                    pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum
                    sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica,
                    permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou
                    decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a
                    softwares de editoração eletrônica como Aldus PageMaker.
                    </span>
                </div>
            </div>
            <div class="perfil" id="isabellaPerfil">
            <img alt="Isabella Freitas" :src="$store.state.paths.participantesPath + '/isabella.jpg'"/>
                <div class="infosPerfil">
                    <h3>Isabella Freitas Ribeiro</h3>
                    <span>Estudante da Etec Sebrae, cursando desenvolvimento de sistemas. Colaborando na parte do design,
                    levantamento de pesquisas e documentação do projeto! Cursou sobre Photoshop e criatividade em 2023 e
                    também colaborando no projeto de midías sociais da Etec Sebrae.
                    </span>
                </div>
            </div>
            <div class="perfil" id="marcosPerfil">
                <img alt="Marcos Murilla" :src="$store.state.paths.participantesPath + '/marcos.jpg'"/>
                <div class="infosPerfil">
                    <h3>Marcos Vinicius Murilla</h3>
                    <span>Estudante de Desenvolvimento de Sistemas na Etec Sebrae, Marcos Murilla acompanha o projeto,
                    empenhando nas funções de edição, design, e criações de ideias. Trabalhou na criação de um projeto
                    interdisciplinar, e constantemente busca novas experiencias.
                    Apaixonado por fotografia, cinema e a própria edição dos mesmos, tem o sonho de algum dia ingressar
                    em uma boa faculdade, e desenvolver mais projetos relacionados as suas paixões.
                    </span>
                </div>
            </div>
            <div class="perfil" id="rafaelPerfil">
                <img alt="Rafael Duarte" :src="$store.state.paths.participantesPath + '/rafael.jpg'"/>
                <div class="infosPerfil">
                    <h3>Rafael Duarte de Freitas</h3>
                    <span>Possui uma paixão por tecnologia e programação desde seus 13 anos, quando já sabia a
                    área que iria seguir para a vida. Hoje, realiza o último ano de um curso técnico de desenvolvimento
                    de sistemas integrado ao ensino médio na ETEC Sebrae. Além disso, possue vários cursos
                    extracurriculares na área da tecnologia da informação, principalmente relacionados a web
                    development. Seu maior amor dentro do mundo da tecnologia é desenvolvimento web, tanto na parte do
                    Back-end quanto no Front-end. Nesse projeto,
                    atuou/atua como responsável pela parte web e mobile de desenvolvimento.
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {

}
</script>

<style scoped>
    @import './style.css';
</style>