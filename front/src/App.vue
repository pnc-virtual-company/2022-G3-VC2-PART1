<template>
<<<<<<< HEAD
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link> 
  </nav>
  <router-view/>
</template>

<style>
body{
  background: rgba(233, 233, 233, 0.747);
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
=======
  <TheNavigation></TheNavigation>
</template>
<script>
import TheNavigation from '@/components/navigation/TheNavigation.vue';
 
export default{
  components:{
    TheNavigation
  }
>>>>>>> 34919ba5fb030caf254530fe0669c7b9f3aac3e0
}
</script>
