<template>
  <div class="student-request">
    <form-request @request="addRequest"></form-request>
  </div>
</template>

<script>
import axios from "../../axios-http";
import { dataStore } from '../../store/index.js';

export default {
  setup() {
    const userStore = dataStore()

    return { userStore }
  },
  data(){
    return{
      
    }
  },
  methods: {
    addRequest(data){
      console.log(data)
      axios.post("request", data).then(res=>{
        console.log(res)
        axios.get('sendMail/'+data.student_id+"/"+data.leave_type+"/"+data.reason, )
      })
    },
  },
  computed:{

  },

  mounted(){
    this.userStore.change(true);
  }
}
</script>