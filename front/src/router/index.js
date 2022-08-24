import { createRouter, createWebHistory } from 'vue-router'

import NewRequest from '../views/NewRequestView.vue'
import StudentView from '../views/StudentView.vue'
import HomeView from '../views/HomeView.vue'
// import StudentDetailLeave from '../views/StudentDetailView.vue'
import UserLogin from '../views/UserLogin.vue'


const routes = [
  {
    path:"/",
    redirect:"/login"
  },
  {
    path: '/home',
    name:'Home',
    component: HomeView
  },
  {
    path: '/Login',
    name:'Login',
    component: UserLogin
  },
  {
    path: '/new_request',
    component: NewRequest
  },
  {
    path: '/student_list',
    name: 'student_ist',
    component: StudentView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
