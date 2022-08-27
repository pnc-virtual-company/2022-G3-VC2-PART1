<template>
  <div class="home">
    <StudentHome />
  </div>
</template>

<script>
import StudentHome from '@/components/student/StudentHome.vue';
// import axios from '../axios-http';
export default {
  // name:"home",
  components: {
    StudentHome,
  },

  data(){
    return{
      // currentUser:{},
      // token:localStorage.getItem('token')
    }
    
  },

  mounted(){
    // this.getData();
  },

  methods: {
    // getData(){
    //   axios.get('student').then(res=>{
    //      console.log(res)
    //   })
    // }

  },
}

</script>

<style scroped>
  body{
    background: white;
  }
</style>