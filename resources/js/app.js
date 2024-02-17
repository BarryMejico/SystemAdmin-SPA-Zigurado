import './bootstrap';


import {createApp} from 'vue'

import App from '../vueTemplate/App.vue'

import router from './routes.js'

createApp(App)
.use(router)
.mount("#app")