<script>
    import axios from "axios";

    export default {
        name: 'Index',
        mounted () {
            let selectStatus = document.getElementById('status')
            let selectCreatedAt = document.getElementById('created_at')

            selectStatus.onchange = () => {
                this.searchFilter(selectStatus.id, selectStatus.value);
            };
            selectCreatedAt.onchange = () => {
                this.searchFilter(selectCreatedAt.id, selectCreatedAt.value);
            };
            this.$store.dispatch('all')
        },
        methods: {
            searchFilter (id, value) {
                axios.get('/api/filter-task?'+id + '=' + value)
                    .then(response => {
                        this.$store.commit('setTasks', response.data.data)
                    })
            },
            checkStatus (status) {
                return status ? 'Выполнено' : 'Не выполнено'
            }
        },
        computed: {
            tasks() {
                return this.$store.getters.tasks
            }
        }
    }
</script>

<template>
    <div class="container">
        <div class="row justify-content-center p-3">
            <div class="col-auto">
                <p>Фильтровать по статусу</p>
                <select id="status" class="form-select">
                    <option value=""></option>
                    <option value="0">Не выполнено</option>
                    <option value="1">Выполнено</option>
                </select>
            </div>
            <div class="col-auto">
                <p>Фильтровать по дате создания</p>
                <select id="created_at" class="form-select">
                    <option value=""></option>
                    <option value="DESC">Новые</option>
                    <option value="ASC">Старые</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 p-lg-5">
            <table class="table table-hover table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Статус выполнения</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Изменить</th>
                    <th scope="col">Удалить</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="task in tasks">
                    <th scope="row">{{ task.id }}</th>
                    <td>
                        <router-link :to="{name: 'task.show', params: {id: task.id}}">{{ task.title }}</router-link>
                    </td>
                    <td>{{ task.description }}</td>
                    <td>{{ checkStatus (task.status) }}</td>
                    <td>{{ task.created_at }}</td>
                    <td><router-link :to="{ name: 'task.edit', params: {id: task.id}}" class="btn btn-outline-primary">Изменить</router-link></td>
                    <td><a @click.prevent="$store.dispatch('deleteTask', task.id)" href="#" class="btn btn-outline-danger">Удалить</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>

</style>
