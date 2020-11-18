import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify';

Vue.use(VueRouter)
Vue.use(Vuetify);

import App from '../views/App.vue'
import Home from '../views/Home'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
