<template>
  
<div  class="personal-info sm:p-6 bg-red-300 sm:w-10/12 flex mt-6 m-auto flex-col items-center bg-white rounded-lg border shadow-md sm:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-20 rounded-t-lg sm:h-auto sm:w-48 md:rounded-none md:rounded-l-lg" src="../assets/Man.jpg" alt="">
    <div class="flex info-details sm:ml-6 md:w-9/12 flex-col justify-between leading-normal">
        <h5 class="mb-2 m-auto text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Your Information</h5>
        <ul class="text-sm md:text-md">
          <li class="flex justify-between mt-6 ">
            <span class="flex w-2/4">
              <p class="font-bold mr-2 email-title">Email: </p>
              <p class="text-md email"> {{data.email}}</p> 
            </span>
          </li>
          <li class="flex sm:justify-between mt-6 ">
            <span class="flex w-2/4">
              <p class="font-bold mr-2">First Name: </p> <p> {{data.first_name}}</p> 
            </span>
            <span class="flex w-2/4">
              <p class="font-bold mr-2">Last Name: </p> <p> {{data.last_name}}</p> 
            </span>
          </li>
          <li class="flex sm:justify-between mt-6 ">
            <span class="flex w-2/4">
              <p class="font-bold mr-2">Gender: </p> <p class="capitalize"> {{data.gender}}</p> 
            </span>
            <span class="flex w-2/4">
              <p class="font-bold mr-2">Phone : </p> <p> {{data.phone}}</p> 
            </span>
          </li>
          <li class="flex sm:justify-between mt-6 ">
            <span v-if="role=='studentLogin' " class="flex w-2/4">
              <p class="font-bold mr-2">Batch: </p> <p> {{data.batch}}</p> 
            </span>
          </li>
        </ul>
    </div>
</div>
</template>
<script>
export default {
  props: {
    data: Object,
    role: String,
  },

  
}
</script>

<style scoped>
 @media (max-width: 640px) {

  .info-details{
    width: 100%;
    padding: 10px;
  }
 }
 @media (max-width: 480px) {
 
  .email-title{
    display: none;
  }
  .email{
    font-size: 1rem;
  }
 }
</style>