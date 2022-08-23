<template>
  <div class="">
    <p style="color: 130F40;" class="text-center mt-5 text-6xl">SLMS</p>
    
    <div v-for="info in student_data" :key="info" class=" mt-5 m-auto w-ful w-2/4 bg-white rounded-lg border  shadow-md dark:bg-gray-800 dark:border-gray- border-t-4 border-indigo-200 border-t-teal-700">
      <div class="mt-5 flex flex-col items-center">
        <img class="mb-3 w-32 h-32 rounded-full shadow-lg" :src="info.img" alt="Bonnie image">
        <h5 class="mb-1 text-3xl font-medium text-gray-900 dark:text-white">{{info.first_name}} {{info.last_name}}</h5>
        <span class="text-lg text-gray-500 dark:text-gray-400">{{info.email}}</span>
      </div>
      <!-- <p class="text-center text-2xl mt-3">Welcome to your <span class="text-amber-400">SLMS</span></p>
      <p class="text-center text-2xl">account</p> -->
      <p class="mt-5 text-slate-400 text-center text-lg">Get start to make new request and see all your</p>
      <p class="text-slate-400 text-center text-lg">list leave in your account <span class="text-amber-400">SLMS</span></p>
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