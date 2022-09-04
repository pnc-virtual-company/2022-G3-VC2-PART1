
<template>
    <section v-if="!forgotPW" class="h-screen ">
            <div class="px-6 h-full text-gray-800">
                <div
                class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6"
                >
                <div
                    class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0"
                >
                    <img
                    src="../../assets/Homepage.svg"
                    class="w-full"
                    alt="Sample image"
                    />
                </div>
                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
                    <div class="typewriter mb-16 w-full flex m-auto  items-start">
                            <h2 class="font-bold text-2xl ">Welcome back to SLMS</h2>
                    </div>
                    <form class="w-full ">
                    <!-- Email input -->
                    <div class="mb-6 ">
                        <input
                        v-model="email"
                        type="email"
                        class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleFormControlInput2"
                        placeholder="Email address"
                        />
                        <span v-if="no_email" class="text-red-600">{{ifNotEmailNC}}</span>
                    </div>

                    <!-- Password input -->
                    <div class="mb-6 ">
                        <input
                        v-model="password"
                        :type="showPW"
                        class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleFormControlInput2"
                        placeholder="Password"
                        />
                        <span v-if="no_password" class="text-red-600">{{checkPW}}</span>
                    </div>

                    <div class="flex justify-between items-center mb-6 m-auto ">
                        <div class="form-group form-check flex justify-between w-full">
                            <div>
                                <input id="terms" @click="changtype()" type="checkbox" v-model="type_password" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
                                <label class="ml-2 text-sm font-medium text-grey-500 dark:text-gray-300">Show your password</label>
                            </div> 
                            <button @click="forgotPW = !forgotPW, resetNewPW = !resetNewPW" class="text-blue-600 cursor-pointer">Forgot password ?</button>
                        </div>
                    </div>

                    <div class="text-center lg:text-left">
                        <button @click="onLogin()" 
                        v-if="!gettingCode"
                        type="button"
                        class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                        >
                        Login
                        </button>
                        <button  
                                    @click="onLogin()"
                                    v-if="gettingCode"
                                    type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                                    <svg  class="inline mr-2 w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    Loging...
                            </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Container -->
    <div class="container mx-auto" v-if="!resetNewPW">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg" >  
                    <img src="../../assets/forgot_password.svg" alt="">
                </div>
                <!-- Col -->
                <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <div class="px-8 mb-4 ">
                        <h3 class="pt-4 mb-2 text-2xl">Forgot Your Password?</h3>
                        <p class="mb-4 text-sm text-red-500">
                            We will send passcode to your email after you complete your gmail
                        </p>
                    </div>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email"
                                type="email"
                                placeholder="Enter Email Address..."
                                v-model="email"
                            /><span v-if="no_email" class="text-red-700 text-2">wrong email !</span>
                            <input
                                v-if="hasPassCode" 
                                v-model="password"
                                class="mt-10 w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email"
                                type="text"
                                placeholder="Enter your passcode..."
                            /><span v-if="wrongPsw" class="text-red-700 text-2">wrong code !</span>
                        </div>
                        <div class="mb-6 text-center">
                            
                            <button  v-if="gettingCode"
                                    type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                                    <svg  class="inline mr-2 w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    Getting code...
                            </button>
                            <button @click="sendCode()" v-if="!ifSendCode"
                                    type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                                    Get Code
                            </button>

                            <button @click="clearifyPasscode()" v-if="btnReset"
                                    type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                                    Send Code
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-6 py-12 h-full" v-if="confirmPSW">
      <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
        <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
          <img
            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="w-full"
            alt="Phone image"
          />
        </div>
        <div class="md:w-8/12 lg:w-5/12 lg:ml-20">
          <form>
            <span class="text-red-500">Password must be more than 8 characters</span>
            <!-- Email input -->
            <div class="mb-6">
              <input
               v-model="confirmPW"
                type="text"
                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="New Password"
              />
            </div>
  
            <!-- Password input -->
            <div class="mb-6">
              <input
                v-model="newPW"
                type="text"
                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Confirm Password"
              />
              <span v-if="confirmPass" class="text-red-700 text-2">Confirm password must be the same as new password</span>
            </div>
  
            <div class="flex justify-between items-center mb-6">
              <!-- <div class="form-group form-check">
                <input type="text" v-model=""  class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
                <label class="ml-2 text-sm font-medium text-grey-500 dark:text-gray-300">Show your password</label>
              </div> -->
              
            </div>
  
            <!-- Submit button -->
            <button
            @click.prevent="resetPSW()"
              type="submit"
              class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-50"
              data-mdb-ripple="true"
              data-mdb-ripple-color="light"
            >
              Reset Password
            </button>
          </form>
        </div>
      </div>
    </div>

</template>

<script>
import axiosClient from '../../axios-http.js'
// import axios  from 'axios';
import { dataStore } from '../../store/user-store.js';

