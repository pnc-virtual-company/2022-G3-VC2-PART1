<!-- <template>
    <form  @submit.prevent="onRegister" class=" shadow max-w-6xl  m-auto mt-5   rounded-md p-5 mb-5">
        <h1 class="font-bold text-4xl text-orange-400 text-center mb-3 ">Create  Account Student</h1>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <input class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="First Name*" v-model="firstName">
            <p v-if="no_firstName" class="text-red-500 text-xs italic">Please fill your first name !</p>
            </div>
            <div class="w-full md:w-1/2 px-3">
            <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Last Name*" v-model="lastName">
            <p v-if="no_lastName" class="text-red-500 text-xs italic">Please fill your last name !</p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <input class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Password*" v-model="password">
            <p  v-if="no_password" class="text-red-500 text-xs italic">Please fill your password !</p>
            </div>
            <div  class="w-full md:w-1/2 px-3">
            <input class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Confirm Password*" v-model="comfirmPassword">
            <p v-if="no_comfirmPassword" class="text-red-500 text-xs italic">Please fill comfirm password !</p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Email*" v-model="email">
            <p v-if="no_email" class="text-red-500 text-xs italic">Please fill your email !</p>
            </div>
            <div class="w-full md:w-1/2 px-3">
            <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Birth of place*" v-model="birthOfPlace">
            <p v-if="no_birthOfPlace" class="text-red-500 text-xs italic">Please fill your birth of place !</p>
            </div>
        </div>
        <label class="block tracking-wide text-gray-700 text-xs  mb-2" for="grid-password">
        Birth of date
        </label>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <input class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="date" placeholder="DD/MM/YYYY*" v-model="birthOfDate">
            <p v-if="no_birthOfDate"  class="text-red-500 text-xs italic">Please fill your birth of date !</p>
            </div>
            <div class="w-full md:w-1/2 px-3">
            <input   class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Class*" v-model="classroom">
            <p v-if="no_classroom" class="text-red-500 text-xs italic">Please fill your class !</p>
            </div>
        </div>
        <button class=" w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-full">
            Create
        </button>
    </form>
</template>

<script>
export default {
    data(){
        return{
            firstName:"",
            lastName:"",
            password:"",
            comfirmPassword:"",
            email:"",
            birthOfPlace:"",
            birthOfDate:"",
            classroom:"",
            no_firstName:false,
            no_lastName:false,
            no_password:false,
            no_comfirmPassword:false,
            no_email:false,
            no_birthOfPlace:false,
            no_birthOfDate:false,
            no_classroom:false,
            
            
            

        }
    },
    methods: {
        onRegister(){
            if(this.firstName.trim()=="" ){
                this.no_firstName=true
            }else{
                this.no_firstName=false;
            }
            if(this.lastName.trim()=="" ){
                this.no_lastName=true
            }else{
                this.no_lastName=false;
            }
            if(this.password.trim()=="" ){
                this.no_password=true
            }else{
                this.no_password=false;
            }
            if(this.comfirmPassword.trim()=="" ){
                this.no_comfirmPassword=true
            }else{
                this.no_comfirmPassword=false;
            }
            if(this.email.trim()=="" ){
                this.no_email=true
            }else{
                this.no_email=false;
            }
            if(this.birthOfPlace.trim()=="" ){
                this.no_birthOfPlace=true
            }else{
                this.no_birthOfPlace=false;
            }
            if(this.birthOfDate.trim()=="" ){
                this.no_birthOfDate=true
            }else{
                this.no_birthOfDate=false;
            }
            if(this.classroom.trim()=="" ){
                this.no_classroom=true
            }else{
                this.no_classroom=false;
            }
               
        }
    }
}
</script>

<style>

</style> -->