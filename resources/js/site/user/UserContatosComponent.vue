<template>
  <div id="contatosWrapper" class="sw">
    <h2 class="titleSol">Solicitações de Contato</h2>
    <div class="trocarContatos" v-if="parsedContatos.length > 0">
      <img class="setaBranca setaEsquerda setas" v-if="pageNumber == 1" :src="'../../' + $store.state.paths.artsPath + 'setaBranca.png'" alt="Excluir"/>
      <img class="setaLaranja setaEsquerda setas" @click="previousPage" v-if="pageNumber != 1" :src="'../../' + $store.state.paths.artsPath + 'seta.png'" alt="Excluir"/>
      <span class="numeroPagina">{{ pageNumber }}</span>
      <img class="setaLaranja setaDireita setas" @click="nextPage"  v-if="numeroDeContatos === 10"  :src="'../../' + $store.state.paths.artsPath + 'seta.png'" alt="Excluir"/>
      <img class="setaBranca setaDireita setas" v-if="numeroDeContatos < 10"  :src="'../../' + $store.state.paths.artsPath + 'setaBranca.png'" alt="Excluir"/>
    </div>
    <div class="contatosGerais">
      <div v-for="(contato, index) in parsedContatos" :key="index" :id="contato.id" @click="abrirSolicitacao(contato.id)" class="contato-card">
        <div class="left-contato-card-wrapper">
          <img class="emailImg" :src="'../../' + $store.state.paths.artsPath + 'emailBranco.png'" alt="Email"/>
          <div class="left-contato-card">
            <span class="emailContato"><b>Email: {{ contato.email }}</b></span>
            <span class="assuntoContato">Assunto: {{ contato.assunto }}</span>
          </div>
        </div>
        <div class="right-contato-card">
          <div class="excluirContato">
            <span class="textExcluirContato" @click=deletarSolicitacao(contato.id)>Excluir solicitação</span>
            <img class="excluirImg" @click=deletarSolicitacao(contato.id) :src="'../../' + $store.state.paths.artsPath + 'excluir.png'" alt="Excluir"/>
          </div>
          <span class="dataContato">{{  contato.data_envio }}</span>
        </div>
      </div>
    </div>
    <div class="semContatos" v-if="parsedContatos.length == 0">
      <span>Sem solicitações de contato!</span>
    </div>
    <div class="trocarContatos" v-if="parsedContatos.length > 0">
      <img class="setaBranca setaEsquerda setas" v-if="pageNumber == 1" :src="'../../' + $store.state.paths.artsPath + 'setaBranca.png'" alt="Excluir"/>
      <img class="setaLaranja setaEsquerda setas" @click="previousPage" v-if="pageNumber != 1" :src="'../../' + $store.state.paths.artsPath + 'seta.png'" alt="Excluir"/>
      <span class="numeroPagina">{{ pageNumber }}</span>
      <img class="setaLaranja setaDireita setas" @click="nextPage"  v-if="numeroDeContatos === 10"  :src="'../../' + $store.state.paths.artsPath + 'seta.png'" alt="Excluir"/>
      <img class="setaBranca setaDireita setas" v-if="numeroDeContatos < 10"  :src="'../../' + $store.state.paths.artsPath + 'setaBranca.png'" alt="Excluir"/>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    contatos: {
      type: String,
      required: true,
    },
    arts: {
      type: String,
      required: true,
    },
    route_deletar_solicitacao: {
      type: String,
      required: true,
    },
    route_verificar_contato: {
      type: String,
      required: true,
    }
  },
  data() {
    return {
      pageNumber: 1, 
      delete: false,
    };
  },
  computed: {
    parsedContatos() {
      try {
        return JSON.parse(this.contatos);
      } catch (error) {
        console.error('Erro ao fazer o parse dos contatos:', error);
        return [];
      }
    },
    numeroDeContatos() {
      return JSON.parse(this.contatos).length;
    },
  },
  mounted() {
    const urlParams = new URLSearchParams(window.location.search);
    this.pageNumber = urlParams.get('page') ?? 1;
    if(JSON.parse(this.contatos).length < 1 && this.pageNumber != 1) {
      this.previousPage();
    }
    this.$store.commit('SET_ARTS_PATH', this.arts);
  },
  methods: {
    previousPage() {
      if (this.pageNumber > 1) {
        this.pageNumber--;
        this.updatePageInUrl();
      }
    },
    nextPage() {
      if (this.numeroDeContatos === 10) {
        this.pageNumber++;
        this.updatePageInUrl();
      }
    },
    updatePageInUrl() {
      const searchParams = new URLSearchParams(window.location.search);
      searchParams.set('page', this.pageNumber);
      window.location.href = `${window.location.pathname}?${searchParams.toString()}`;
    },
    deletarSolicitacao(id) {
      this.delete = true;
      axios.post(this.route_deletar_solicitacao, { id: id })
        .then(response => {
          if(response) {
            $('#' + id).css('display', 'none');
            Swal.fire({
                title: 'Deletado com sucesso!', 
                text: 'O contato foi deletado com sucesso!', 
                icon: 'success'
            });
            this.contatos = this.contatos.filter(contato => contato.id !== id);
          } else if(!response ) {
            Swal.fire({
                title: 'Ocorreu um erro', 
                text: 'Ocorreu um erro ao tentar deletar o contato.', 
                icon: 'error'
            });
          } 
        }) 
        .catch(errors => {
        })
    },
    abrirSolicitacao(id) {
      if(!this.delete) {
        location.assign(this.route_verificar_contato + '/' + id);
      } else {
        this.delete = false;
      }
    }
  }
};
</script>

<style lang="scss">
  @import './style.scss';
</style>