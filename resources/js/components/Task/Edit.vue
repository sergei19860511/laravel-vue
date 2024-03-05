<script>

    export default {
        name: 'Edit',
        mounted() {
            this.$store.dispatch('getTask', this.$route.params.id)
        },
        methods: {
        },
        computed: {
            isChecked () {
                return this.task.title && this.task.description && (this.task.status === '0' || this.task.status === '1')
            },
            task() {
                return this.$store.getters.task
            }
        }
    }
</script>

<template>
    <div class="w-25 p-lg-5" v-if="task">
        <div class="mb-3">
            <input type="text" name="title" v-model="task.title" placeholder="Название задачи" class="form-control">
        </div>
        <div class="mb-3">
            <textarea name="description" v-model="task.description" placeholder="Описание задачи" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <select class="form-control" v-model="task.status">
                <option value=""></option>
                <option value="0">Не выполнено</option>
                <option value="1">Выполнено</option>
            </select>
        </div>
        <div class="mb-3">
            <input :disabled="!isChecked" @click.prevent="$store.dispatch('update', {id: task.id, title: task.title, description: task.description, status: task.status})" type="submit" value="Сохранить" class="btn btn-success">
        </div>
    </div>
</template>

<style scoped>

</style>
