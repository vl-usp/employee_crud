import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import EmplRoot from "./components/employee_page/EmplRoot";
import StructRoot from "./components/structure_page/StructRoot";

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'employee',
            component: EmplRoot,
        },
        {
            path: '/structure',
            name: 'structure',
            component: StructRoot,
        }
    ],
    mode: 'history',
});
