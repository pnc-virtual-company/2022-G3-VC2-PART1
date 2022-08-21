
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/tailwind.css'
import FormRequest from './components/student/FormRequestView'
import StudentProfile from './components/StudentProfile.vue'


const app = createApp(App)

app.component('form-request', FormRequest)
app.component('student-profile', StudentProfile)

app.use(router).mount('#app')
