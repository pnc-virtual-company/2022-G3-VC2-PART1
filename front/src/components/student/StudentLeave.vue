
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
          <tr @click="showDetail" class="bg-gray-50 border-b-2 border-gray-190 hover:bg-sky-100 "  v-for="studentList of selectOptions" :key="studentList" :id="studentList.id" >
            <router-link to="/student_detailLeave">
              <td :id="studentList.id" class="p-4   text-gray-700 flex justify-center m-21 text-[1.2rem]">{{studentList.leave_type}} </td> 
            </router-link>
             <!-- <router-link to="/student_detailLeave"> -->
            <td :id="studentList.id" class="p-4 text-sm text-gray-700 text-center text-[1.2rem]">{{studentList.created_at}}</td>
            <!-- </router-link> -->
            <td :id="studentList.id" class="p-4 text-sm text-gray-700 text-center text-[1.2rem]">{{studentList.allow}}</td>
          </tr>  
        </tbody>
      </table>
    </div>
  </div>
</template> 

<script>
  import axios from 'axios';

export default{
   props:{
    selectOptions:Function,
   },
   data(){
    return{
      url:'http://127.0.0.1:8000/api/request/',
    }
   },
   methods:{
    showDetail(event){
      axios.get(this.url+event.target.id).then((res)=>{ 
        localStorage.removeItem('leave_type')
        localStorage.removeItem('start_date')
        localStorage.removeItem('end_date')
        localStorage.removeItem('reason')
        // console.log(res.data)
        localStorage.setItem('leave_type', (res.data.leave_type));
        localStorage.setItem('start_date', (res.data.start_date));
        localStorage.setItem('end_date', (res.data.end_date));
        localStorage.setItem('reason', (res.data.reason));
        location.reload();
      })
    }
   }
}
</script>