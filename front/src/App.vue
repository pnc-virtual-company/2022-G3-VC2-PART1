<template>
<TheNavigation>
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link> 
  </nav>
</TheNavigation>
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
    }
</style>



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


