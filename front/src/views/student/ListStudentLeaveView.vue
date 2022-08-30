<template>
  <div class="student">
    <ShowStudentLeave @select-Option="selectOption"></ShowStudentLeave>
    <student-leave v-if="selectOptions.length>=1"  :selectOptions='selectOptions'/>
    <h1 v-else class="text-3xl text-center" >Not Found</h1>
</div>
</template>
<script>
import axios from "../../axios-http.js";
import ShowStudentLeave from '@/components/student/FilterStudentView.vue';
import { dataStore } from '../../store/user-store.js';

export default {
  setup() {
    const userStore = dataStore()

    return { userStore }
  },
  name: 'StudentView',
  components: {
    ShowStudentLeave
  },
  data(){
    return{
      listStudentLeave:[],
      selectTypeLeave:'',
      status:'',
      student_id: localStorage.getItem('userId')
    }
  },
  methods:{
    getListStudent(){
      axios.get('get_student_request/'+this.student_id).then((req)=>{ 
        console.log(req.data);
        this.listStudentLeave = req.data
      })
    },
    selectOption(leaveType,status){
      this.selectTypeLeave = leaveType
      this.status = status 
    },

    checkStatus(status, data){
      if(status == ""){
        data
      }else{
        data = data.filter(request_status => request_status.status == status);
      }
      return data;
    }
  },

  computed:{
    selectOptions(){
        let datas=this.listStudentLeave
        if(this.selectTypeLeave == ''){
          datas
        }else{
          datas = datas.filter(data => data.leave_type == this.selectTypeLeave)
        }
        let result = this.checkStatus(this.status, datas)
        return result;
      }
  },
  mounted(){
    this.getListStudent();
    this.userStore.change(true)
  },
}
</script>

<style scoped>
  .student{
    width: 95%;
    margin: auto;
  }
</style>