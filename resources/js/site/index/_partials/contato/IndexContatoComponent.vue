<template>
    <div class="contato box" id="secao4">
        <h2>Contato</h2>
        <span>Se interessou? Entre em contato conosco para retirar dúvidas,
        iniciar o seu projeto conosco ou qualquer outro assunto pertinente!
        </span>
        <div class="contatoForm">
            <form :action="route_contato" id="formContato" method="POST">
                <input type="hidden" name="_token" :value="csrf">
                <input type="hidden" name="_method" value="PUT">
                <label>E-Mail:</label>
                <input class="email" type="text" name="email" :value="old_contato_email ?? ''" placeholder="Email"/>
                <span>{{ erro_email ?? '' }}</span>
                <label>Assunto:</label>
                <textarea class="assunto" name="assunto" type="text" :value="old_contato_assunto ?? ''" placeholder="Assunto"></textarea>
                <span>{{ erro_assunto }}</span>
                <label>Mensagem:</label>
                <textarea class="mensagem" name="mensagem" type="text" :value="old_contato_mensagem ?? ''" placeholder="Mensagem"></textarea>
                <span>{{ erro_mensagem }}</span>
                <button type="submit">Enviar</button>
            </form>
            <div class="infosContato">
                <img alt="RIFORT Bus" :src="$store.state.paths.artsPath + '/rifortB.png'"/>
                <!-- <span>E-Mail: <a>growebdevep@gmail.com</a></span> -->
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        route_contato: {
            type: String,
            required: true,
        },
        csrf: {
            type: String,
            required: true,
        },
        erro_preenchimento: {
            type: String,
            required: false,
        },
        contato_enviado: {
            type: String,
            required: false,
        },
        erro_contato: {
            type: String,
            required: false,
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
        erro_max_contato: {
            type: String,
            required: false,
        }
    },
    mounted() {
        if(this.erro_preenchimento == '1') {
            $('html, body').animate({
                scrollTop: $('#formContato').offset().top + 450
            }, 1000);
        }
        else if(this.erro_contato == '1') {
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Ocorreu um erro ao enviar o contato. Por favor, tente novamente.',
            });
        }
        else if(this.contato_enviado == '1') {
            Swal.fire({
                icon: 'success',
                title: 'Contato realizado com sucesso!',
                text: 'Responderemos no E-Mail informado em até 48 horas.',
            });
        }
        else if(this.erro_max_contato == '1') {
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Número máximo de envios de contato atingido, tente novamente mais tarde!',
            });
        }
    }
}
</script>

<style scoped lang="scss">
    @import './style.scss';
</style>