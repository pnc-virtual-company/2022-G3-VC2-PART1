 <template>
<!-- ===============Select options batch and search students name =============-->
<div class="container mx-auto  flex justify-between mb-6 mt-12">
            <div class=" w-1/5 bg-white h-28 shadow-xl space-y-3 p-0 rounded-lg  border-4 border-gray-100 border-l-orange-500 ">
                <div class="flex">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-orange-900">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                  </svg>
                    <p class="text-xl text-orange-500 mt-[0.8rem] ">Total Students</p>
                </div>
                  <h1 class="text-center text-4xl">{{listAllStudents.length}}</h1>
            </div>
        <div class="mt-13  w-1/4">
            <div class=" mb-5">
                <p class="mb-3 text-sm">Search batch</p>
                <div class="relative ">
                    <select @change="selectOption" v-model="selectTypeLeave" class="p-3 rounded-md mb-4 text-black placeholder-gray-400 bg-white border border-gray-400 focus:border-blue-500 border-b-3  w-full">
                            <option selected="" value="">Show all</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="w-1/4  mt-[29px]">
            <div class="relative w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-3  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by student's name." required>
            </div>
        </div>
        <div class="w-1/6">
            <button @click="isOpen = true" class="px-5 py-3 text-white bg-blue-600 rounded shadow mt-[25px] mr-5" type="button">  Add student +  </button>
        </div>
    </div>

    <!-- ===============Popup form to create student =============-->

  <div class="container ">
    <div class="ml-[7rem] mt-[-1rem]  ">
      <div class="flex justify-end">  
        <div class="flex justify-end" v-if="isOpen">  
        <div  class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
          <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
            <div class="flex items-center justify-between">
              Add new student
            </div>
            <div class="flex flex-wrap -mx-3 mb-6 mt-5">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <input class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="First Name*" v-model="first_name">
                <p v-if="first_name =='' && isCheck == true" class="text-red-500 text-xs italic">Please fill student first name !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Last Name*" v-model="last_name">
                <p v-if="last_name =='' && isCheck == true" class="text-red-500 text-xs italic">Please fill student last name !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <select  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" v-model="gender">
                  <option value="">Select student's gender...</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
                <p v-if="gender =='' && isCheck == true" class="text-red-500 text-xs italic">Please fill student gender!</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Batch*" v-model="batch">
                <p v-if="batch =='' && isCheck == true" class="text-red-500 text-xs italic">Please fill student batch !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="email" placeholder="Email*" v-model="email">
                <p v-if="email =='' && isCheck == true" class="text-red-500 text-xs italic">Please fill student email !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Password (1-8)" v-model="password">
                <p v-if="password !='12345678'" class="text-red-500 text-xs italic">Please set password default (1-8)!</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Phone*" v-model="phone">
                <p v-if="phone =='' && isCheck == true" class="text-red-500 text-xs italic">Please fill student phone !</p>
              </div>
            </div>
            <div class="mt-4">
              <button @click="isOpen = false, isCheck = false" class="px-6 py-2 text-blue-800 border border-blue-600 rounded"> Cancel </button>
              <button @click="onAddStudent" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded"> Add + </button>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>

