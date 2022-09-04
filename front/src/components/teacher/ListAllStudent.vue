<template>
<!-- ===============Select options batch and search students name =============-->
<div class="font-sans hidden md:block drop-shadow-md">
        <div class=" flex justify-between items-center  mt-10 mb-10">
            <div class="w-2/6">
                <div class=" flex justify-center items-center w-full">
                    <select @change="selectBatch" v-model="selectStudentBatch" class="p-2 lg:p-3 rounded-md text-black placeholder-gray-400 bg-white border border-gray-400 focus:border-blue-500 border-b-3  w-11/12 ml-5">
                      <option  value="Show All" selected>Show all</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                    </select>
                </div>
            </div>
            <div class="   w-2/5 ">
                <div class="flex w-11/12 justify-center items-center ml-20">
                        <input  v-model="search" type="text" id="simple-search" class=" w-4/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-14" placeholder="Search by student's name." required>
                          <button @click="searchStudent(search)" class="px-3 py-[0.71rem] h-14  text-white bg-blue-600  shadow " type="button"> 
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                          </button>
                </div>
            </div>
            <div class="w-2/6  flex justify-center items-center">
                <button @click="isOpen = true" class="w-2/5 px-4 py-2.5 text-white bg-blue-600 rounded shadow  flex " type="button">  Add Student 
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 ml-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </button>
             </div>
        </div>
    </div>

    <!-- responsive phone for dropdown -->
    <div class="font-sans  md:hidden  mt-5 mb-10 ml-5">
        <div class=" grid grid-cols-1 gap-5">
          <div class="w-11/12 ">
                <div class="flex w-full justify-center items-center">
                        <input   v-model="search" type="text" id="simple-search" class="w-4/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-14" placeholder="Search by student's name." required>
                          <button @click="searchStudent(search)" class="px-3 py-[0.71rem] h-14  text-white bg-blue-600  shadow " type="button"> 
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                          </button>
                </div>
            </div>
            <div class="w-11/12 ">
                <div class=" flex justify-center items-center w-full">
                    <select @change="selectBatch" v-model="selectStudentBatch" class="p-2 lg:p-3 rounded-md text-black placeholder-gray-400 bg-white border border-gray-400 focus:border-blue-500 border-b-3  w-11/12">
                      <option  value="Show All" selected>Show all</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                    </select>
                </div>
            </div>
            
            <div class="w-4/5  flex ml-5 items-start">
                <button @click="isOpen = true" class="w-2/5 px-4 py-2.5 text-white bg-blue-600 rounded shadow  flex " type="button">  ADD
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 ml-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </button>
             </div>
        </div>
    </div>

    <!-- ===============Popup form to create student =============-->

  <div class="container ">
    <div class="ml-[7rem] mt-[-1rem]  ">
      <div class="flex justify-end">  
        <div class="flex justify-end" v-if="isOpen">  
        <div  class="fixed w-full h-full inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
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
                <p v-if="batch =='' && isCheck == true" class="text-red-500 text-xs italic">Please fill student batch !</p>
                <select v-model="batch" class="mt-3 p-3 block w-full bg-gray-200 " required>
                      <option value="" disabled selected>Select batch</option>
                      <option value="2021" >2021</option>
                      <option value="2022">2022</option>
                    </select>
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

    <div class="mt-[-35px]  bg-gray-100  ">
      <div class="overflow-auto rounded-lg shadow mt-12 ">
        <table class=" w-[98%] ml-6">
          <thead class="bg-green-500 border-b-2 border-gray-200 ">
              <tr class="text-ms text-white">
                <th class="p-3  font-sans  text-left ">Name</th>
                <th class="p-3  font-sans  text-left ">Batch</th>
                <th class="p-3  font-sans  text-center ">Action</th>  
              </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-70 border-b-2 border-gray-190 hover:bg-sky-100 cursor-pointer" v-for="student of listAllStudents" :key="student">
              <td  class=" p-2 text-sm text-gray-700 items-center text-[1rem]">
                <p class=" p-2 text-sm text-gray-700 items-center text-[1rem]">{{student.first_name}} {{student.last_name}}</p> 
                </td> 
              <td class="p-2 text-sm text-gray-700 items-center text-[1rem]">{{student.batch}} </td>
            
              <td class="p-4 text-sm text-gray-700 text-center flex justify-evenly items-center " >
                <button @click="detailStudent(student.id)"  class="p-1.5  mr-1  w-25    bg-none " :id="student.id">
                  <img src="../../assets/details.png" class="w-7" alt="">
                </button>   
                <button @click.prevent="showFormEdit(student.id)" >
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-green-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                </button>
                <button @click="onDelete(student.id)" class="text-red-500 p-1.5 mr-1 rounded w-20">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                </button>
               </td>
            </tr>     
          </tbody>
        </table>
      </div>
    </div>
  </div>

   <form-edit v-if="isUpdateStudent" :student_edit="student_edit"  @cancel='cancel' @edit_student='updateStudent(student_edit.id)'/>

   <!-- pop up delete student tablet -->
   <div v-if="isDelete" class="hidden md:block">  
      <div class="mt-[-12] fixed w-full h-full inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="bg-white h-60 text-center p-5 w-2/5 m-auto rounded">
          <p class="font-bold mt-10">Are you sure to delete?</p>
          <button @click="isDelete = false" class="bg-blue-500 p-1.5 text-white mr-1 rounded w-20 mt-10" >Cancel</button>
          <button @click="deleteStudent()" class="bg-red-500 p-1.5 text-white mr-1 rounded w-20 mt-10 ml-5" >OK</button>
        </div>
      </div>
    </div>

       <!-- pop up delete student for phone -->
   <div v-if="isDelete" class=" md:hidden w-full">  
      <div class="mt-[-12] fixed w-full inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="bg-white  text-center p-5 w-full h-50 m-auto rounded">
          <p class="font-bold mt-10">Are you sure to delete?</p>
          <button @click="isDelete = false" class="bg-blue-500 p-1.5 text-white mr-1 rounded w-20 mt-10" >Cancel</button>
          <button @click="deleteStudent()" class="bg-red-500 p-1.5 text-white mr-1 rounded w-20 mt-10 ml-5" >OK</button>
        </div>
      </div>
    </div>

