<template>
<div class="flex justify-between mt-2 flex-wrap">
    <img class=" grow-0 shrink-1 md:shrink-0  basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0" src="../../assets/Homepage.svg" alt="" />
    <div class="typewriter  md:m-auto sm:m-auto  lg:m-auto xl:w-6/12 lg:w-6/12 md:w-10/12 mb-5 p-2  ">
      <h1 class="font-bold text-2xl text-center sm:hidden">Welcome to web SLMS</h1>
      <h1 class="font-bold text-2xl text-center hidden sm:block">Welcome to web application SLMS</h1>
      <h1 class="text-center">With this app you can do :</h1>
      <div v-for="(benifit, index) in benifits" :key="index" class="flex w-100 shadow-lg rounded-lg mt-5   ">
        <div class="bg-green-600 py-4 px-6 rounded-l-lg flex items-center ">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="text-white fill-current"
            viewBox="0 0 16 16"
            width="20"
            height="20"
          >
            <path
              fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"
            ></path>
          </svg>
        </div>
        <div
          class="
            px-4
            py-6
            bg-white
            rounded-r-lg
            flex
            justify-between
            items-center
            w-full
            border border-l-transparent border-gray-200
          "
        >
          <div>{{benifit}}</div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axiosClient from "../../axios-http.js";
export default {
  data() {
    return {
      student:{},
      token:localStorage.getItem("token"),
      userId:localStorage.getItem("userId"),
      benifits:['can request to teacher','can see specific about your request','can know how many time you have requests']
    }
  },
  methods:{
    onStart(){
      this.$router.push("/list_student_leave");
    },
    tokenRequest() {
      if (localStorage.getItem("role") == 'teacherLogin') {
          this.benifits = ['can see all students','can create, delete, edit student','can approve and reject for student requests']
      }
      axiosClient.get('student/'+this.userId)
      .then(res=>{
        this.student=res.data;
      })
    }
    
  },

  computed: {
    userGender() {
      return (
        this.student.gender == "M" ||
        this.student.gender == "Male" ||
        this.student.gender == "m" ||
        this.student.gender == "male"
      );
    },
  },
  mounted() {
    this.tokenRequest();
  },
};
</script>

<style scoped>
/* DEMO-SPECIFIC STYLES */
.typewriter h1 {
  color: blue;
  font-family: monospace;
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: 0.15em solid orange; /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: 0.15em; /* Adjust as needed */
  animation: typing 3s steps(30, end), blink-caret 0.5s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from {
    width: 0;
  }
  to {
    width: 100%;
  }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from,
  to {
    border-color: transparent;
  }
  50% {
    border-color: orange;
  }
}
</style>