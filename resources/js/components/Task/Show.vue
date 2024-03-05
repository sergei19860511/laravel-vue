<script>

export default {
    name: 'Show',
    mounted() {
        this.$store.dispatch('getTask', this.$route.params.id)
    },
    methods: {
        checkStatus (status) {
            return status ? 'Выполнено' : 'Не выполнено'
        }
    },
    computed: {
        task() {
            return this.$store.getters.task
        }
    }
}
</script>

<template>
    <div class="card" style="width: 35rem;">
        <div v-if="task" class="card-body">
            <h5 class="card-title"><b>Название:</b> {{ task.title }}</h5>
            <p class="card-text"><b>Описание:</b> {{ task.description }}</p>
            <p class="card-text"><b>Статус:</b> {{ checkStatus(task.status) }}</p>
            <router-link :to="{name: 'task.edit', params: {id: task.id}}" class="card-link">Редактировать задачу</router-link>
            <a @click.prevent="$store.dispatch('deleteTask', task.id)" href="#" class="card-link">Отменить задачу</a>
        </div>
    </div>
</template>

<style scoped>

</style>
