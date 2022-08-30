<template>
    <div class="flex justify-center  ">
      <h1 class=" font-bold  text-green-400 text-3xl mb-5 flex"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Logined successfull</h1>
    </div>
    <div class="max-w-sm rounded overflow-hidden m-auto shadow-lg  ">
      <img v-if="userGender" class="w-40 rounded-full m-auto" src="../../assets/Man.jpg" alt="Sunset in the mountains">
      <img v-else class="w-40 rounded-full m-auto" src="../../assets/woman.png" alt="Sunset in the mountains">
      <div class="px-6 py-4 font-bold flex justify-around ">
        <div >
          <p class="text-gray-700 text-base mb-2">FirstName : <span class="text-green-500 italic">{{student.first_name}} </span> </p>
          <p class="text-gray-700 text-base">Gender : <span class="text-green-500 italic">{{student.gender}}</span>  </p>
        </div>
        <div class="">
          <p class="text-gray-700 text-base mb-2">LastName : <span class="text-green-500 italic">{{student.last_name}}</span>  </p>
        </div>
  
    </div>
     <div class="flex justify-end mb-5 mr-5">
       <button @click="onStart" class="bg-blue-500 hover:bg-blue-700   text-white font-bold py-2 px-4 rounded">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
       </button>
     </div>
  </div>
  </template>
  <script>
  
  import axios from '../../axios-http.js'
  export default {
  
    data(){
      return {
  
        student:{},
        token:localStorage.getItem("token"),
        userId:localStorage.getItem("userId")
        
      }
    },
    methods:{
      onStart(){
        this.$router.push("/student_list");
          
      },
      tokenRequest(){
        axios.get('student/'+this.userId,{headers:{Authorization:`Bearer ${this.token}`}})
        .then(res=>{
          this.student=res.data;
          // console.log(this.student)
        })
      }
      
    },
    computed: {
      userGender(){
        return this.student.gender=="M" || this.student.gender=="Male" || this.student.gender=="m" || this.student.gender=="male" 
      }
      
    },
    mounted(){
        this.tokenRequest()
    }
    
  }
  </script>
  
  <style>
  
  </style>