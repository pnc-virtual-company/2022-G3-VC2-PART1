<template>
  <div class="student-request">
    <form-request @request="addRequest"></form-request>
  </div>
</template>

<script>
import axios from "../../axios-http";
export default {
  data(){
    return{
      
    }
  },
  methods: {
    addRequest(data){
      axios.post("request", data).then(res=>{
        console.log(res)
        axios.get('sendMail/'+data.student_id+"/"+data.leave_type+"/"+data.reason, )
      })
    },
  },
  computed:{

  },

  mounted(){

  }
}
</script>
