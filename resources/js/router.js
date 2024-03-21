import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(''),
    routes: [
        {
            path: '/task',
            component: () => import('./components/Task/Index.vue'),
            name: 'task.index'
        },
        {
            path: '/task/create',
            component: () => import('./components/Task/Create.vue'),
            name: 'task.create'
        },
        {
            path: '/task/:id/edit',
            component: () => import('./components/Task/Edit.vue'),
            name: 'task.edit'
        },
        {
            path: '/task/:id',
            component: () => import('./components/Task/Show.vue'),
            name: 'task.show'
        },
    ]
})

export default router
