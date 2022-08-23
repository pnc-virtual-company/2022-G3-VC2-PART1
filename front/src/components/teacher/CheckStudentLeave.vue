
 <template>
 <div class=" flex justify-center m-auto items-center mt-6">
        <img class="h-18 w-20" src="../../assets/group.png" alt="">
        <h1 class="text-4xl text-black-400 font-semibold text-center  p-3 text-orange-400  ">List All Students Leave</h1>
    </div>
  <div class="mt-[-47px]  h-screen bg-gray-100  ">
    <div class="overflow-auto rounded-lg shadow mt-12 ">
      <table class=" w-[99%] m-auto">
        <thead class="bg-orange-300 border-b-2 border-gray-200 ">
            <tr class="text-xl text-white-1">
              <th class="p-3  font-semibold tracking-wide text-center ">Name</th>
              <th class="p-3  font-semibold tracking-wide text-center ">Leave Type</th>
              <th class="p-3  font-semibold tracking-wide text-center ">Start Date</th>
              <th class="p-3  font-semibold tracking-wide text-center ">End Date</th>
              <th class="p-3  font-semibold tracking-wide text-center ">Request Date</th>
              <th class="p-3  font-semibold tracking-wide text-center ">Status</th>
              <th class="p-3  font-semibold tracking-wide text-center ">Detail</th>
            </tr>
        </thead>
        <tbody>
          <tr class="bg-gray-70 border-b-2 border-gray-190 hover:bg-sky-100 "  v-for="studentReq of listAllStudentsLeave" :key="studentReq" :id="studentReq.id">
            <td  class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{studentReq.student.first_name}} {{studentReq.student.last_name}} </td>
            <td  class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{studentReq.leave_type}}</td>
            <td  class="p-4    text-gray-700 flex justify-center m-21 text-[1.1rem]"> {{studentReq.start_date}} </td> 
            <td  class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{studentReq.end_date}}</td>
            <td  class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{studentReq.created_at}}</td>
            <td  class="p-4 text-sm text-gray-700 text-center text-[1.1rem]" >
              <button @click="setId(studentReq.id)" type="button" class="bg-red-300 p-2 text-red-900 mr-1 rounded">Reject</button>
              <button @click="status('approved', studentReq.id)" type="button" class="bg-green-300 p-2 ml-1 text-green-800 rounded">Approve</button>
            </td>
            <td  class="p-4   text-gray-700 flex justify-center m-21 text-[1.1rem]">
              <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2" @click="hideShowDetail=!hideShowDetail">{{hideShowDetail? "Hide" : "Show Detail"}}</button>
            </td> 
            <p v-if="hideShowDetail" class="p-4    text-gray-700 flex justify-center m-21 text-[1.1rem]">Dureation : 3day </p> 
            <p v-if="hideShowDetail" class="p-4    text-gray-700 flex justify-center m-21 text-[1.1rem]">Reason : {{studentReq.reason}} </p> 
          </tr>  
        </tbody>
      </table>
    </div>
  </div>

  <div class="container mx-auto">
    <div class="flex justify-center">
      <div v-show="isReject" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 ">
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

  <div class="container mx-auto ">
    <div class="flex justify-center">
      <div v-show="isAppove" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 " >
        <div class="w-[30%] p-6 bg-white rounded-md shadow-xl mb-44">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 bg-green-300 m-auto rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
          <div class="flex items-center justify-between ">
            <h3 class="text-2xl mb-6 mt-10 m-auto"> Approve is successfully</h3>
          </div>
          <div class="mt-4 ml-[10rem]">
            <button @click="isAppove = false" class="px-6 py-2 text-white border bg-blue-600 rounded" > OK </button>
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
      hideShowDetail:false,
      isAppove: false,
      isReject:false,
      id:null,
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
    }
   }
}
</script>





