import { createRouter, createWebHistory } from 'vue-router'

// import StudentDetailLeave from '../views/StudentDetailView.vue'
import UserLogin from '../components/UserLogin.vue'
import NewRequest from '../views/student/NewRequestView.vue'
import StudentView from '../views/student/ListStudentLeaveView.vue'
import HomeView from '../views/HomeView.vue'
import PageNotFound from '../components/PageNotFound.vue'

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
      requireAuth: true,
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
    meta:{requireAuth:true}
  },
  {
    path: '/student_list',
    name: 'student_ist',
    component: StudentView,
    meta:{requireAuth:true}

  },
  {
    path: '/:pathMatch(.*)*',
    component: PageNotFound
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to, from, next) => {
  // console.log(to.meta.requireAuth)
  if (to.meta.requireAuth) {
    if (!localStorage.getItem("token") ) {
      next("/login");
    } else {
      next();
    }
  } 
  else {
    next();
  }
});


export default router
