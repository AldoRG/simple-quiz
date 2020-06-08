let mutations = {
    ADD_QUESTIONS(state, questions) {
        state.questions = questions
    },
    ADD_ANSWER(state, answer) {
        state.answers.push(answer)
    },
    UPDATE_QUESTIONS(state, answers) {
        answers.forEach(function (answer, key) {
            let qindex = state.questions.findIndex(el => el.id == answer.question_id)
            let aindex = state.questions[qindex].options.findIndex(el => el.id == answer.answer_id)
            state.questions[qindex].options[aindex].class = answer.correct == true ? 'correct' : 'incorrect';
        });
    }
}
export default mutations
