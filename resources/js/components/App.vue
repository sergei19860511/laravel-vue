<script setup>

</script>

<template>
    <div class="mt-1">
        <router-link class="m-lg-3" :to="{name: 'task.index'}">Все задачи</router-link>
        <router-link class="m-lg-3" :to="{name: 'task.create'}">Добавить новую</router-link>
        <router-view></router-view>
    </div>
</template>

<style scoped>

</style>
