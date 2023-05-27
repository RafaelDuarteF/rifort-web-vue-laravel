<template>
    <div class="loginWrapper" v-if="$store.state.paths.videosPath">
        <video autoplay muted loop>
            <source :src="$store.state.paths.videosPath + '/fundo2.mp4'" type="video/mp4"/>
        </video>
        <div class="gLogin">
            <div class="card-login">
                <h1>Login</h1>
                <form :action="route_logar" id="formLogin" method="POST">
                    <input type="hidden" name="_token" :value="csrf">
                    <label>Nome:</label>
                    <input type="text" name="name" :value="old_nome" placeholder="Nome de usuário"/>
                    <span class="errosLogin" v-if="erro_nome" style="color: #fc9a5d; margin: 10px; font-size: 11pt;">{{ erro_nome }}</span>
                    <label class="senhaLogin">Senha:</label>
                    <input type="password" name="password" placeholder="Senha"/>
                    <span class="errosLogin" v-if="erro_senha" style="color: #fc9a5d; margin: 10px; font-size: 11pt;">{{ erro_senha }}</span>
                    <button class="buttonSubmit" type="submit">LOGAR</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            videos: {
                type: String,
                required: true
            },
            route_logar: {
                type: String,
                required: true
            },
            csrf: {
                type: String,
                required: true,
            },
            erro_autenticacao: {
                type: String,
                required: false,
            },
            erro_conexao: {
                type: String,
                required: false,
            },
            erro_nome: {
                type: String,
                required: false,
            },
            erro_senha: {
                type: String,
                required: false,
            },
            old_nome: {
                type: String,
                required: false,
            }
        },
        mounted() {
            this.$store.commit('SET_VIDEOS_PATH', this.videos);
            if(this.erro_autenticacao == '1') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ocorreu um erro de autenticação!',
                    text: 'As credenciais informadas estão incorretas.',
                });
            }
            else if(this.erro_conexao == '1') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ocorreu um erro!',
                    text: 'Ocorreu um erro, tente novamente mais tarde.',
                });
            }
        }
    }
</script>
<style lang="scss">
    @import './style.scss';
</style>