export default {
    actions: {
        async fetchAllEmployees(context, url='/api/employee/index') {
            return axios.get(url)
                .then(response => {
                    context.commit('updateEmployees', response.data.data);
                    const paginator = Object.assign(response.data.meta, response.data.links);
                    context.commit('updatePaginator', paginator);
                })
        }, //todo Объединить в один метод
        async fetchEmployeesByDepartment(context, department_id, url='/api/employee/index/') {
            return axios.get(url + department_id)
                .then(response => {
                    context.commit('updateEmployees', response.data.data);
                    const paginator = Object.assign(response.data.meta, response.data.links);
                    context.commit('updatePaginator', paginator);
                })
        },
        async clearEmployees(context) {
            return context.commit('updateEmployees', []);
        },

        async pushEmployee(context) {
            return context;
        },
        async deleteEmployee() {

        }
    },
    mutations: {
        updateEmployees(state, employees) {
            state.employees = employees;
        },
        updatePaginator(state, paginator) {
            state.paginator = paginator;
        }
    },
    state: {
        employees: [],
        paginator: {},
    },
    getters: {
        getEmployees(state) {
            return state.employees;
        },
        getPaginator(state) {
            return state.paginator;
        }
    }
}
