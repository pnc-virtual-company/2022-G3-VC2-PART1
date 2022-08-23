
 <template>
  <div class="mt-[-47px]  h-screen bg-gray-100  ">
    <div class="overflow-auto rounded-lg shadow mt-12 ">
      <table border="1" class=" w-[98%] m-auto">
        <thead class="bg-orange-300 border-b-2 border-gray-200 ">
            <tr class="text-2xl text-white">
              <th class="p-3  font-semibold tracking-wide text-center">Start Date</th>
              <th class="p-3  font-semibold tracking-wide text-center">End Date</th>
              <th class="p-3  font-semibold tracking-wide text-center">Reason</th>
              <th class="p-3  font-semibold tracking-wide text-center">Duration</th>
              <th class="p-3  font-semibold tracking-wide text-center">Leave Type</th>
              <th class="p-3  font-semibold tracking-wide ">Status</th>
              <th class="font-semibold tracking-wide ml-20">Request Date</th>
            </tr>
        </thead>
        <tbody>
          <tr class="bg-gray-50 border-b-2 border-gray-190 hover:bg-sky-100 "  v-for="studentList of selectOptions" :key="studentList">
            <td class="p-4 capitalize text-gray-500 justify-center m-21 text-[1.2rem]">{{studentList.start_date}} </td>
            <td class="p-4 capitalize text-gray-500 justify-center m-21 text-[1.2rem]">{{studentList.end_date}} </td>
            <td class="p-4 capitalize text-gray-500 justify-center m-21 text-[1.2rem]">{{studentList.reason}} </td>
            <td class="p-4 capitalize text-gray-500 justify-center m-21 text-[1.2rem]">{{studentList.duration}} day</td>
            <td class="p-4 capitalize text-gray-500 justify-center m-21 text-[1.2rem]">{{studentList.leave_type}} </td>
            <td v-if="studentList.status == 'padding'" class="p-4 capitalize text-sm text-yellow-500 text-center text-[1.2rem]">{{studentList.status}}</td>
            <td v-else-if="studentList.status == 'approved'" class="p-4 text-sm capitalize text-green-500 text-center text-[1.2rem]">{{studentList.status}}</td>
            <td v-else-if="studentList.status == 'canceled'" class="p-4 text-sm capitalize text-blue-500 text-center text-[1.2rem]">{{studentList.status}}</td>
            <td v-else class="p-4 text-sm text-red-500 capitalize text-center text-[1.2rem]">{{studentList.status}}</td>
            <!-- <td class="p-4 text-sm text-gray-500 text-center text-[1.2rem]">{{studentList.status}}</td>  -->
            <td class="p-4 text-sm text-gray-500 text-center text-[1.2rem]">{{studentList.created_at}}</td>
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
}
</script>