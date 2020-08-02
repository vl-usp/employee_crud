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

        async putEmployee(context, params) {
            await axios.put('/api/employee/store', params)
            .then(function (response) {
                alert('Сотрудник нанят');
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        async patchEmployee(context, id, params) {
            await axios.patch('/api/employee/update/' + id, params)
                .then(function (response) {
                    alert('Данные сотрудника изменены')
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        async deleteEmployee(context, id) {
            await axios.delete('/api/employee/destroy/' + id)
                .then(function (response) {
                    alert('Сотрудник уволен');
                    this.updateEmployees()
                })
                .catch(function (error) {
                    console.log(error);
                });
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
