
<template v-cloak>
  <TheNavigation v-if="userStore.login"></TheNavigation>
  <router-view></router-view>
</template>

<script>
  import TheNavigation from './components/navigation/TheNavigation.vue'
  import { dataStore } from './store/user-store.js';

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
  }
}
</script>

<style>
  body{
    background: white;
  }

  [v-cloak] {
  display: none;
  }
</style>

