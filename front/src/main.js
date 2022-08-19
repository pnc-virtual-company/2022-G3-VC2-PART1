
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/tailwind.css'
import FormRequest from './components/student/FormRequestView'


const app = createApp(App)

app.component('form-request', FormRequest)

app.use(router).mount('#app')
