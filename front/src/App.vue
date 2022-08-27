
<template>
  <TheNavigation ></TheNavigation>
  <UserLogin @login="userLogin"></UserLogin>
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
        logined:true,
    }
  },
  methods: {
    userLogin(data){
      console.log(data)
      // this.logined=data;
    }
  }
}
</script>

<style scoped>
  body{
    background: white;
  }
</style>

