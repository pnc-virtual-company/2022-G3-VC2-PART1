
 <template>
  <div class="mt-[-47px]  h-screen bg-gray-100  ">
    <div class="overflow-auto rounded-lg shadow mt-12 ">
      <table class=" w-[98%] m-auto">
        <thead class="bg-orange-300 border-b-2 border-gray-200 ">
            <tr class="text-xl text-white-1">
              <th class="p-3  font-semibold tracking-wide text-center ">Start Date</th>
              <th class="p-3  font-semibold tracking-wide text-center ">End Date</th>
              <th class="p-3  font-semibold tracking-wide text-center ">Reason</th>
              <th class="p-3  font-semibold tracking-wide text-center ">Duration</th>
              <th class="p-3  font-semibold tracking-wide text-center ">Leave type</th>
              <th class="p-3  font-semibold tracking-wide ">Status</th>
              <th class="  font-semibold tracking-wide  ml-20  ">Request Date</th>
            </tr>
        </thead>
        <tbody>
          <tr class="bg-gray-70 border-b-2 border-gray-190 hover:bg-sky-100 "  v-for="studentList of selectOptions" :key="studentList" :id="studentList.id" >
            <td :id="studentList.id" class="p-4   text-gray-700 flex justify-center m-21 text-[1.1rem]">{{studentList.start_date}} </td> 
            <td :id="studentList.id" class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{studentList.end_date}}</td>
            <td :id="studentList.id" class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{studentList.reason}}</td>
            <td :id="studentList.id" class="p-4   text-gray-700 flex justify-center m-21 text-[1.1rem]">{{}}3 day </td> 
            <td :id="studentList.id" class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{studentList.leave_type}}</td>
            <td :id="studentList.id" class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{studentList.allow}}</td>
            <td :id="studentList.id" class="p-4 text-sm text-gray-700 text-center text-[1.1rem]">{{studentList.created_at}}</td>
          </tr>  
        </tbody>
      </table>
    </div>
  </div>
</template> 

<script>

export default{
   props:{
    selectOptions:Function,
   },
   data(){
    return{  
    }
   },
   methods:{
   }
}
</script>