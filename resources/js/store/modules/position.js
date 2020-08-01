export default {
    actions: {
        async fetchPositions(context) {
            return axios.get('/api/position/index')
                .then(response => {
                    context.commit('updatePositions', response.data.data);
                })
        },
        async clearPositions(context) {
            return context.commit('updatePositions', []);
        },
    },
    mutations: {
        updatePositions(state, positions) {
            state.positions = positions;
        },
    },
    state: {
        positions: [],
    },
    getters: {
        getPositions(state) {
            return state.positions;
        },
    }
}
