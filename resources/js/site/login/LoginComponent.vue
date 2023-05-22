<template>
    <div class="loginWrapper">
        <video autoplay muted loop>
            <source :src="$store.state.paths.videosPath + '/fundo2.mp4'" type="video/mp4"/>
        </video>
        <div class="gLogin">
            <div class="card-login">
                <h1>Login</h1>
                <form :action="route_logar" id="formLogin" method="POST">
                    <label>Nome:</label>
                    <input type="text" name="name" value="" placeholder="Nome de usuário"/>
                    <label class="senhaLogin">Senha:</label>
                    <input type="password" name="password" placeholder="Senha"/>
                    <button class="buttonSubmit" type="submit">LOGAR</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['videos', 'route_logar'],
        mounted() {
            this.$store.commit('SET_VIDEOS_PATH', this.videos);
        }
    }
</script>
<style>
    @import './style.css';
</style>