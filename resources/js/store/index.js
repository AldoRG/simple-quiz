import Vue from "vue"
import VueX from "vuex"
import actions from "./actions"
import mutations from "./mutations"
import getters from "./getters"
import state from "./state"

Vue.use(VueX)

export default new VueX.Store({
    state,
    mutations,
    getters,
    actions
})
