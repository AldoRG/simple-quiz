let actions = {
    GET_QUESTIONS({commit}) {
        axios.get('/api/questions')
            .then(response => {
                commit('ADD_QUESTIONS', response.data)
            })
            .catch(error => {
                console.log(error)
            })
    },
    SEND_ANSWERS({commit}, answers) {
        axios.post('/api/answers', answers)
            .then(response => {
                commit('UPDATE_QUESTIONS', response.data)
            })
            .catch(error => {
                console.log(error.response)
                commit('ADD_ERROR', error.response.data)
                commit('SET_FAILED', true)
            })
    },
}
export default actions
