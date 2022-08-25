import { createRouter, createWebHistory } from 'vue-router'

import NewRequest from '../views/student/NewRequestView.vue'
import StudentView from '../views/student/ListStudentLeaveView.vue'
import HomeView from '../views/HomeView.vue'
import TeacherView from '../views/teacher/ListAllStudentView.vue'
import CheckStudentLeaveView from '../views/teacher/CheckStudentLeaveView.vue'

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
    component: TeacherView
  },
  {
    path: '/checkStudentLeave',
    name: 'checkStudentLeave',
    component: CheckStudentLeaveView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
