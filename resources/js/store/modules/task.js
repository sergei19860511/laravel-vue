import axios from "axios";
import router from "../../router";

const state = {
    task: null,
    tasks: null
}

const getters = {
    task: state => {
        return state.task
    },
    tasks: state => {
        return state.tasks
    }
}

const actions = {
    getTask ({state, commit, dispatch}, id) {
        axios.get(`/api/task/${id}`)
            .then(response => {
                commit('setTask', response.data.data)
            })
    },
    all ({commit}) {
        axios.get('/api/get-task')
            .then(response => {
                commit('setTasks', response.data.data)
            })
    },
    deleteTask ({dispatch}, id) {
        axios.delete(`/api/task/${id}`)
            .then( response => {
                dispatch('all')
                router.push({name: 'task.index'})
            })
    },
    update ({}, data) {
        axios.patch(`/api/task/${data.id}`,
            {title: data.title, description: data.description, status: data.status})
            .then(response => {
                router.push({name: 'task.show', params: {id: data.id}})
            })
    },
    store({}, data) {
        axios.post('/api/add-task',
            {title: data.title, description: data.description})
            .then(response => {
                router.push({name: 'task.index'})
            })
    }
}

const mutations = {
    setTask (state, task) {
        state.task = task
    },
    setTasks (state, tasks) {
        state.tasks = tasks
    }
}

export default {
    state, getters, actions, mutations
}
