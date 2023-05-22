<template>
    <div class="contato box" id="secao3">
        <h2>Contato</h2>
        <span>Se interessou? Entre em contato conosco para retirar dúvidas,
        iniciar o seu projeto conosco ou qualquer outro assunto pertinente!
        </span>
        <div class="contatoForm">
            <form action="" id="formContato" method="POST">
                <label>E-Mail:</label>
                <input class="email" type="text" name="email" value="" placeholder="Email"/>
                <span></span>
                <label>Assunto:</label>
                <textarea class="assunto" name="assunto" type="text" placeholder="Assunto"></textarea>
                <span></span>
                <label>Mensagem:</label>
                <textarea class="mensagem" name="mensagem" type="text" placeholder="Mensagem"></textarea>
                <span></span>
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
    
}
</script>

<style scoped>
    @import './style.css';
</style>