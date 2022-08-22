<template>
  <div class="home">
    <StudentHome :student_data="students"/>
  </div>
</template>
<script>

import StudentHome from '@/components/student/StudentHome.vue';
import axios from '../axios-http';
export default {
  components: {
    StudentHome,
  },
  data(){
    return{
      students: []
    }
  },
  methods: {
    getData(){
      axios.get('student')
      .then(res =>  {
        this.students = res.data;
      })
    }
  },
  mounted(){
    this.getData();
  },
}
</script>
