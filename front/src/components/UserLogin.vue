<template>
    <form @submit.prevent="onLogin" class="shadow-lg shadow-gray-500 w-7/12 h-5/6 m-auto mt-20  border-t-4 border-orange-400 rounded-md p-5 mb-5 bg-white-200 ">
        <div class="flex justify-between -mx-2 mb-6">
            <div class="">
                <img class="m-auto w-40"  src="../assets/logo.png" alt="">
                <h1 class="text-2xl text-center">Welcome to PNC SLMS</h1>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="my-5">
                        <h1 class="font-bold text-2xl text-orange-400 text-center mb-3 ">Login</h1>
                        <input class=" appearance-none block w-full bg-gray-200 border  py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="email" placeholder="email*" v-model="email">
                        <!-- <p v-if="!no_email"  class="text-red-500 text-xs italic">Please fill your email !</p> -->
                    </div>
    
                    <div class="relative ">
                        <input v-if="!showPassword"  class=" appearance-none block w-full bg-gray-200 border  py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="password" placeholder="password*" v-model="password">
                        <input v-else  class=" appearance-none block w-full bg-gray-200 border  py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="password*" v-model="password">
                        <!-- <p v-if="!no_password" class="text-red-500 text-xs italic">Please fill your password !</p> -->
                        <div @click="toggleShow" class="  absolute inset-y-0 right-0 pr-1  ">
                            <svg v-if="!showPassword" class="w-6 h-6  mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                            <svg v-else  class="w-6 h-6 mt-2 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>  
                    </div>
                    <button  class=" w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 rounded-full">
                        Login
                    </button>
                    
            </div>
        </div>
        
    </form>

</template>

<script>
import axios from '../axios-http'
export default {
    data(){
        return{
            email:"",
            password:"",
            no_email:true,
            no_password:true,
            showPassword:false,
            role:"studentLogin",
            logined:false,
            
        }
    },
    methods: {
        async onLogin(){
            if(this.password.trim()!= ""  ){
                this.no_password=false
                if(this.email.search("passerellesnumeriques.org")>0){
                    this.no_email=false;
                    if(this.email.search("student") == -1){
                        this.role = 'teacherLogin'
                    }
                }
            }

            if(this.email.trim()!= ""  && this.password.trim()!= "" ){ 
                let user={email:this.email,password:this.password,}
                let result= await axios.post(this.role,user)
                if(result.status==200 && result.data.message=="success login"){
                    localStorage.setItem('token',JSON.stringify(result.data.token));
                    localStorage.setItem('role',this.role);
                    localStorage.setItem('userId',JSON.stringify(result.data.id));
                    this.$router.push("/home");
                }
            }
        },

         toggleShow() {
            this.showPassword = !this.showPassword;
        }
    },
    computed: {
        buttonLabel() {
            return (this.showPassword) ? "Hide" : "Show";
        },
    },
    mounted(){
    }
   
    
}
</script>

