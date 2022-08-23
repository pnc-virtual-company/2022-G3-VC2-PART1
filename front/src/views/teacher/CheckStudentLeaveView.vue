<template>
    <CheckStudentLeave @status="updateStatus" :listAllStudentsLeave="listAllStudentsLeave"></CheckStudentLeave>
</template>
<script>
import axios from "../../axios-http.js";
import CheckStudentLeave from '@/components/teacher/CheckStudentLeave.vue';
export default {
    components:{
    CheckStudentLeave
},
    data(){
        return{
            status:'',
            listAllStudentsLeave:[],
        }
    },
    methods:{
        getAllStudentsRequest(){
            axios.get('request').then((res)=>{
                this.listAllStudentsLeave = res.data
            })
        },
        updateStatus(status, id){
            let request = {status:status}
            axios.put('request/update_status/'+id, request)
        }
    }, 
    mounted(){
        this.getAllStudentsRequest();
  }
}

</script>
