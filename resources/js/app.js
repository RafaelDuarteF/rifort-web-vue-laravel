import './bootstrap';
import { createApp } from 'vue';
import { createStore } from 'vuex';

const store = createStore({
    state: {
        paths: {
            participantesPath: '',
            artsPath: '',
            videosPath: ''
        }
    },
    mutations: {
        SET_PARTICIPANTES_PATH(state, participantesPath) {
            state.paths.participantesPath = participantesPath;
        },
        SET_ARTS_PATH(state, artsPath) {
            state.paths.artsPath = artsPath;
        },
        SET_VIDEOS_PATH(state, videosPath) {
            state.paths.videosPath = videosPath;
        }
    }
});
const app = createApp({});

// Index Components
import IndexComponent from './site/index/IndexComponent.vue';
import IndexSobreNosComponent from './site/index/_partials/sobreNos/IndexSobreNosComponent.vue';
import IndexContatoComponent from './site/index/_partials/contato/IndexContatoComponent.vue';
app.component('index-component', IndexComponent);
app.component('index-sobre-nos-component', IndexSobreNosComponent);
app.component('index-contato-component', IndexContatoComponent);

// Projeto Components
import ProjetoComponent from './site/projeto/ProjetoComponent.vue';
app.component('projeto-component', ProjetoComponent);

// Login Components
import LoginComponent from './site/login/LoginComponent.vue';
app.component('login-component', LoginComponent);

// Aplicação Components
import AplicacaoComponent from './site/aplicacao/AplicacaoComponent.vue';
app.component('aplicacao-component', AplicacaoComponent);

app.use(store);
app.mount("#app");