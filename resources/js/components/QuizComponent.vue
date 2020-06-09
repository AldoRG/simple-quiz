<template>
    <div>
        <div>
            <div v-if="failed" class="text-danger">
                <h4>Errors</h4>
                <ul>
                    <li v-for="error in errors">
                        {{error}}
                    </li>
                </ul>
            </div>
            <div v-for="(question, index) in questions">
                <label class="control-label">{{ index+1 }}.- {{ question.question_text }}</label>
                <div class="options" v-for="option in question.options" :key="option.id">
                    <div class="custom-control custom-radio" :class="option.class">
                        <input
                            :name="'radio' + question.id"
                            class="custom-control-input"
                            v-on:change="questionChecked(question.id, option.id)"
                            type="radio" :id="'radio' + question.id + '-' + option.id"
                            :value="option.id"
                            required>
                        <label class="custom-control-label" :for="'radio' + question.id + '-' + option.id">{{ option.answer }}</label>
                    </div>
                </div>
                <hr>
            </div>
            <button class="btn btn-primary btn-lg btn-block" v-if="!answered" @click="sendAnswers">Send Answers</button>
            <a href="/home" class="btn btn-info btn-lg btn-block" v-if="answered" @click="retake">Re Take Quiz</a>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from "vuex"
    export default {
        name: "QuizComponent",
        data(){
            return {
                answered: false
            }
        },
        props: ['user'],
        methods: {
            questionChecked(questionId, answerId) {
                this.$store.commit('ADD_ANSWER', {
                    'question_id': questionId,
                    'answer_id': answerId
                })
            },
            sendAnswers() {
                if (this.answers.length >= 10) {
                    this.$store.commit('SET_FAILED', false)
                    this.$store.commit('CLEAR_ERRORS')
                    this.$store.dispatch('SEND_ANSWERS', {'user': this.user, 'answers': this.answers});
                    this.answered = true
                } else {
                    this.$store.commit('ADD_ERROR', 'Please fill all questions with their respective answer')
                    this.$store.commit('SET_FAILED', true)
                }
            },
            retake() {

            }
        },
        mounted() {
            this.$store.dispatch('GET_QUESTIONS')
        },
        computed: {
            ...mapGetters(['questions', 'answers', 'failed', 'errors'])
        }
    }
</script>

<style scoped>
    .correct {
        background-color: green;
    }
    .incorrect {
        background-color: red;
    }
</style>
