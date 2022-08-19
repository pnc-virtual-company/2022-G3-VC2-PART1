
 <template>
  <div class="mt-[-47px]  h-screen bg-gray-100  ">
    <div class="overflow-auto rounded-lg shadow mt-12 ">
      <table class=" w-[98%] m-auto">
        <thead class="bg-orange-300 border-b-2 border-gray-200 ">
            <tr class="text-2xl text-white">
              <th class="p-3  font-semibold tracking-wide text-center ">Leave type</th>
              <th class="  font-semibold tracking-wide  ml-20  ">Request Date</th>
              <th class="p-3  font-semibold tracking-wide ">Status</th>
            </tr>
        </thead>
        <tbody>
          <tr class="bg-gray-50 border-b-2 border-gray-190 hover:bg-sky-100 "  v-for="studentList of selectOptions" :key="studentList">
            <td class="p-4   text-gray-700 flex justify-center m-21 text-[1.2rem]">{{studentList.leave_type}} </td>
            <td class="p-4 text-sm text-gray-700 text-center text-[1.2rem]">{{studentList.request_date}}</td>
            <td class="p-4 text-sm text-gray-700 text-center text-[1.2rem]">{{studentList.allow}}</td>
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