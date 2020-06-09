let mutations = {
    ADD_QUESTIONS(state, questions) {
        state.questions = questions
    },
    ADD_ANSWER(state, answer) {
        let index = state.answers.findIndex(el => el.question_id == answer.question_id)
        if (state.answers.length != 0 && index != -1) {
            state.answers.splice(index, 1, answer);
        } else {
            state.answers.push(answer)
        }
    },
    UPDATE_QUESTIONS(state, answers) {
        answers.forEach(function (answer, key) {
            let qindex = state.questions.findIndex(el => el.id == answer.question_id)
            let aindex = state.questions[qindex].options.findIndex(el => el.id == answer.answer_id)
            state.questions[qindex].options[aindex].class = answer.correct == true ? 'correct' : 'incorrect';
        });
    },
    ADD_ERROR(state, error) {
        state.errors.push(error)
    },
    CLEAR_ERRORS(state) {
        state.errors = {}
    },
    SET_FAILED(state, failed) {
        state.failed = failed
    }
}
export default mutations
