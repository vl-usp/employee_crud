import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production'

import employee from "./modules/employee";
import department from "./modules/department";
import position from "./modules/position";

export default new Vuex.Store({
    modules: {
        employee,
        department,
        position
    },
    strict: debug,
});
