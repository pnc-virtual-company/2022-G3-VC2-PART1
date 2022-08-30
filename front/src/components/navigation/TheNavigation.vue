<template>




<nav  class="flex sticky -top-2 bg-blue-400 border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
  <div class="container flex flex-wrap justify-between items-center mx-auto">
  <router-link to="/home" class="flex items-center">
      <img src="../../assets/logo.png" class="mr-3 h-9 sm:h-11" alt="Flowbite Logo">
      <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">SLMS</span>
  </router-link>
  <div class="flex items-center md:order-2">
      <button type="button" class="flex mr-3 text-md bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 border-2 h-8 rounded-full" src="https://i.ytimg.com/vi/O-0DOb1_Grw/sddefault.jpg" alt="user photo">
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-blue-400 rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 block" id="user-dropdown"  style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(644px, 82px);">
        <div class="py-3 px-4">
          <span class="block text-md text-white dark:text-white">Name:   {{studentData.first_name}} {{studentData.last_name}}</span>
          <span class="block text-md font-medium text-white truncate dark:text-gray-400">Email:  {{studentData.email}}</span>
        </div>
        <ul class="py-1" aria-labelledby="user-menu-button">
          <li class="flex hover:bg-gray-100 items-center p-1">
            <img class="w-7 h-7 rounded-full cursor-pointer" src="https://cdn4.iconfinder.com/data/icons/iready-basic-vol-2/28/003_065_show_more_details_menu1x-512.png" alt="user photo">
            <a href="#" class="block py-2 px-4 text-md text-gray-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Show Details</a>
          </li>
          <li class="flex hover:bg-gray-100 items-center p-1">
            <img class="w-7 h-7 rounded-full cursor-pointer" src="https://uxwing.com/wp-content/themes/uxwing/download/web-app-development/change-password-icon.png" alt="user photo">
            <router-link to="/reset_password" class="block py-2 px-4 text-md text-gray-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Reset Password</router-link>
          </li>
          <li @click="onLogout" class="flex hover:bg-gray-100 items-center p-1">
            <img id="reset" class="w-7 h-7 rounded-full cursor-pointer" src="https://www.freeiconspng.com/uploads/sign-out-logout-icon-0.png" alt="user photo">
            <span class="block py-2 px-4 text-md text-gray-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</span>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-md text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
  <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
    <ul class="flex flex-col p-4 mt-4 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-md md:font-medium md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li v-for="route of routes" :key="route">
        <router-link :to="route.path" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{route.title}}</router-link>
      </li>
    </ul>
  </div>
  </div>
  </nav>

</template>

<script>
 import { dataStore } from '../../store/user-store.js';
 import axios from 'axios';

export default {
    setup() {
      const userStore = dataStore()
      return { userStore }
    },
    data(){
      return{
        role: localStorage.getItem('role'),
        isClik:false,
        studentData:[],
        
        teacher_routes:[
          {title: "Check student leave", path: "check_student_leave"},
          {title: "List all students", path: "list_all_students"}
        ],
        
        routes:[
          {title: 'List all leave', path: 'list_student_leave'},
          {title: 'New request', path: 'new_request'},
          
        ]

      }
    },
    methods:{
      onLogout(){
        localStorage.clear();
        this.userStore.change(false)
        alert("Are sure to logout")
        this.$router.push('/login')
      },

      getStudentData() {
        axios.get('http://localhost:8000/api/student/'+ localStorage.getItem("userId")).then((res)=>{
            this.studentData= res.data;   
        })
      },  
      changeUserRole() {
        console.log(this.role)
        if(this.role =="teacherLogin"){
          this.routes = this.teacher_routes
          console.log(this.routes);
      }
    }
      
    },
    mounted() {
      this.changeUserRole()
      this.getStudentData()
    }
}
</script>

<style>

nav a.router-link-exact-active {
  color: white; 
}
</style> 

