<template>
    <user-detail :role="role" :data="userData"></user-detail>
</template>

<script>
    import axiosClient from "../../axios-http.js"
import { dataStore } from '../../store/user-store.js';
export default {
  setup() {
    const userStore = dataStore()
    return { userStore }
  },

  data(){
    return{ 
        role: this.userStore.role  ,
        userData: {},
        path: "/student/"
    }
  },
  methods:{
    getUserData(){
        if(this.userStore.role == "teacherLogin"){
            this.path = "/teacher/"
        }
        axiosClient.get(this.path+this.userStore.userId)
        .then(res=>{
            this.userData = res.data
        })
    }
  },

  mounted(){
    this.userStore.change(true);
    this.getUserData();
  }

}

</script>