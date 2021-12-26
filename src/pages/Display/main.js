import { createApp } from 'vue';
import App from './App.vue';
import axios from 'axios'
import VueAxios from 'vue-axios'
import router from '../../router/' 
// <---


const app = createApp(App)
app.use(router)
app.use(VueAxios, axios)
// app.use(axios)
app.mount('#app')

// createApp(App).use(VueAxios, axios, router).mount('#app')
