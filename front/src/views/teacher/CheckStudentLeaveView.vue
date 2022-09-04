<template>
    <CheckStudentLeave @status="updateStatus" :listAllStudentsLeave="listAllStudentsLeave"></CheckStudentLeave>
</template>
<script>
import axiosClient from "../../axios-http.js";
import CheckStudentLeave from '@/components/teacher/CheckStudentLeave.vue';
import { dataStore } from '../../store/user-store.js';

export default {
  setup() {
    const userStore = dataStore()
    return { userStore }
  },

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
            axiosClient.get('/get_padding').then((res)=>{
                this.listAllStudentsLeave = res.data
            })
        },
        updateStatus(status, id){
            let request = {status:status}
            axiosClient.put('request/update_status/'+id, request).then((res)=>{
                console.log(res.data);
                this.getAllStudentsRequest()
            });
        }
    }, 
    mounted(){
        this.getAllStudentsRequest();
        this.userStore.change(true);
  }
}

</script>
