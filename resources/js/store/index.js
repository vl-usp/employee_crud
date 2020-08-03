import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import employee from "./modules/employee";
import department from "./modules/department";
import position from "./modules/position";
import structure from "./modules/structure";

export default new Vuex.Store({
    modules: {
        employee,
        department,
        position,
        structure
    },
});
