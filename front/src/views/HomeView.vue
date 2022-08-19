<template>
  <div class="home">
    <StudentHome :student_data="students"/>
  </div>
</template>

<script>
// @ is an alias to /src
// import StudentHome from '@/components/StudentHome.vue'
import StudentHome from '@/components/student/StudentHome.vue';
import axios from '../axios-http';
// import '../input.css'
export default {
  components: {
    StudentHome,
  },

  data(){
    return{
      students: []
    }
  },

  mounted(){
    this.getData();
  },

  methods: {
    getData(){
      axios.get('student')
      .then(res =>  {
        this.students = res.data;
      })
    }
  }
}
</script>
