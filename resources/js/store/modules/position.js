export default {
    actions: {
        async fetchPositions(context) {
            return axios.get('/api/position/index')
                .then(response => {
                    context.commit('SET_POSITIONS', response.data.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
    mutations: {
        SET_POSITIONS(state, positions) {
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
        getPositionsForEmployee(state) {
            return state.positions.filter(obj => (obj.value > 1))
        }
    }
}
