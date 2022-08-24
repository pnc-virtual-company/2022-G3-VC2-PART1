import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import NewRequest from '../views/student/NewRequestView.vue'
import StudentView from '../views/student/ListStudentLeaveView.vue'

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
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
