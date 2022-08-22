
<template>
  <TheNavigation></TheNavigation>
  <!-- <student-signup/> -->
  <user-login/>
  <router-view></router-view>
</template>

<script>
import TheNavigation from '@/components/navigation/TheNavigation.vue';

export default{
  components:{
    TheNavigation
  }
}
</script>

<style>
  body{
    background: white;
  }
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #2c3e50;
    }
  
</style>

