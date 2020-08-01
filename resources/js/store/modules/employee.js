export default {
    actions: {
        async fetchAllEmployees(context) {
            return axios.post('/api/categories')
                .then(response => {
                    context.commit('updateCategories', response.data['data']);
                })
        },
        async fetchEmployeesByDepartment() {
            return axios.post('/api/categories')
                .then(response => {
                    context.commit('updateCategories', response.data['data']);
                })
        },
        async clearEmployees(context) {
            return context.commit('updateCategories', []);
        },

        async createEmployee() {

        },
        async deleteEmployee() {

        }
    },
    mutations: {
        updateEmployees(state, employees) {
            state.employees = employees;
        }
    },
    state: {
        employees: []
    },
    getters: {
        getEmployees(state) {
            return state.employees;
        }
    }
}
