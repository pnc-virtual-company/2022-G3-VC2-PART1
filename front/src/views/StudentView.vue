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
    checkStatus( data, status){
      if(status == 'all'){
        data
      }else if(status == "padding"){
        data = data.filter(status=>status.allow.toLowerCase == 'padding');
      }else if(status == "canceled"){
        data = data.filter(status=>status.allow.toLowerCase == 'canceled');
      }else if(status == "rejected"){
        data = data.filter(status=>status.allow.toLowerCase == 'rejected');
      }else{
        data = data.filter(status=>status.allow.toLowerCase == 'approved');
      }
    }
  },
  computed:{
    selectOptions(){
        let dataStudents = this.listStudentLeave
        if(this.selectTypeLeave =='show all'){
          dataStudents = this.listStudentLeave
          this.checkStatus(dataStudents, this.selectStatus);
        }
        else if (this.selectTypeLeave == "family's event"){
          dataStudents = this.listStudentLeave.filter(student=>student.leave_type == "family's event");
          this.checkStatus(dataStudents, this.selectStatus);
        }
        else if(this.selectTypeLeave =='sick'){
          dataStudents = this.listStudentLeave.filter(student=>student.leave_type == 'sick');
          this.checkStatus(dataStudents, this.selectStatus);
          
        }else{
          dataStudents = this.listStudentLeave.filter(student=>student.leave_type == 'broder or sister married');
          this.checkStatus(dataStudents, this.selectStatus);
        }
        return dataStudents
      }
  },
  mounted(){
    this.getListStudent();
  }
}
</script>
