
<template>
  <TheNavigation v-if="userStore.login"></TheNavigation>
  <router-view></router-view>
</template>

<script>
  import TheNavigation from './components/navigation/TheNavigation.vue'
  import { dataStore } from './store/index.js';

export default {
  setup() {
    const userStore = dataStore()

    return { userStore }
  },
  components:{
    TheNavigation
  },  
  computed: {
    getUserId(){
      return localStorage.getItem('userId');
    },
  },
  mounted(){
    console.log(this.userStore.login)
  }
}
</script>

<style scoped>
  body{
    background: white;
  }
</style>

