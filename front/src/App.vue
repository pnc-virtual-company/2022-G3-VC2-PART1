
<template>
  <TheNavigation></TheNavigation>

  <!-- <UserLogin @login="login"></UserLogin> -->
  <router-view></router-view>
</template>

<script>
export default{
  components:{
    
  },
  data(){
    return {
        logined:true,
    }
  },
  methods: {
    login(data){
      console.log(data)
      this.logined=data;
    }
  }
}
</script>

<style scoped>
  body{
    background: white;
  }
</style>

