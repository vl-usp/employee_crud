export default {
    actions: {
        async fetchStructure(context) {
            return axios.get('/api/structure/index')
                .then(response => {
                    context.commit('updateStructure', response.data.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
    mutations: {
        updateStructure(state, structure) {
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
