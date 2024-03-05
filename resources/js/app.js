
import {createApp} from 'vue';
import App from "./components/App.vue";
import store from "./store";
import router from './router'
import './bootstrap.js';

const app = createApp(App)
app.use(store)
app.use(router)
app.mount('#app')
