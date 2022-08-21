<template>
  <div class="student-request">
    <form-request @request="addRequest"></form-request>
  </div>
</template>

<script>
import axios from "../axios-http";
export default {
  data(){
    return{
      
    }
  },
  methods: {
    addRequest(data){
      console.log(data);
      axios.post("request", data)
    },
  },
  computed:{

  },

  mounted(){

  }
}
</script>
