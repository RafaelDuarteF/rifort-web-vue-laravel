 <div class="contato box" id="secao3">
    <h2>Contato</h2>
    <span>Se interessou? Entre em contato conosco para retirar dúvidas,
     iniciar o seu projeto conosco ou qualquer outro assunto pertinente!
    </span>
    <div class="contatoForm">
        <form action="{{ route('site.enviarContato') }}" id="formContato" method="POST">
            @csrf
            @method('PUT')
            <label>E-Mail:</label>
            <input class="email" type="text" name="email" value="{{ old('email') }}" placeholder="Email"/>
            <span>{{ !empty($errors->has('email')) ? $errors->first('email') : '' }}</span>
            <label>Assunto:</label>
            <textarea class="assunto" name="assunto" type="text" placeholder="Assunto">{{ old('assunto') }}</textarea>
            <span>{{ !empty($errors->has('assunto')) ? $errors->first('assunto') : '' }}</span>
            <label>Mensagem:</label>
            <textarea class="mensagem" name="mensagem" type="text" placeholder="Mensagem">{{ old('mensagem') }}</textarea>
            <span>{{ !empty($errors->has('mensagem')) ? $errors->first('mensagem') : '' }}</span>
            <button type="submit">Enviar</button>
        </form>
        <div class="infosContato">
            <img alt="RIFORT Bus" src="{{ asset($artsPath . 'rifortB.png ')}}"/>
            <!-- <span>E-Mail: <a>growebdevep@gmail.com</a></span> -->
        </div>
    </div>
</div>