<!-- ===============Table list All Students =============-->

    <div class="mt-[-35px]   h-screen bg-gray-100  ">
      <div class="overflow-auto rounded-lg shadow mt-12 ">
        <table class=" w-[98%] ml-12 ">
          <thead class="bg-orange-300 border-b-2 border-gray-200 ">
              <tr class="text-ms text-white">
                <th class="p-3  font-semibold tracking-wide text-center ">Student ID</th>
                <th class="p-3  font-semibold tracking-wide text-center ">Student Name</th>
                <th class="p-3  font-semibold tracking-wide text-center ">Gender</th>
                <th class="p-3  font-semibold tracking-wide text-center ">Batch</th>
                <th class="p-3  font-semibold tracking-wide text-center ">Student Details</th>
                <th class="p-3  font-semibold tracking-wide text-center ">Active</th>
              </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-70 border-b-2 border-gray-190 hover:bg-sky-100 " v-for="student of listAllStudents" :key="student">
              <td class=" p-2   text-gray-700  text-center  ">{{student.id}}</td>
              <td  class="p-2   text-gray-700 flex justify-start m-21 text-[1rem] ">
                <img src="../../assets/profile.png" alt="" class="h-9 rounded-full object-cover bg-gray-100  border-gray-300 border mt-1 mr-3 ">
                <p class="flex items-center">{{student.first_name}} {{student.last_name}}</p> 
                </td> 
              <td class="p-2 text-sm text-gray-700 text-center text-[1rem]">{{student.gender}} </td>
              <td class="p-2 text-sm text-gray-700 text-center text-[1rem]">{{student.batch}} </td>
              <td class="p-2 text-sm text-gray-700 text-center text-[1rem]  ">
                <button @click="detailStudent(student.id)"  class="p-1.5  mr-1  w-25   inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2" :id="student.id">Show Details</button>   
             </td>
              <td class="p-4 text-sm text-gray-700 text-center ">
                <button @click.prevent="showFormEdit(student.id)"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                </button>
                <button @click="onDelete(student.id)" class="text-red-500 p-1.5 mr-1 rounded w-20">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                </button>
                <!-- <button @click="deleteStudent(student.id)" class="bg-red-500 p-1.5 text-white mr-1 rounded w-20">Delete</button> -->
               </td>
            </tr>     
          </tbody>
        </table>
      </div>
    </div>
  </div>

   <form-edit v-if="isUpdateStudent" :student_edit="student_edit"  @cancel='cancel' @edit_student='updateStudent(student_edit.id)'/>

   <!-- pop up delete student -->
   <div v-if="isDelete" class="">  
      <div class="mt-[-12] fixed w-full h-full inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="bg-white h-60 text-center p-5 w-2/5 m-auto rounded">
          <p class="font-bold mt-10">Are you sure to delete?</p>
          <button @click="isDelete = false" class="bg-blue-500 p-1.5 text-white mr-1 rounded w-20 mt-10" >Cancel</button>
          <button @click="deleteStudent()" class="bg-red-500 p-1.5 text-white mr-1 rounded w-20 mt-10 ml-5" >OK</button>
        </div>
      </div>
    </div>

<!-- ============================Popup Students Details ============================-->

  <div class="container mx-auto ">
    <div class="flex justify-center">
      <div v-show="isShowDetails" class="fixed w-full h-full inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 " >
        <div class="w-[75%] p-6 bg-white rounded-md shadow-xl  mt-26">
          <div class="flex justify-end h-4">
              <svg @click="isShowDetails=false"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 cursor-pointer hover:text-red-400">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
          </div>
          <div >
            <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-sky-400 ">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
            </svg>
            <h1 class="title text-sky-500  text-2xl text-bold mt-[-1.8rem] ml-7">Personal Information</h1>
          </div>
          <div class="flex ">
            <div  class="mt-12">
              <img class="h-32 w-40  rounded-full object-cover bg-gray-100  border-gray-300 border mt-1" src="../../assets/profile.png" alt="" >
            </div>
            <div class="detail w-full px-5 flex justify-around mt-12 " v-if="isShowDetails" >
              <div class="info text-[1rem]"  :id="details.id">
                <h1 :id="details.id" class="p-2.5">First Name :</h1>
                <h1 :id="details.id" class="p-2.5">Last Name   :</h1>
                <h1 :id="details.id" class="p-2.5">Gender    : </h1>
              </div>
              <div class="info   text-[1rem]">
                <h1 :id="details.id" class="p-2.5"> {{details.first_name}}</h1>
                <h1 :id="details.id" class="p-2.5"> {{details.last_name}}</h1>
                <h1 :id="details.id" class="p-2.5">{{details.gender}}</h1> 
              </div>
              <div class="info text-[1rem]"  :id="details.id">
                <h1 :id="details.id" class="p-2.5">Batch :</h1>
                <h1 :id="details.id" class="p-2.5">Phone : </h1>
                <h1 :id="details.id" class="p-2.5">Email  :  </h1>
              </div>
              <div class="info   text-[1rem]">
                <h1 :id="details.id" class="p-2.5"> {{details.batch}}</h1>
                <h1 :id="details.id" class="p-2.5"> {{details.phone}}</h1>
                <h1 :id="details.id" class="p-2.5">{{details.email}}</h1> 
              </div>
            </div>
          </div>
          <div class="flex">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mt-[2.5rem] text-sky-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
            </svg>
            <h1 class="title text-sky-500  text-xl text-bold mt-[2rem]">History</h1>
          </div>
          <div class="mt-4">
            <div class="overflow-auto rounded-lg shadow  ">
              <table  class=" w-full m-auto">
                <thead class="bg-orange-300 border-b-2 border-gray-200 ">
                  <tr class="text-[13px] text-white ">
                    <th class="p-1   text-start">Start Date</th>
                    <th class="p-1 text-start">End Date</th>
                    <th class="p-3 font-semibold tracking-wide text-start">Leave Type</th>
                    <th class="p-3 font-semibold tracking-wide text-start">Reason</th>
                    <th class="p-3 font-semibold tracking-wide text-start">Duration</th>
                    <th class="p-3 font-semibold tracking-wide ">Status</th>
                    <th class="font-semibold tracking-wide ml-20">Request Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="bg-gray-50 border-b-2 border-gray-190 hover:bg-sky-100  text-[13px]" v-for="studentLeave of listStudentLeave" :key="studentLeave">
                    <td class="p-2 capitalize text-gray-500 justify-center m-21 ">{{studentLeave.start_date}}</td>
                    <td class="p-2 capitalize text-gray-500 justify-center m-21"> {{studentLeave.end_date}}</td>
                    <td class="p-2 capitalize text-gray-500 justify-center m-21 ">{{studentLeave.leave_type}}</td>
                    <td class="p-2 capitalize text-gray-500 justify-center m-21 ">{{studentLeave.reason}}</td>
                    <td class="p-2 capitalize text-gray-500 justify-center m-21 "> {{studentLeave.duration}}</td>
                    <td class="p-2 capitalize text-gray-500 justify-center m-21 ">{{studentLeave.status}}</td>
                    <td class="p-2 capitalize text-gray-500 justify-center m-21 ">{{studentLeave.created_at}}</td>
                  </tr>  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template> 
