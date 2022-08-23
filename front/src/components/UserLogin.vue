<template>
    <form @submit.prevent="onLogin" class=" shadow-lg w-6/12 m-auto mt-5  rounded-md p-5 mb-5 ">
        <div class="flex justify-between -mx-2 mb-6">
            <div class="">
                <img  src="../assets/logo.jpg" alt="">
                <h1 class="text-2xl text-center">Welcome to PNC SLMS</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Pariatur laboriosam    </p>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <div class="my-5">
                    <h1 class="font-bold text-2xl text-orange-400 text-center mb-3 ">Login</h1>
                    <input class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="email" placeholder="email*" v-model="email">
                    <p v-if="no_email"  class="text-red-500 text-xs italic">Please fill your email !</p>
                    </div>
                    <div>
                    <input   class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="password" placeholder="password*" v-model="password">
                    <p v-if="no_password" class="text-red-500 text-xs italic">Please fill your password !</p>
                    </div>
                <div>
                    <button  class=" w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 mt-5 rounded-full">
                        Login
                    </button>

                </div>
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
            no_email:false,
            no_password:false,
            isLogined:false
        }
    },
    methods: {
        
        async onLogin(){
            
            if(this.password.trim()=="" ){
                this.no_password=true
            }else{
                this.no_password=false;
            }
            
            if(this.email.trim()=="" ){
                this.no_email=true
            }else{
                this.no_email=false;
            }
            
            // login to database
            let user={email:this.email,password:this.password,}
            let result= await axios.post('login',user)
                console.log(result)
            if(result.status==200 && result.data.sms!="Invaliid password"){
                localStorage.setItem('token',JSON.stringify(result.data));
                this.$router.push("/home");
            }else{
                this.$router.push("/login");
            }
            
        },
        mounted(){
            let userLogin = localStorage.getItem('token');
            if(userLogin){
                this.$router.push('/home')
            }else{
                this.$router.push("/login");
            }
            
        }
    }
}
</script>


<style>

</style>