<template>
  <div class="">
    <p style="color: 130F40;" class="text-center mt-5 text-6xl">SLMS</p>  
    <div v-for="info in student_data" :key="info" class=" mt-5 m-auto w-ful w-2/4 bg-white rounded-lg border  shadow-md dark:bg-gray-800 dark:border-gray- border-t-4 border-indigo-200 border-t-teal-700">
      <div class="mt-5 flex flex-col items-center">
        <img class="mb-3 w-32 h-32 rounded-full shadow-lg" :src="info.img" alt="Bonnie image">
        <h5 class="mb-1 text-3xl font-medium text-gray-900 dark:text-white">{{info.first_name}} {{info.last_name}}</h5>
        <span class="text-lg text-gray-500 dark:text-gray-400">{{info.role}}</span>
      </div>
      <p class="mt-5 text-slate-400 text-center text-lg">Get start to make new request and see all your</p>
      <p class="text-slate-400 text-center text-lg">list leave in your account <span class="text-amber-400">SLMS</span></p>
      <button style="margin-left: 75%;" type="button" class=" mt-10 mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-3.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
      <router-link to="/student_list" class="flex text-xl items-center">start <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></router-link> 
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    student_data: Object,
  }
}
</script>

<style>

</style>


    