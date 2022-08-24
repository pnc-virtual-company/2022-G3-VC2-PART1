
 <template>
  <div class="container m-auto">
    <div class=" flex justify-center m-auto items-center mt-6">
      <img class="h-18 w-20" src="../../assets/group.png" alt="">
      <h1 class="text-4xl text-black-400 font-semibold text-center  p-3 text-orange-400  ">List All Students</h1>
    </div>

    <!-- popup to add student -->
    <div class="container mx-auto">
      <div class="flex justify-end">
        <button
          @click="isOpen = true"
          class="px-6 py-2 text-white bg-blue-600 rounded shadow"
          type="button"
        >
          Add student +
        </button>

        <div v-if="isOpen" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
          <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
            <div class="flex items-center justify-between">
              Add new student
            </div>
            <div class="flex flex-wrap -mx-3 mb-6 mt-5">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <input class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="First Name*" v-model="first_name">
                <p v-if="first_name ==''" class="text-red-500 text-xs italic">Please fill student first name !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Last Name*" v-model="last_name">
                <p v-if="last_name ==''" class="text-red-500 text-xs italic">Please fill student last name !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Gender*" v-model="gender">
                <p v-if="gender ==''" class="text-red-500 text-xs italic">Please fill student gender!</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Batch*" v-model="batch">
                <p v-if="batch ==''" class="text-red-500 text-xs italic">Please fill student batch !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="email" placeholder="Email*" v-model="email">
                <p v-if="email ==''" class="text-red-500 text-xs italic">Please fill student email !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Password (1-8)" v-model="password">
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Phone*" v-model="phone">
                <p v-if="phone ==''" class="text-red-500 text-xs italic">Please fill student phone !</p>
              </div>
            </div>
            <div class="mt-4">
              <button @click="isOpen = false" class="px-6 py-2 text-blue-800 border border-blue-600 rounded"> Cancel </button>
              <button @click="onAddStudent" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded"> Add + </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- student card -->
    <div class="mt-[-35px]  h-screen bg-gray-100  ">
      <div class="overflow-auto rounded-lg shadow mt-12 ">
        <table class=" w-[98%] m-auto">
          <thead class="bg-orange-300 border-b-2 border-gray-200 ">
              <tr class="text-xl text-white-1">
                <th class="p-3  font-semibold tracking-wide text-center ">Student Name</th>
                <th class="p-3  font-semibold tracking-wide text-center ">Class</th>
              </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-70 border-b-2 border-gray-190 hover:bg-sky-100 " v-for="student of listAllStudents" :key="student">
              <td  class="p-4   text-gray-700 flex justify-center m-21 text-[1.1rem]">{{student.first_name}} {{student.last_name}} </td> 
              <td class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{student.class}} </td>
            </tr>     
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template> 
<script>
import axios from "../../axios-http";
  export default{
    props:{
      listAllStudents: Array
    },
    data(){
      return{
        newStudentData: [],
        isOpen: false,
        first_name: "",
        last_name: "",
        batch: "",
        gender: "",
        email: "",
        password: "12345678",
        phone: "",
      }
    },

    methods: {
      onAddStudent(){
        if(
          this.first_name &&
          this.last_name &&
          this.batch &&
          this.gender &&
          this.email &&
          this.password &&
          this.phone 
          != ""
        ){
          this.newStudentData = {
            first_name: this.first_name,
            last_name: this.last_name,
            batch: this.batch,
            gender: this.gender,
            phone: this.phone,
            email: this.email,
            password: this.password,
          }
          axios.post('student', this.newStudentData)
          .then(res=> {
            console.log(res.data);
          })
        }
      }
    }
  }
 
</script>