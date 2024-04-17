<script>
export default {
    name: 'Create',
    data() {
        return {
            title: null,
            description: null,
            errorTitle: null,
            errorDescription: null,
            message: null
        }
    },
    // блок watch, который отслеживает изменения маршрута.
    // При изменении маршрута он проверяет наличие ошибок в параметрах запроса и обновляет их в компоненте.
    watch: {
        $route(to, from) {
            if (to.query.errorTitle) {
                this.errorTitle = to.query.errorTitle;
                this.message = to.query.message;
            }
            else if (to.query.errorDescription) {
                this.errorDescription = to.query.errorDescription;
                this.message = to.query.message;
            }
            else {
                this.errorTitle = null;
                this.errorDescription = null;
                this.message = null;
            }
        },
    },
}
</script>

<template>
    <div class="w-25 p-lg-5">
        <div v-if="errorTitle">
            <div class="alert alert-danger" role="alert">
                <strong>{{ message }}</strong>
            </div>
        </div>
        <div class="mb-3">
            <input type="text" name="title" v-model.trim="title" placeholder="Название задачи" class="form-control">
        </div>
        <div v-if="errorDescription">
            <div class="alert alert-danger" role="alert">
                <strong>{{ message }}</strong>
            </div>
        </div>
        <div class="mb-3">
            <textarea name="description" v-model.trim="description" placeholder="Описание задачи" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <input @click.prevent="$store.dispatch('store', {title, description})" type="submit" value="Добавить" class="btn btn-success">
        </div>
    </div>
</template>

<style scoped>
</style>
