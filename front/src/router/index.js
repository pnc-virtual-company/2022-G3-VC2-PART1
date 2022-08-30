import { createRouter, createWebHistory } from 'vue-router'
// import StudentDetailLeave from '../views/StudentDetailView.vue'
import UserLogin from '../components/UserLogin.vue'
import NewRequest from '../views/student/NewRequestView.vue'
import HomeView from '../views/HomeView.vue'
import PageNotFound from '../components/PageNotFound.vue'
import StudentView from '../views/student/ListStudentLeaveView.vue'
import ListAllStudentView from '../views/teacher/ListAllStudentView.vue'
import CheckStudentLeaveView from '../views/teacher/CheckStudentLeaveView.vue'
import ResetPasswordView from '../views/teacher/ResetPasswordView.vue'
import Teacher from '../components/teacher/TeacherHome.vue'

const routes = [
  {
    path:"/",
    redirect:"/login"
  },
  {
    path: '/home',
    name:'home',
    component: HomeView,
    meta:{
      requireAuth:true,
    }
    
  },
  {
    path: '/teacher',
    name:'teacher',
    component: Teacher,
    meta:{
      requireAuth: true,
      user_login:'teacherLogin'
    },
    
  },
  {
    path: '/list_all_students',
    name:'teacher_manage',
    component: ListAllStudentView,
    meta:{
      requireAuth: true,
      user_login:'teacherLogin'
    },
    
  },
  {
    path: '/teacher',
    name:'teacher',
    component: Teacher,
    meta:{
      requireAuth: true,
      role:'teacher'
    },
    
  },
  {
    path: '/login',
    name:'login',
    component: UserLogin,
    meta:{
      requireAuth: false,
    }
  },
  {
    path: '/new_request',
    component: NewRequest,
    meta:{
      requireAuth:true,
      role:'student',
      user_login:'studentLogin'

    }
  },
  {
    path: '/list_student_leave',
    name: 'student_list',
    component: StudentView,
    meta:{
      requireAuth:true,
      user_login:'studentLogin'
    }
  },
  {
    path: '/:pathMatch(.*)*',
    component: PageNotFound
  },
  {
    path: '/check_student_leave',
    name: 'checkStudentLeave',
    component: CheckStudentLeaveView
  },
  {
    path: '/reset_password',
    component: ResetPasswordView,
    meta:{requireAuth:true}
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to, from, next) => {
  console.log(to.meta.requireAuth)
  console.log(!localStorage.getItem("token"))
  let userLogin = localStorage.getItem('role')
  if (to.meta.requireAuth) {
    console.log(to.path)
    if (!localStorage.getItem("token") ) {
      next("/login");
    }
    else if (to.meta.user_login == userLogin) {
      next();
    } else if (to.path =="/reset_password" || to.path == "/home"){
      next();
    }
    else{
      next('/login')
    }
  } 
  else{
    next()
  }
  
  
});





export default router
