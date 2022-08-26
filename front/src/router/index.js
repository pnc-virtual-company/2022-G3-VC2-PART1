import { createRouter, createWebHistory } from 'vue-router'

import NewRequest from '../views/student/NewRequestView.vue'
import StudentView from '../views/student/ListStudentLeaveView.vue'
import HomeView from '../views/HomeView.vue'
import ListAllStudentView from '../views/teacher/ListAllStudentView.vue'
import CheckStudentLeaveView from '../views/teacher/CheckStudentLeaveView.vue'
import ResetPasswordView from '../views/teacher/ResetPasswordView.vue'
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

    path: '/list_allStudent',
    name: 'list_allStudent',
    component: ListAllStudentView
  },
  {
    path: '/checkStudentLeave',
    name: 'checkStudentLeave',
    component: CheckStudentLeaveView
  },
  {
    path: '/reset_password',
    component: ResetPasswordView,
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
