<template>
    <ListAllStudent @delete_student="deleteStudent" :listAllStudents="listAllStudents"></ListAllStudent>
</template>
<script>

import axios from "../../axios-http.js";
import ListAllStudent from '@/components/teacher/ListAllStudent.vue';
export default {
    components:{
        ListAllStudent,
    },
    data(){
        return{
            listAllStudents:[],
        }
    },
    methods:{
        getAllStudents(){
            axios.get('student').then((res)=>{
                this.listAllStudents = res.data
            })
        },
        deleteStudent(id){
            axios.delete('student/'+id).then((response) => {
                this.getAllStudents()
                console.log(response.data);
      })
    },
    },
    mounted(){
        this.getAllStudents();
  }
}

</script>
