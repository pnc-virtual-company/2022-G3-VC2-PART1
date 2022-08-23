
<template>
  <TheNavigation></TheNavigation>
  <!-- <student-signup/> -->
  <!-- <user-login/> -->
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
  
</style>

