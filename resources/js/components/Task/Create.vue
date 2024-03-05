<script>

export default {
    name: 'Create',
    data() {
        return {
            title: null,
            description: null
        }
    },
    methods: {
    }
}

</script>

<template>
    <div class="w-25 p-lg-5">
        <div class="mb-3">
            <input type="text" name="title" v-model="title" placeholder="Название задачи" class="form-control">
        </div>
        <div class="mb-3">
            <textarea name="description" v-model="description" placeholder="Описание задачи" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <input @click.prevent="$store.dispatch('store', {title, description})" type="submit" value="Добавить" class="btn btn-success">
        </div>
    </div>
</template>

<style scoped>

</style>
