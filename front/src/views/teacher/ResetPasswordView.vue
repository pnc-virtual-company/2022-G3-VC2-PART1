<template>
    <div class="reset-password">
        <form-reset-password @password="resetPassword"></form-reset-password>
    </div>
</template>


<script>
    export default {
        data(){
            return{

            }
        },
        methods:{
            resetPassword(password){
                console.log(password)
            }
        }
    }
</script>