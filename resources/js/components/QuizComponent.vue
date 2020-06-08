<template>
    <div>
        <div>
            <div v-for="(question, index) in questions">
                <label class="control-label">{{ index+1 }}.- {{ question.question_text }}</label>
                <div class="options" v-for="option in question.options" :key="option.id">
                    <div class="custom-control custom-radio" :class="option.class">
                        <input
                            :name="'radio' + question.id"
                            class="custom-control-input"
                            v-on:change="questionChecked(question.id, option.id)"
                            type="radio" :id="'radio' + question.id + '-' + option.id"
                            :value="option.id">
                        <label class="custom-control-label" :for="'radio' + question.id + '-' + option.id">{{ option.answer }}</label>
                    </div>
                </div>
                <hr>
            </div>
            <button class="btn-info" v-if="!answered" @click="sendAnswers">Send Answers</button>
            <button class="btn-info" v-if="answered" @click="retake">Re Take Quiz</button>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from "vuex"
    export default {
        name: "QuizComponent",
        data(){
            return {
                answered: false,
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
                this.$store.dispatch('SEND_ANSWERS', {'user': this.user, 'answers': this.answers});
                this.answered = true
            }
        },
        mounted() {
            this.$store.dispatch('GET_QUESTIONS')
        },
        computed: {
            ...mapGetters(['questions', 'answers'])
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