<script>
import FormEditeStudent from './FormEditeStudent.vue'
import axios from "../../axios-http";
  export default{
    components:{
      'form-edit':FormEditeStudent
    },
    props:{
      listAllStudents:Array,
      listStudentLeave:Array,
      delete_student:Function
    },
    data(){
      return{
        isCheck: false,
        newStudentData: [],
        isOpen: false,
        first_name: "",
        last_name: "",
        batch: "",
        gender: "",
        email: "",
        password: "12345678",
        phone: "",
        details:"",
        isShowDetails: false,
        isUpdateStudent:false,
        student_edit: {},
        listAllStudent:this.listAllStudents,
        isDelete:false,
        student_id:0
      }
    },

    methods: {
      getAllData(){
        axios.get('student').then((res)=>{
          this.listAllStudent = res.data;
        })


      },
      onAddStudent(){
        this.isCheck = true;
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
          if(this.password === "12345678"){
            this.newStudentData = {
              first_name: this.first_name,
              last_name: this.last_name,
              batch: this.batch,
              gender: this.gender,
              phone: this.phone,
              email: this.email,
              password: this.password,
            };
            axios.post('student', this.newStudentData);
            this.first_name = "";
            this.last_name = "";
            this.batch = "";
            this.gender = "";
            this.phone = "";
            this.email = "";
          }
        }
      },
      onDelete(id){
        this.isDelete = true;
        this.student_id = id
      },
      deleteStudent(){
        this.isDelete=false;
        this.$emit('delete_student',this.student_id);
        this.getAllData()
      },
      detailStudent(id){
        this.isShowDetails = !this.isShowDetails;
        axios.get('student/'+id).then((res)=>{
          this.details= res.data;   
        })
      },
      showFormEdit(id){
        axios.get('student/' + id).then((res) => {
   
          this.student_edit = res.data
          this.isUpdateStudent = true
        });
      },

      updateStudent(id) {
        const  student_info = {
                first_name: this.student_edit.first_name,
                last_name: this.student_edit.last_name,
                batch: this.student_edit.batch,
                gender: this.student_edit.gender,
                email: this.student_edit.email,
                phone: this.student_edit.phone,
                password: this.student_edit.password
          };
            axios.put('student/' + id,student_info).then((res) => {
                setTimeout(function(){
                        window.location.reload();
                });
                this.student_edit = res.data
                this.isUpdateStudent = false
            });
      },

      cancel(data){
        this.isUpdateStudent = data;
      },
    },
    mounted(){
      this.getAllData()
    }
  }

 
</script>