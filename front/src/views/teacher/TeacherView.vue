<template>
    <ListAllStudent :listAllStudents="listAllStudents"></ListAllStudent>
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
        }
    },
    mounted(){
        this.getAllStudents();
  }
}

</script>
