<template>
  <TheNavigation></TheNavigation>
 <router-view></router-view>
</template>

<style>
body{
  background: #fff;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
</style>
<script>


import TheNavigation from '@/components/navigation/TheNavigation.vue';
 
export default{
  components:{
    TheNavigation
  }

}
</script>
