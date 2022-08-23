<template>
<div v-if="profile">
  <div id="popup-modal" tabindex="-1" class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
      <div class="relative p-4 h-full md:h-auto  w-screen">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
              <div class="p-6 text-center">
                  <h1 class="title text-sky-500 ml-32 text-3xl text-bold ">Personal Information</h1>
                  <div class="container max-w-screen-lg m-auto border border-gray-200 shadow-md hover:bg-gray-100  flex items-center px-5 py-5 bordor rounded-md ">
                      <div class=" relative inline-block overflow-hidden ">
                          <img v-if="url == null" class="h-60 w-80 " src="../assets/profile.png" alt="" >
                          <img v-else class="h-60 w-80 border rounded-full object-cover  "   :src="url" alt="">
                          <div class="absolute bottom-0 h-16 w-full flex items-center justify-center" >
                              <input type="file" accept="image/*" class="hidden"  ref="file" @change="onFileChange" multiple >
                              <button class="rounded-full hover:bg-white hover:bg-opacity-25 p-4 focus:outline-none text-white transition duration-200" @click="onChnage"><svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></button>
                          </div>
                      </div>
                    <div class="detail w-full px-5 flex justify-around ">
                      <div class="info  text-lg ">
                          <h1 >First-Name : </h1>
                          <h1>Gender :  </h1>
                          <h1>Birth Date : </h1>
                          <h1 >Class : </h1>
                      </div>
                      <div class="info  text-lg">
                          <h1> Kea </h1>
                          <h1> Male </h1>
                          <h1> 5-feb-2004 </h1>
                          <h1 > WEB2022 B</h1>
                      </div>
                      <div class="info text-lg">
                          <h1>LastName :</h1>
                          <h1>Age : </h1>
                          <h1>Address :</h1>
                      </div>
                      <div class="info text-lg">
                          <h1> Nhor</h1>
                          <h1> 18</h1>
                          <h1> Takeo</h1>
                      </div>
                      </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
</template>
<script>
// import axios from '../axios-http'
export default {
  props:['profile'],
    data() {
        return {
            url: null,
            editstudent:null,
            students:[]
        }
},

methods: {
  onFileChange(e) {
    const file = e.target.files[0];
    this.url = URL.createObjectURL(file);
    // this.updateImage()
  },
  onChnage(){
    this.$refs.file.click();
  },

  // updateImage(){
  //   axios
  //     .patch('/student/1', this.editstudent)
  //     .then(response => console.log(response.data))
  // }
},
  mounted(){
    // this.updateImage();
  },
}
</script>
