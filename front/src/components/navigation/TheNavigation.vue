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
  
<!-- <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="popup-modal">
  Toggle modal
</button> -->

<!-- <div id="popup-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                <button @click="onLogout"  data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
</div> -->

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
        // alert("Are sure to logout")
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

