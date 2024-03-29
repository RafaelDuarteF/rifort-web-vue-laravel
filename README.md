# SISTEMA WEB DA RIFORT BUS

## Requisitos:

### Funcionais:
O sistema deverá:
* Consultar a lotação de ônibus específicos de São Paulo
* Consultar a previsão de chegada de ônibus específicos de São Paulo
* Consultar a localização em tempo real de ônibus específicos de São Paulo
* Todas as consultas estarão visíveis ao usuário após sua realização
* Para realizar as consultas, usuário deverá informar o número do ônibus, seu sentido e o ponto de parada desejado
* É possível solicitar contato ao suporte da RIFORT, informando e-mail, assunto e a mensagem. O mesmo será respondido no e-mail informado

### Não funcionais

* As requisições para contato deverão possuir limite máximo de 5 envios por sessão;
* A senha do usuário deverá ser armazenada no banco de dados criptografada;
* O sistema web deverá solicitar ao usuário acesso a sua localização para exibir no mapa, visando UX;
* O sistema deverá obter as informações necessárias gerais sobre os ônibus de São Paulo utilizando a API OlhoVivo, da SPTrans;
* O sistema deverá filtrar e automaticamente excluir solicitações de contato de usuários identificados como maliciosas ou indevidas;
* O sistema usará o MySql com o MySql Workbench para gerenciar o Banco de Dados;
* O sistema deverá ser compatível com IOS e Android
* O sistema será desenvolvido utilizando:
    1. Linguagens (programação/marcação/estilização) - Javascript, PHP, HTML, SCSS e SQL.
    2. Compiladores & Servers - Artisan, Vite
    3. Frameworks - Vue e Laravel
    4. ORM - Eloquent

## Case of use Diagram:

![Diagrama de caso de uso](https://github.com/RafaelDuarteF/rifort-web-vue-laravel/assets/103393497/50b8b661-60b2-4aa7-9b6d-8d64c1e8fb27)

# Fluxogram Diagram:

![Fluxograma de consulta RIFORT](https://github.com/RafaelDuarteF/rifort-web-vue-laravel/assets/103393497/3621e020-1292-4fc6-9548-8930d5fa2411)

Fluxograma do sistema de consulta RIFORT.

## Database

### Model Entity Relashionship

![MLR Rifort](https://github.com/RafaelDuarteF/rifort-web-vue-laravel/assets/103393497/352ee180-d02b-4c81-abf6-1ebf584700da)

### Class Diagram

![Diagrama de Classe RIFORT](https://github.com/RafaelDuarteF/rifort-web-vue-laravel/assets/103393497/dafff9b7-125a-467e-a290-225c9995083a)
