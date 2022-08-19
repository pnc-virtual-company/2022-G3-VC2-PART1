<template>
  <div class="home">
    <StudentHome :student_data="students"/>
  </div>
</template>

<script>
// @ is an alias to /src
import StudentHome from '@/components/StudentHome.vue'
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
