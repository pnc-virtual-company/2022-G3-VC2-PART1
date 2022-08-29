
<template>
  <TheNavigation v-if="userLogined" ></TheNavigation>
  <!-- <UserLogin @isNav="userLogin"></UserLogin> -->
  <router-view></router-view>
</template>

<script>
import TheNavigation from './components/navigation/TheNavigation'
export default{
  components:{
    TheNavigation
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

