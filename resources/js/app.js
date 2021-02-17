
require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'Vuex';
Vue.use(Vuex);


const store= new Vuex.Store({
    state:{
        item:{}
    },
    mutations:{
        setItem(state,obj){
            state.item=obj;
        }
    }
    });
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('topo', require('./components/Topo.vue').default);
Vue.component('painel', require('./components/Painel.vue').default);
Vue.component('caixa', require('./components/Caixa.vue').default);
Vue.component('migalha', require('./components/Migalhas.vue').default);
Vue.component('pagina', require('./components/Pagina.vue').default);
Vue.component('tabela_lista', require('./components/TabelaLista.vue').default);
Vue.component('lista_busca', require('./components/ListaBusca.vue').default);
Vue.component('formulario', require('./components/Formulario.vue').default);
Vue.component('modal', require('./components/modal/Modal.vue').default);
Vue.component('modal_link', require('./components/modal/Modal_link.vue').default);
Vue.component('migalhas', require('./components/Migalhas.vue').default);
Vue.component('lista_utilizador', require('./components/administracao/ListaUtilizadores.vue').default);
Vue.component('curso', require('./components/administracao/ListaCursos.vue').default);
Vue.component('cursos', require('./components/administracao/ListaCursoss.vue').default);
Vue.component('modulo', require('./components/administracao/ListaModulo.vue').default);
Vue.component('aula', require('./components/administracao/ListaAula.vue').default);
Vue.component('categoria', require('./components/administracao/ListaCat.vue').default);
Vue.component('sobre', require('./components/administracao/ListaSobre.vue').default);
Vue.component('banner', require('./components/administracao/ListaBanner.vue').default);
Vue.component('blog', require('./components/administracao/ListaBlog.vue').default);
Vue.component('formador', require('./components/administracao/ListaFormador.vue').default);
Vue.component('cursoss', require('./components/negocio/ListaCursos.vue').default);
Vue.component('perguntas', require('./components/administracao/Perguntas.vue').default);
Vue.component('lista_alunos', require('./components/administracao/ListAluno.vue').default);
Vue.component('contacto', require('./components/administracao/ListaContactos.vue').default);
Vue.component('newslater', require('./components/administracao/ListaNewslater.vue').default);
Vue.component('servicos', require('./components/administracao/ListaServicos.vue').default);
Vue.component('cat_blog', require('./components/administracao/ListCatBlog.vue').default);
Vue.component('aulamodulo', require('./components/administracao/Listaulasmodul.vue').default);
Vue.component('modulor', require('./components/administracao/ListaModup.vue').default);
Vue.component('ckeditor', require('vue-ckeditor2').default);

const app = new Vue({
    el: '#app',
    store,
    mounted:function(){
        console.log("ok");
        document.getElementById('app').style.display="block";
    }
    
});

