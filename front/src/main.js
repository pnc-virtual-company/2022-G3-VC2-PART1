
import { createApp } from 'vue'
import App from './App.vue'
import './index.css'
import 'flowbite';
import router from './router'
import './assets/tailwind.css'
import FormRequest from './components/student/FormRequestView'
import FormResetPassword from './components/teacher/FormResetPassword'

const app = createApp(App)

app.component('form-request', FormRequest)
app.component('form-reset-password', FormResetPassword)
app.use(router).mount('#app')
