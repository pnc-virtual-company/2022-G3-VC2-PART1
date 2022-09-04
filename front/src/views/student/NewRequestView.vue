<template>
  <div class="student-request">
    <form-alert v-if="success" ></form-alert>
    <form-request @request="addRequest"></form-request>
  </div>
</template>

<script>
import axiosClient from "../../axios-http";
import { dataStore } from '../../store/user-store.js';

export default {
  setup() {
    const userStore = dataStore()

    return { userStore }
  },
  data(){
    return{
      success: false,
    }
  },
  methods: {
    addRequest(data){
      axiosClient.post("request", data).then(res=>{
        console.log(res)
        this.success = true;
        this.sendSuccess(2000)
        axiosClient.get('sendMail/'+data.student_id+"/"+data.leave_type+"/"+data.reason,)
      })
    },

    sendSuccess(time){
      setTimeout(() => {
        this.success = false;
      }, time)
    }
  },
  computed:{

  },

  mounted(){
    this.userStore.change(true);
  }
}
</script>
