<template>
    <form class="lg:w-5/12 md:w-6/12 sm:w-9/12 w-11/12 m-auto p-5 rounded border-2" action="">
        <img class=" m-auto cursor-pointer h-16 w-16 color-blue" src="../../assets/reset_password.png" alt="">
        <h1 v-if="old_password_validation == 'Password updated!'" class="text-center text-green-400 text-2xl mt-3 mb-4 font-bold" >{{ old_password_validation}}</h1>
        <h1 v-else class="text-center text-2xl mt-3 mb-4 font-bold">Reset Password</h1>
        <div class="relative z-0 mb-6 w-full group">
            <input v-model="old_password" :type="type" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
            <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Old password</label>
            <p v-if="old_password_validation=='Password incorrect!'" class="mt-1 text-xs text-red-600 dark:text-red-500">{{old_password_validation}}</p>
        </div>
        <div class="relative z-0 mb-6 w-full group">
            <input v-model="password" :type="type" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
            <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">New password</label>
            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{password_validation}}</p>
        </div>
        <div class="relative z-0 mb-6 w-full group">
            <input v-model="confirm_password" :type="type" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{confirm_password_validation}}</p>
        </div>
         <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
            <input id="terms" @click="changtype" type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
            </div>
            <label class="ml-2 text-sm font-medium text-grey-500 dark:text-gray-300">Show your password</label>
        </div>
        <button type="button" @click="resetPassword" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</template>

<script>
    export default {
        props:{
            old_password_validation:String,
        },
        data(){
            return {
                password:"",
                confirm_password:"",
                old_password: "",
                // old_password_validation:"",
                password_validation:"",
                confirm_password_validation:"",
                type:"password",
                type_password: true,
            }
        },

        methods:{
            resetPassword(){
                if(this.password.length >=8 && this.password == this.confirm_password){
                    let data = { password: this.old_password,new_password: this.password}
                    this.$emit("password", data)
                    this.password = ''
                    this.old_password =''
                    this.confirm_password = ''
                    this.password_validation =""
                    this.confirm_password_validation =""
                }else if(this.password.length<8){
                    this.password_correct = false;
                    this.password_validation = "The password needs to longer that 7 characters!"
                    this.confirm_password_validation = "The confirm password needs to longer that 7 characters! the same as your new password"
                } else if(this.password != this.confirm_password){
                    this.confirm_password_validation = "Confirm password must be the same as your new password"
                }
            },
            changtype(){
                this.type_password = !this.type_password
                if(this.type_password){
                    this.type = "password"
                }else{
                    this.type = "text"
                }
            }
        }
    }
</script>