<!-- ============================Popup Students Details   for tablet ============================-->

  <div class="container mx-auto  md:block">
    <div class="flex justify-center w-full b">
      <div v-show="isShowDetails" class="fixed w-full h-full inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 " >
        <div class="w-9/12 p-5 bg-white rounded-md shadow-xl  mt-[4rem]">
          <div class="flex justify-end h-4">
              <svg @click="isShowDetails=false"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 cursor-pointer hover:text-red-400">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
          </div>
          <div class="-ml-3">
            <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-sky-400 ">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
            </svg>
            <h1 class="title text-sky-500  text-2xl text-bold mt-[-1.8rem] ml-7">Personal Information</h1>
          </div>
          <div class="flex ">
           
            <div class="detail w-full px-5 grid grid-cols-2 mt-12 text-start font-sans" v-if="isShowDetails" >
              <div class="info text-lg -ml- "  :id="details.id">
                <h1 :id="details.id" class="p-1.5">First Name : {{details.first_name}}</h1>
                <h1 :id="details.id" class="p-1.5">Last Name   : {{details.last_name}}</h1>
                <h1 :id="details.id" class="p-1.5">Gender    : {{details.gender}}</h1>
              </div>
              <div class="info text-lg -ml-"  :id="details.id">
                <h1 :id="details.id" class="p-1.5">Batch : {{details.batch}}</h1>
                <h1 :id="details.id" class="p-1.5">Phone : {{details.phone}}</h1>
                <h1 :id="details.id" class="p-1.5">Email  :  {{details.email}}</h1>
              </div>
            </div>
          </div>
          <div class="flex">

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mt-[2.5rem] text-sky-400">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
          </svg>
          <h1 class="title text-sky-500  text-xl text-bold mt-[2rem]">History</h1>
          </div>
     
          <liststudent-leave v-if="listStudentRequest.length>0" :listStudentRequest="listStudentRequest"></liststudent-leave>
          <h1 class="text-center p-3  text-2xl font-semibold" v-else>You Never Request Leave</h1>
        </div>
      </div>
    </div>
  </div>
</template> 
<script>
import FormEditeStudent from './FormEditeStudent.vue'
import axiosClient from "../../axios-http";
  export default{
    components:{
      'form-edit':FormEditeStudent,
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
        search:"",
        first_name: "",
        last_name: "",
        selectStudentBatch: 'Show All',
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
        student_id:0,
        listStudentRequest:[],
        countStudentLeave:[],
      
      }
    },

    methods: {
      getAllData(){
        axiosClient.get('student').then((res)=>{
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
            this.isOpen = !this.isOpen;
            this.isCheck = false;
            this.$emit("addStudent", this.newStudentData);
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
        this.details = this.listAllStudents.filter(student => student.id == id)[0];
        axiosClient.get('get_student_request/'+id).then((res)=>{ 
          this.listStudentRequest = res.data
        })
      },
      showFormEdit(id){
        let student = this.listAllStudents.filter(student=>student.id==id)[0];
        this.student_edit = student;
        this.isUpdateStudent = true
      },
      countLeave(){
        axiosClient.get('request').then((res)=>{
          this.countStudentLeave = res.data
        })
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
            axiosClient.put('student/' + id,student_info).then((res) => {
                // setTimeout(function(){
                //         window.location.reload();
                // });
                this.student_edit = res.data
                this.isUpdateStudent = false
            });
      },
      cancel(data){
        this.isUpdateStudent = data;
      },
      searchStudent(name){
        console.log(name);
        this.$emit('search-name',name);  
      } ,
      selectBatch(){
        this.$emit('select-batch',this.selectStudentBatch);
      }
    },
    mounted(){
      this.getAllData();
      this.countLeave();
    }
  } 
</script>

