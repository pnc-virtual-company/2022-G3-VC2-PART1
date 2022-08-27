
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/tailwind.css'
import FormRequest from './components/student/FormRequestView'
import UserLogin from './components/UserLogin.vue'


import FormResetPassword from './components/teacher/FormResetPassword'
import StudentLeave from '@/components/student/StudentLeave.vue';

const app = createApp(App)

app.component('student-leave', StudentLeave)
app.component('form-request', FormRequest)
app.component('user-login', UserLogin)
app.component('form-reset-password', FormResetPassword)
app.use(router).mount('#app')
