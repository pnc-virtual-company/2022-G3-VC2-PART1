<template>
  <div class="student">
    <ShowStudentLeave @select-Option="selectOption"></ShowStudentLeave>
    <StudentLeave :selectOptions='selectOptions' />
  </div>
</template>
<script>
import axios from "../axios-http.js";
import '../input.css'
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
      selectTypeLeave:"show all",
      selectStatus:"show all",
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
      this.selectStatus = status 
    },
    // checkStatus(status, data){
    //   if(status == 'all'){
    //     data
    //   }else if(status == 'family'){
    // }
  },
  computed:{
    selectOptions(){
        let dataStudents = this.listStudentLeave
        if(this.selectTypeLeave =='show all'  || this.selectStatus =='show all'){
          dataStudents
        }
        else if (this.selectStatus !=''){
          dataStudents = this.listStudentLeave.filter(student=>student.allow.toLowerCase() == this.selectStatus.toLowerCase())
        }
        else if(this.selectTypeLeave !=''){
          dataStudents = this.listStudentLeave.filter(student=>student.leave_type.toLowerCase() == this.selectTypeLeave.toLowerCase() )
        }
        return dataStudents
      }
  },
  //  provide(){
  //   return{
  //     listStudentLeave: this.listStudentLeave
  //   }
  // },
  mounted(){
    this.getListStudent();
  }
}
</script>
