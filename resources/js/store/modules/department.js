export default {
    actions: {
        async fetchDepartments(context) {
            return axios.get('/api/department/index')
                .then(response => {
                    context.commit('SET_DEPARTMENTS', response.data.data);
                })
        },
    },
    mutations: {
        SET_DEPARTMENTS(state, departments) {
            state.departments = departments;
        },
    },
    state: {
        departments: [],
    },
    getters: {
        getDepartments(state) {
            return state.departments;
        },
    }
}
