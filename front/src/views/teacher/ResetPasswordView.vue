<template>
    <div class="reset-password">
        <form-reset-password @password="resetPassword" :old_password_validation="old_password"></form-reset-password>
    </div>
</template>


<script>
    import axios from "../../axios-http.js"
    export default {
        data(){
            return{
                old_password:""
            }
        },
        methods:{
            resetPassword(data){
                axios.put("resetPassword/9", data)
                .then( res =>  {
                    this.old_password = res.data.success
                })
                .catch(err => {
                    this.old_password = err.response.data.success
                    }
                )
            }
        }
    }
</script>