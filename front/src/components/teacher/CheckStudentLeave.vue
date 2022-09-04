
<template>
  <div class="mt-[-27px]  h-screen bg-gray-100  ">
    <div class="overflow-auto rounded-lg shadow mt-12 ">
      <table class=" w-[94%] m-auto">
        <thead class="bg-green-500 border-b-2 border-gray-200 ">
            <tr class="text-sm text-white-1">
              <th class="p-3  font-semibold tracking-wide text-center ">Name</th>
              <th class="p-3  font-semibold tracking-wide text-center ">Request Date</th>
              <th class="p-3  font-semibold tracking-wide text-center ">Status</th>
              <th class="p-3  font-semibold tracking-wide text-center ">Detail</th>
            </tr>
        </thead>
        <tbody>
          <tr class="bg-gray-70 border-b-2 border-gray-190 "  v-for="studentReq of listAllStudentsLeave" :key="studentReq" :id="studentReq.id">
            <td  class="p-2 text-sm text-gray-700 text-center text-[1rem]">{{studentReq.student.first_name}} {{studentReq.student.last_name}} </td>
            <td  class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{studentReq.created_at}}</td>
            <td  class="p-4 text-sm text-gray-700 text-center text-[1.1rem]" >
              <button  @click="setId(studentReq.id)"  type="button" class="bg-red-300 p-2 text-red-900 mr-1 rounded">Reject</button>
              <button  @click="status('approved', studentReq.id)"   type="button" class="bg-green-300 p-2 ml-1 text-green-800 rounded">Approve</button>
            </td>
            <td  class="p-4   text-gray-700 flex justify-center m-21 text-[1.1rem]">
              <button :id="studentReq.id" type="button" class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2" @click="studentDetailLeave(studentReq.id)" >Show Details</button>
            </td> 
          </tr>  
        </tbody>
      </table>
    </div>
  </div>

  <!-- Popup show student leave details -->

<div class="container mx-auto ">
    <div class="flex justify-center">
      <div v-if="isShowLeaveDetails" class="fixed w-full h-full inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 " >
        <div class="w-[75%] p-6 bg-white rounded-md shadow-xl  mt-26">
          <div class="flex justify-end h-4 ">
              <svg @click="isShowLeaveDetails=false"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 cursor-pointer hover:text-red-400">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
          </div>
          <div  >
            <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-sky-400 ">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
            </svg>
              <h1 class="title text-sky-500  text-2xl text-bold mt-[-1.8rem] ml-7">Detail Information</h1>
          </div>
          <div class="mt-[-4០px]  h-[50vh] bg-gray-100  ">
            <div class="overflow-auto rounded-lg shadow mt-12 ">
              <table class=" w-[99%] m-auto">
                <tbody  >
                  <tr class="bg-gray-70 border-b-2 border-gray-190 border-2  border-gray-500" >
                    <th class="p-3 font-semibold tracking-wide text-start border-2  border-gray-500 w-1/5  ">Student Name</th>
                    <td  class="p-2 text-sm text-gray-700 text-center text-[1rem] w-1/3">{{detailsData.student.first_name}} {{detailsData.student.last_name}} </td>
                    <th class="p-3  font-semibold tracking-wide text-start border-2  border-gray-500 w-1/5">Leave Type</th>
                    <td  class="p-4 text-sm text-gray-700 text-center text-[1.1rem] w-1/3">{{detailsData.leave_type}}</td>
                  </tr>  
                  <tr class="bg-gray-70 border-b-2 border-gray-190  border-2  border-gray-500"  >
                    <th class="p-3  font-semibold tracking-wide text-start border-2  border-gray-500 ">Start Date</th>
                    <td  class="p-2 text-sm text-gray-700 text-center text-[1rem]">{{detailsData.start_date}}  </td>
                    <th class="p-3  font-semibold tracking-wide text-start border-2  border-gray-500 ">End Date</th>
                    <td  class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{detailsData.end_date}}</td>
                  </tr>  
                  <tr class="bg-gray-70 border-b-2 border-gray-190  border-2  border-gray-500">
                    <th class="p-3  font-semibold tracking-wide text-start border-2  border-gray-500 ">Duration</th>
                    <td  class="p-2 text-sm text-gray-700 text-center text-[1rem]">{{detailsData.duration}}  </td>
                    <th class="p-3  font-semibold tracking-wide text-start border-2  border-gray-500 ">Request Date</th>
                    <td  class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{detailsData.created_at}}</td>
                  </tr>  
                  <tr class="bg-gray-70 border-b-2 border-gray-190  border-2  border-gray-500 h-[20vh]" >
                    <th class="p-3  font-semibold tracking-wide text-start border-2  border-gray-500 ">Reason</th>
                    <td  class="p-2 text-sm text-gray-700 text-center text-[1rem]">{{detailsData.reason}} </td>
                  </tr>      
                </tbody>
              </table>
            </div>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<!-- ======================Popup rejected =====================-->
  <div class="container mx-auto">
    <div class="flex justify-center">
      <div v-show="isReject" class="fixed w-full h-full inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 ">
        <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl mb-44">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl mb-6"> Are you sure you want to reject?</h3>
          </div>
          <div class="mt-4 ml-[10rem]">
            <button @click="isReject = false" class="px-6 py-2 text-blue-800 border border-blue-600 rounded" >Cancel </button>
            <button @click="status('rejected', this.id)" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded"> Yes </button>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- ======================Popup Approved=====================-->
  <div class="container mx-auto ">
    <div class="flex justify-center">
      <div v-show="isAppove" class="fixed w-full h-full inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 " >
        <div class="w-[30%] p-6 bg-white rounded-md shadow-xl mb-44">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 bg-green-300 m-auto rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
          <div class="flex items-center justify-between ">
            <h3 class="text-2xl mb-6 mt-10 m-auto"> Approve is successfully</h3>
          </div>
          <div class="mt-4 ml-[9rem]">
            <button @click="isAppove = false " class="px-6  py-2 text-white border bg-blue-600 rounded" > OK </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template> 

<script>
export default{
   props:{
    listAllStudentsLeave:Array,
   },
   data(){
    return{  
      isShowDetail:false,
      isAppove: false,
      isReject:false,
      id:null,
      isShowLeaveDetails: false,
      details:'',
      detailsData: {}
    }
   },
   methods:{
    setId(id){
      this.id = id;
      this.isReject = true
    },
    status(data, id){
      if (data == "approved"){
        this.isAppove = true
      }else if (data == "rejected"){
        this.isReject = false
      }
      this.$emit('status', data, id);
    },
    studentDetailLeave(id){
      this.detailsData = this.listAllStudentsLeave.filter(leave=>leave.id == id)[0]
      console.log(this.detailsData)
      this.isShowLeaveDetails = !this.isShowLeaveDetails;
      },
    }
   }

</script>