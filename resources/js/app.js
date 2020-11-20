import Vue from 'vue'
import VueRouter from 'vue-router'
import '@fortawesome/fontawesome-free/css/all.css'
import 'vuetify/dist/vuetify.min.css'
import vuetify from './vuetify';
import App from '../views/App.vue'
import Home from '../views/Home.vue'
import Products from '../views/Products.vue'
import ProductsHistory from '../views/ProductsHistory.vue'
import money from 'v-money'
import VueMask from 'v-mask'

Vue.use(VueMask);
Vue.use(money, {precision: 2})
Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home,
        },
        {
            path: '/products',
            name: 'Products',
            component: Products,
        },
        {
            path: '/product-history',
            name: 'Products History',
            component: ProductsHistory,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    vuetify,
    router,
});
