<template>
    <div class="reset-password">
        <form-reset-password @password="resetPassword" :old_password_validation="old_password"></form-reset-password>
    </div>
</template>


<script>
    import axios from "../../axios-http.js"
    import { dataStore } from '../../store/index.js';

    export default {
        setup() {
            const userStore = dataStore()

            return { userStore }
        },
        data(){
            return{
                old_password:""
            }
        },
        methods:{
            resetPassword(data){
                let userId = localStorage.getItem('userId')
                axios.put("resetPassword/"+userId, data)
                .then( res =>  {
                    this.old_password = res.data.success
                })
                .catch(err => {
                    this.old_password = err.response.data.success
                    }
                )
            }
        },
        mounted(){
            this.userStore.change(true);
        }
    }
</script>