
 <template>
  <div class="mt-[-47px] bg-gray-100  ">
    <div class="overflow-auto rounded-lg shadow mt-12 ">
      <table  class=" w-[98%] m-auto">
        <thead class="bg-orange-300 border-b-2 border-gray-200 ">
            <tr class="text-base text-white">
              <th class="p-3 font-semibold tracking-wide text-start">Start Date</th>
              <th class="p-3 font-semibold tracking-wide text-start">End Date</th>
              <th class="p-3 font-semibold tracking-wide text-start">Reason</th>
              <th class="p-3 font-semibold tracking-wide text-start">Duration</th>
              <th class="p-3 font-semibold tracking-wide text-start">Leave Type</th>
              <th class="p-3 font-semibold tracking-wide ">Status</th>
              <th class="font-semibold tracking-wide ml-20">Request Date</th>
            </tr>
        </thead>
        <tbody>
          <tr class="bg-gray-50 border-b-2 border-gray-190 hover:bg-sky-100 "  v-for="studentList of selectOptions" :key="studentList">
            <td class="p-4 capitalize text-gray-500 justify-center m-21 text-sm">{{studentList.start_date}} </td>
            <td class="p-4 capitalize text-gray-500 justify-center m-21 text-sm">{{studentList.end_date}} </td>
            <td class="p-4 capitalize text-gray-500 justify-center m-21 text-sm">{{studentList.reason}} </td>
            <td class="p-4 capitalize text-gray-500 justify-center m-21 text-sm">{{studentList.duration}} day</td>
            <td class="p-4 capitalize text-gray-500 justify-center m-21 text-sm">{{studentList.leave_type}} </td>
            <td v-if="studentList.status == 'padding'" class="p-4 capitalize text-sm text-yellow-500 text-center text-sm">{{studentList.status}}</td>
            <td v-else-if="studentList.status == 'approved'" class="p-4 text-sm capitalize text-green-500 text-center text-sm">{{studentList.status}}</td>
            <td v-else-if="studentList.status == 'canceled'" class="p-4 text-sm capitalize text-blue-500 text-center text-sm">{{studentList.status}}</td>
            <td v-else class="p-4 text-sm text-red-500 capitalize text-center text-sm">{{studentList.status}}</td>
            <!-- <td class="p-4 text-sm text-gray-500 text-center text-sm">{{studentList.status}}</td>  -->
            <td class="p-4 text-sm text-gray-500 text-center text-sm">{{studentList.created_at}}</td>
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
   },
}
</script>