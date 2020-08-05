export default {
    actions: {
        async fetchAllEmployees(context, url='/api/employee/index') {
            return axios.get(url)
                .then(response => {
                    const director = response.data.data.filter(obj => (obj.position.id === 1));
                    const managers = response.data.data.filter(obj => (obj.position.id === 2));
                    const employees = response.data.data;
                    const paginator = Object.assign(response.data.meta, response.data.links);
                    context.commit('SET_EMPLOYEES', employees);
                    context.commit('SET_PAGINATOR', paginator);
                    context.commit('SET_DIRECTOR', director);
                    context.commit('SET_MANAGERS', managers);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        async fetchEmployeesByDepartment(context, department_id, url='/api/employee/index/') {
            return axios.get(url + department_id)
                .then(response => {
                    const employees = response.data.data;
                    const paginator = Object.assign(response.data.meta, response.data.links);
                    context.commit('SET_EMPLOYEES', employees);
                    context.commit('SET_PAGINATOR', paginator);
                }).catch(function (error) {
                    console.log(error);
                });
        },

        async fetchDirector(context, url='/api/employee/director/index') {
            return axios.get(url)
                .then(response => {
                    context.commit('SET_DIRECTOR', response.data.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        async fetchManagers(context, url='/api/employee/managers/index') {
            return axios.get(url)
                .then(response => {
                    context.commit('SET_MANAGERS', response.data.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        async storeEmployee(context, params) {
            axios.put('/api/employee/store', params)
            .then(

            )
            .catch(function (error) {
                console.log(error);
            });
        },
        async updateEmployee(context, [id, params]) {
            axios.patch('/api/employee/update/' + id, params)
                .catch(function (error) {
                    console.log(error);
                });
        },
        async destroyEmployee(context, id) {
            axios.delete('/api/employee/destroy/' + id)
                .then(

                )
                .catch(function (error) {
                    console.log(error);
                });
        }
    },
    mutations: {
        SET_EMPLOYEES(state, employees) {
            state.employees = employees;
        },
        SET_DIRECTOR(state, director) {
            state.director = director;
        },
        SET_MANAGERS(state, managers) {
            state.managers = managers;
        },
        SET_PAGINATOR(state, paginator) {
            state.paginator = paginator;
        }
    },
    state: {
        employees: [],
        director: {
            id: 1,
            boss_id: null,
            department_id: null,
            position_id: null,
            fio: '',
            phone: '',
        },
        managers: [],
        paginator: {
            current_page: 1,
            first: '',
            from: 1,
            last: '',
            last_page: 1,
            next: '',
            path: '',
            per_page: 0,
            prev: null,
            to: 0,
            total: 0,
        },
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
        getManagerByDepartment: state => departmentId => {
            return state.managers.filter(obj => (obj.department.id === departmentId));
        },
        getPaginator(state) {
            return state.paginator;
        }
    }
}
