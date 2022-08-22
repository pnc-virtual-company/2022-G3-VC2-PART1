<template>
<nav class="justify-between bg-sky-400  p-0.5 shadow-8xl border-b-2 border-gray-250  ">
  <div class="flex items-center flex-shrink-0 text-white mr-6">
    <router-link to="/" ><img  class="w-40 ml-5" src="../../assets/logo.png" alt="" ></router-link>
  </div>
  <div class="flex items-center flex-wrap">
      <router-link to="/student_list" class="text-white mx-9 hover:text-orange-500  text-xl block mt-4 lg:inline-block lg:mt-0 ">
        List all leave
      </router-link>
      <router-link to="/new_request" class=" hover:text-orange-500 mx-12 block mt-4 lg:inline-block lg:mt-0 text-white  text-xl border-b-2-orange-500">
        New Request
      </router-link>
  </div>
    <div class="w-[15%] flex mx-12 ml-10 justify-around ">
      <img src="../../assets/profile.png" alt="" class="h-14 rounded-full object-cover bg-gray-100  border-gray-300 border mt-1">
      <div class="text-sm flex items-center text-black ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 cursor-pointer " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-white-500 >
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
      </div>
    </div>

   
</nav>
</template>

<style>


nav {
  padding: 30px;
  display: flex;
  justify-content: space-between;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}


nav a.router-link-exact-active { 
  /* background: rgb(230, 180, 88);  */
  border-bottom: 3px solid orange;
}
</style> 
