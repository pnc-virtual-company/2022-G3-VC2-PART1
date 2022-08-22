import { createRouter, createWebHistory } from 'vue-router'

import NewRequest from '../views/NewRequestView.vue'
import StudentView from '../views/StudentView.vue'
import HomeView from '../views/HomeView.vue'
import StudentDetailLeave from '../views/StudentDetailView.vue'


const routes = [
  {
    path: '/',
    component: HomeView
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
  {
    path: '/student_detailLeave',
    name: 'student_detailLeave',
    component: StudentDetailLeave
  },
  // { path: '/student_list/:studentID', component: StudentDetailLeave },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
