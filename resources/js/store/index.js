import {createStore} from "vuex";
import taskModule from './modules/task'

const store = createStore({
    modules: {
        task: taskModule
    }
})

export default store
