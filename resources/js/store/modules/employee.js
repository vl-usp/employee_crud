export default {
    actions: {
        fetchAllEmployees(context, url='/api/employee/index') {
            return axios.get(url)
                .then(response => {
                    const paginator = Object.assign(response.data.meta, response.data.links);
                    const director = response.data.data.filter(obj => (obj.position.id === 1));
                    const managers = response.data.data.filter(obj => (obj.position.id === 2));
                    context.commit('updateEmployees', response.data.data);
                    context.commit('updatePaginator', paginator);
                    context.commit('updateDirector', director);
                    context.commit('updateManagers', managers);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        fetchEmployeesByDepartment(context, department_id, url='/api/employee/index/') {
            return axios.get(url + department_id)
                .then(response => {
                    const paginator = Object.assign(response.data.meta, response.data.links);
                    context.commit('updateEmployees', response.data.data);
                    context.commit('updatePaginator', paginator);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        fetchDirector(context, url='/api/employee/director/index') {
            return axios.get(url)
                .then(response => {
                    context.commit('updateDirector', response.data.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        fetchManagers(context, url='/api/employee/managers/index') {
            return axios.get(url)
                .then(response => {
                    context.commit('updateManagers', response.data.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        storeEmployee(context, params) {
            axios.put('/api/employee/store', params)
            .then(function (response) {

            })
            .catch(function (error) {
                console.log(error);
            });
        },
        updateEmployee(context, [id, params]) {
            axios.patch('/api/employee/update/' + id, params)
                .then(function (response) {

                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        destroyEmployee(context, id) {
            axios.delete('/api/employee/destroy/' + id)
                .then(function (response) {

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
        updateDirector(state, director) {
            state.director = director;
        },
        updateManagers(state, managers) {
            state.managers = managers;
        },
        updatePaginator(state, paginator) {
            state.paginator = paginator;
        }
    },
    state: {
        employees: [],
        director: {},
        managers: [],
        paginator: {},
    },
    getters: {
        getEmployees(state) {
            return state.employees;
        },
        getDirector(state) {
            return state.director;
        },
        getManagers(state) {
            return state.managers;
        },
        getPaginator(state) {
            return state.paginator;
        }
    }
}
