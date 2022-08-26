<template>
  <div class="student">
    <ShowStudentLeave @select-Option="selectOption"></ShowStudentLeave>
    <StudentLeave v-if="selectOptions.length>=1"  :selectOptions='selectOptions'/>
  </div>
</template>
<script>
import axios from "../../axios-http.js";
import StudentLeave from '@/components/student/StudentLeave.vue';
import ShowStudentLeave from '@/components/student/ShowStudentLeave.vue';

export default {
  name: 'StudentView',
  components: {
    StudentLeave,
    ShowStudentLeave
  },
  data(){
    return{
      listStudentLeave:[],
      selectTypeLeave:'',
      status:'',
    }
  },
  methods:{
    getListStudent(){
      axios.get('request').then((req)=>{ 
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
  }
}
</script>

<style scoped>
  .student{
    width: 95%;
    margin: auto;
  }
</style>