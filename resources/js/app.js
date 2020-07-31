import Vue from 'vue';

import store from './store/index';
import router from './router';

import App from './components/App';

import Axios from "axios";

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    store,
});
