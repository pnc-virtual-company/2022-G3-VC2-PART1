<template>
  <form @submit.prevent="onChange" enctype="multipart/form-data">
    <h1>{{image}}</h1>
    <input type="file" accept="image/*" class="" ref="file" @change="onFileChange">
    <button class="btn bg-sky-400 py-1 px-3 ">submit</button>
    <img :src="image" alt="">
  </form>
</template>

<script>
import axios from '../axios-http';
export default {
  data() {
    return {
      image: null,
      aa: ""
    }
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      this.image = URL.createObjectURL(file);
    },

    onChange() {
      axios.put("/img/1", this.image)
        .then(res => {
          console.log(res);

        })
        .catch(function (error) {
          console.log(error);
        })
    }

  }
}
</script>

<style>
</style>