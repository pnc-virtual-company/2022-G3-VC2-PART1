
import { createApp } from 'vue'
import App from './App.vue'
import './index.css'
import 'flowbite';
import router from './router'
import './assets/tailwind.css'
import FormRequest from './components/student/FormRequestView'
import UserLogin from './components/teacher/UserLogin.vue'
import UserDetails from '@/components/UserDetailView.vue'
import ListStudentLeave from '@/components/teacher/ListStudentLeave.vue';
import FormResetPassword from './components/teacher/FormResetPassword'
import StudentLeave from '@/components/student/StudentLeave.vue';
import { createPinia } from 'pinia'
import AlertView from '@/components/student/AlertView.vue';
const app = createApp(App).use(createPinia())

app.component('liststudent-leave',ListStudentLeave)
app.component('user-detail', UserDetails)
app.component('form-alert', AlertView)
app.component('student-leave', StudentLeave)
app.component('form-request', FormRequest)
app.component('user-login', UserLogin)
app.component('form-reset-password', FormResetPassword)
app.use(router).mount('#app')
