
 <template>
    <div class=" flex justify-center m-auto items-center mt-6">
        <img class="h-18 w-20" src="../../assets/group.png" alt="">
        <h1 class="text-4xl text-black-400 font-semibold text-center  p-3 text-orange-400  ">List All Students</h1>
    </div>
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
            <!-- <td class="p-4 text-sm text-gray-700 text-center text-[1.1rem] flex ">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
            </td> -->
          </tr>     
        </tbody>
      </table>
    </div>
  </div>
</template> 
<script>
    export default{
        props:{
            listAllStudents: Array
        },
        data(){
            return{

            }
        }
    }
 
</script>