<template>
    <div id="contatoEspWrapper" class="sw">
        <span class="deEmail titleContatoEsp"><b>De: {{ parsedContatos.email }}</b></span>
        <div class="visuContatoEsp">
            <span class="visuAssunto">Assunto: {{ parsedContatos.assunto }}</span>
            <div class="divMensagem">
                <span class="visuMensagem">Mensagem: {{ parsedContatos.mensagem }}</span>
            </div>
         </div>
        <span class="titleResps titleContatoEsp"><b>{{ respostaAuto ? 'Respostas Automáticas:' : 'Escrever resposta:' }}</b></span>
        <div class="visuContatoEsp respContato">
            <div class="divMensagem" v-if="respostaAuto">
                <div class="respsAutomaticas">
                    <div @click="enviarRespAuto(1)" class="resp1 resps">
                        <span>{{ respAuto1 }}</span>
                    </div>
                    <div @click="enviarRespAuto(2)" class="resp2 resps">
                        <span>{{ respAuto2 }}</span>
                    </div>
                    <div @click="enviarRespAuto(3)" class="resp3 resps">
                        <span>{{ respAuto3 }}</span>
                    </div>
                </div>
            </div>
            <textarea id="textResposta" v-model="textResposta" style="resize: none;" class="divMensagem inputResposta" v-if="!respostaAuto"></textarea>
         </div>
         <button class="btnResponder btnContato" @click="respostaAuto ? escreverResposta() : enviarResposta(parsedContatos.id)"><b>{{ respostaAuto ? 'Responder' : 'Enviar resposta'}} </b></button>
         <button class="btnRespostaAuto btnContato" v-if="!respostaAuto" @click="setRespostaAuto()"><b>Respostas automáticas</b></button>
         <button class="btnExcluir btnContato" @click="deletarSolicitacao(parsedContatos.id)"><b>Excluir solicitação</b></button>
    </div>
</template>
  
<script>
export default {
    props: {
        contato: {
            type: String,
            required: true,
        },
        route_deletar_solicitacao: {
            type: String,
            required: true,
        },
        route_contatos: {
            type: String,
            required: true,
        },
        route_enviar_contato: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            respostaAuto: true,
            textResposta: '',
            respAuto1: 'Obrigado pelo contato, agradecemos a crítica e a mesma será levada em consideração!',
            respAuto2: 'Obrigado pelo contato, agradecemos os elogios!',
            respAuto3: 'Pode nos enviar mais detalhes sobre?',
        }
    },
    computed: {
        parsedContatos() {
            try {
                return JSON.parse(this.contato);
            } catch (error) {
                console.error('Erro ao fazer o parse dos contatos:', error);
                return [];
            }
        },
    },
    methods: {
        deletarSolicitacao(id) {
            axios.post(this.route_deletar_solicitacao, { id: id })
                .then(response => {
                    if(response) {
                        $('#' + id).css('display', 'none');
                        Swal.fire({
                            title: 'Deletado com sucesso!', 
                            text: 'O contato foi deletado com sucesso!', 
                            icon: 'success'
                        }).then((result) => {
                                if (result.isConfirmed) {
                                    location.assign(this.route_contatos);
                                }
                            });
                        
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
        escreverResposta() {
            this.respostaAuto = false;
        },
        enviarResposta(id, tipo = 'escrito') {
            if(this.textResposta == '') {
                Swal.fire({
                    title: 'Preencha o campo de resposta!', 
                    text: 'Para enviar uma resposta, é necessário encrevê-la no campo!', 
                    icon: 'warning'
                });
            } else {
                axios.post(this.route_enviar_contato, {id: id, mensagem: this.textResposta, destinatario: this.parsedContatos.email})
                    .then(response => {
                        if(response.data) {
                            Swal.fire({
                                title: 'Respondido com sucesso!', 
                                text: 'O contato foi respondido com sucesso!', 
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.assign(this.route_contatos);
                                }
                            });
                            
                        } else {
                            Swal.fire({
                                title: 'Ocorreu um erro!', 
                                text: 'Ocorreu um erro ao enviar a resposta!', 
                                icon: 'error'
                            });
                        }
                    }) 
                    .catch(errors => {
                        Swal.fire({
                            title: 'Ocorreu um erro!', 
                            text: 'Ocorreu um erro ao enviar a resposta!', 
                            icon: 'error'
                        });
                    })
            }
            if(tipo == 'auto') {
                this.textResposta = '';
            }
        },
        setRespostaAuto() {
            this.respostaAuto = true;
        },
        enviarRespAuto(numResp = 0) {
            if(numResp == 1) {
                this.textResposta = this.respAuto1;
            } else if(numResp == 2) {
                this.textResposta = this.respAuto2;
            } else if(numResp == 3) {
                this.textResposta = this.respAuto3;
            } else {
                Swal.fire({
                    title: 'Ocorreu um erro!', 
                    text: 'Ocorreu um erro ao enviar a resposta!', 
                    icon: 'error'
                });
            }
            if(this.textResposta != '') {
                this.enviarResposta(this.parsedContatos.id, 'auto');
            }
        }
    }
};
</script>

<style lang="scss">
    @import './style.scss';
</style>