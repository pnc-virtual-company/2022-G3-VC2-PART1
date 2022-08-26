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
                    console.log(res.status);
                    this.old_password = ''
                })
                .catch(err => {
                    console.log(err)
                    this.old_password = err.response.data.success
                    }
                )
            }
        }
    }
</script>