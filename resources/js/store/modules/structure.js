export default {
    actions: {
        async fetchStructure(context) {
            return axios.get('/api/structure/index')
                .then(response => {
                    context.commit('SET_STRUCTURE', response.data.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
    mutations: {
        SET_STRUCTURE(state, structure) {
            state.structure = structure;
        },
    },
    state: {
        structure: {
            id: 0,
            fio: '',
            phone: '',
            position: {
                id: 0,
                title: '',
            },
            department: {
                id: 0,
                title: '',
            },
            subjects: {}
        },
    },
    getters: {
        getStructure(state) {
            return state.structure;
        },
    }
}
