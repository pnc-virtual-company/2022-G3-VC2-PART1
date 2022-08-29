
<template>
  <!-- <UserLogin @isNav="userLogin"></UserLogin> -->
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

  data(){
    return {
        userLogined:false,
        
    }
  },
  methods: {

    userLogin(){
      if(localStorage.getItem('token')){
         this.userLogined=true
      }else{
        this.userLogined=false
      }
    }
  },
  mounted(){
    this.userLogin()

  }
  // computed: {
  // }

}
</script>

<style scoped>
  body{
    background: white;
  }
</style>