export default {
    setup() {
        const userStore = dataStore()

        return { userStore }
    },
    data(){
        return {
            newPW:'',
            confirmPW:'',
            confirmPSW:false,
            btnReset:false,
            gettingCode:false,
            resetNewPW:true,
            ifSendCode:false,
            btnText:'Get Code',
            email:"",
            password:"",
            no_email:false,
            no_password:false,
            showPassword:false,
            ifNotEmailNC:'Please fill your email !',
            role:"studentLogin",
            logined:false,
            isNav: true,
            showPW: 'password',
            type_password: false,
            checkPW: 'please input your password !',
            forgotPW: false,
            hasPassCode: false,
            userID: '',
            wrongPsw: false,
            confirmPass: false
        }
    },
    methods: {
        
        async onLogin() {
            this.no_password = false;
            this.no_email = false;
            if (this.password.trim() == "") {
                this.no_password=true
            }
            if (this.email.trim() == "") {
                this.no_email=true
            }
            if (!this.no_email) {
                if(this.email.search('passerellesnumeriques.org') > 0){
                        this.gettingCode = !this.gettingCode
                        if (this.email.search("student") < 0) {
                            this.role = 'teacherLogin'
                        }
                        // login to database
                        if ( !this.no_password) {
                            let user = {email: this.email, password: this.password }
                            let result = await axiosClient.post(this.role, user);
                            console.log(result);
                            if (result.data.message == "success login") {
                                this.gettingCode = !this.gettingCode
                                localStorage.setItem('token', (result.data.token));
                                localStorage.setItem('role', this.role);
                                localStorage.setItem('userId',(result.data.id));
                                this.$router.push("/home");
                                window.location.reload();
                            }
                            else { 
                                this.gettingCode = !this.gettingCode
                                this.checkPW = "Wrong password !"
                                this.no_password = true;
                            }
                        }
                }
                else if (this.email.search('passerellesnumeriques.org') < 0) {
                    console.log('hello world');
                    this.ifNotEmailNC = 'We only confirm email PNC only !'
                    this.no_email = true;
                }
            }
            else if (this.no_email) {
                this.ifNotEmailNC = "Please fill your email !"
            }
            
        },

         toggleShow() {
            this.showPassword = !this.showPassword;
        },
        loginSuccess() {
            let token = localStorage.getItem('token');
            
            if (token != null) {
                this.$router.push("/home");
            }
        },
        changtype(){
            this.type_password = !this.type_password;
                if(this.type_password){
                    this.showPW = "text"
                }else{
                    this.showPW = "password"
                }
        },
        sendCode() {
            localStorage.removeItem('code')
            if (this.email != "") {
                this.gettingCode = !this.gettingCode;
                this.ifSendCode = !this.ifSendCode;
                axiosClient.post('forgotPWStudent/' + this.email).then((res) => {
                    if (res.data.message == 'success') {
                        this.userID = res.data.id;
                        this.gettingCode = !this.gettingCode;
                        this.btnReset = !this.btnReset;
                        this.no_email = false;
                        localStorage.setItem('code',res.data.code)
                        this.hasPassCode = true;
                        console.log(res.data);
                    }
                    if (res.data.message != 'success') {
                        this.no_email = true;
                    }
                 })
            } else {
                this.no_email = true
            }
        },
        clearifyPasscode(){
            if (localStorage.getItem('code') == this.password) {
                this.resetNewPW = !this.resetNewPW;
                this.confirmPSW = true;
                this.btnReset = !this.btnReset;
            } else {
                this.wrongPsw = true;
            }
        },
        resetPSW() {
            const Swal = require('sweetalert2')
            if (this.newPW == this.confirmPW) {
                if (this.newPW.length > 7) {
                    axiosClient.put('resetPWStd/' + this.userID,{'new_password':this.newPW}).then((res) => {
                        if (res.data.success == 'Password updated!') {
                            if (this.email.search('student') > 1) {
                                axiosClient.post('mailResetPWStudent/' + this.userID).then((res) => {
                                    console.log(res.data);
                                });
                            } else {
                                axiosClient.post('mailResetPWTeacher/' + this.userID);          
                            }
                            Swal.fire({
                                title: 'Passwrod Updated',
                                icon: 'success',
                                timer: 2000,
                            })
                            this.confirmPSW = !this.confirmPSW;
                            this.forgotPW = !this.forgotPW;
                        } 
                        this.email = '',
                        this.password = ''
                    })
                } 
            } else if (this.newPW != this.confirmPSW) {
                this.confirmPass = !this.confirmPass;
                
            }
        }
    },
    computed: {
        buttonLabel() {
            return (this.showPassword) ? "Hide" : "Show";
        },
    },
    
    mounted() {
        this.loginSuccess()
    }
}
</script>

<style scoped>
    .typewriter h2 {
        color: blue;
        font-family: monospace;
        overflow: hidden; /* Ensures the content is not revealed until the animation */
        border-right: 0.15em solid orange; /* The typwriter cursor */
        white-space: nowrap; /* Keeps the content on a single line */
        letter-spacing: 0.15em; /* Adjust as needed */
        animation: typing 3s steps(30, end), blink-caret 0.5s step-end infinite;
    }

/* The typing effect */
@keyframes typing {
  from {
    width: 0;
  }
  to {
    width: 100%;
  }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from,
  to {
    border-color: transparent;
  }
  50% {
    border-color: orange;
  }
}
</style>

