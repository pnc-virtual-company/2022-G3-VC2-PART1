<template>
    <ListAllStudent @delete_student="deleteStudent" :listAllStudents="listAllStudents"  :listStudentLeave="listStudentLeave"></ListAllStudent>

</template>
<script>
import axios from "../../axios-http.js";
import ListAllStudent from '@/components/teacher/ListAllStudent.vue';
import { dataStore } from '../../store/user-store.js';

export default {
    setup() {
        const userStore = dataStore()
        return { userStore }
    },
    components:{
        ListAllStudent,
    },
    data(){
        return{
            listAllStudents:[],
            listStudentLeave:[],
        }
    },
    methods:{
        getAllStudents(){
            axios.get('student').then((res)=>{
                this.listAllStudents = res.data
            })
        },
        getAllStudentLeave(){
            axios.get('get_padding').then((res)=>{
                console.log(res.data)
                this.listStudentLeave = res.data
            });
        },
        deleteStudent(id){
            axios.delete('student/'+id).then((response) => {
                this.getAllStudents()
                console.log(response.data);
      })
    },
    },
    mounted(){
        // this.userStore.changeUserRole('teacherLogin')
        this.getAllStudents();
        this.getAllStudentLeave()
        console.log(this.userStore.login)
        this.userStore.change(true);
  }
}

</script>
