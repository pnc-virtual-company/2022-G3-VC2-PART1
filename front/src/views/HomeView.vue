<template>
  <div class="home">
    <StudentHome />
  </div>
</template>

<script>
import StudentHome from '@/components/student/StudentHome.vue';
import { dataStore } from '../store/index.js';

export default {
  setup() {
    const userStore = dataStore()

    return { userStore }
  },
  components: {
    StudentHome,
  },

  data(){
    return{

    }
    
  },

  mounted(){
    this.userStore.change(true);
  },

  methods: {


  },
}

</script>

<style scroped>
  body{
    background: white;
  }
</style>