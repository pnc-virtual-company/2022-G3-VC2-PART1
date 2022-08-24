<template>
  <div class="home">
    
    <StudentHome :student_data="currentUser"/>
  </div>
</template>
<script>

import StudentHome from '@/components/student/StudentHome.vue';
import axios from '../axios-http';
export default {
  // name:"home",
  components: {
    StudentHome,
  },
  data(){
    return{
      currentUser:{},
      token:localStorage.getItem('token')
    }
    
  },
  methods: {
    getData(){
      axios.get('student').then(res=>{
         console.log(res)
      })
    }
  },
 
}
</script>
