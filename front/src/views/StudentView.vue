<template>
  <div class="student">
    <ShowStudentLeave @select-Option="selectOption"></ShowStudentLeave>
    <StudentLeave :selectOptions='selectOptions'/>
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
  },

  computed:{
    selectOptions(){
        let data=this.listStudentLeave
        if(this.selectTypeLeave =='show all'){
          data
        }
        if(this.status == 'show all' ){
          data
        }
        else if (this.status ){
          data=this.listStudentLeave.filter(list=>list.allow.toLowerCase()==this.status.toLowerCase())
        }
        else if(this.selectTypeLeave ){
          data = this.listStudentLeave.filter(list=>list.leave_type.toLowerCase()==this.selectTypeLeave.toLowerCase() )
        }
        return data
      }
  },
  mounted(){
    this.getListStudent();
  }
}
</script>
