let getters = {
    questions: state => {
        return state.questions
    },
    answers: state => {
        return state.answers
    },
    errors: state => {
        return state.errors
    },
    failed: state => {
        return state.failed
    }
}
export default getters
