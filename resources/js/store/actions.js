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
                console.log(error)
            })
    },
}
export default actions
