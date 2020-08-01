export default {
    actions: {
        async fetchDepartments(context) {
            return axios.get('/api/department/index')
                .then(response => {
                    context.commit('updateDepartments', response.data.data);
                })
        },
        async clearDepartments(context) {
            return context.commit('updateDepartments', []);
        },
    },
    mutations: {
        updateDepartments(state, departments) {
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
