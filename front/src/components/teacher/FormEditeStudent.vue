<template>
    <div class="flex justify-end">  
        <div   class="fixed w-full h-full inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
          <div  class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
            <div  class="flex flex-wrap -mx-3 mb-6 mt-5">
              <div  class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <input class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="First Name*" v-model="edit_student.first_name">
                <p v-if="first_name ==''" class="text-red-500 text-xs italic">Please fill student first name !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Last Name*" v-model="edit_student.last_name">
                <p v-if="last_name ==''" class="text-red-500 text-xs italic">Please fill student last name !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Gender*" v-model="edit_student.gender">
                <p v-if="gender ==''" class="text-red-500 text-xs italic">Please fill student gender!</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Batch*" v-model="edit_student.batch">
                <p v-if="batch ==''" class="text-red-500 text-xs italic">Please fill student batch !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="email" placeholder="Email*" v-model="edit_student.email">
                <p v-if="email ==''" class="text-red-500 text-xs italic">Please fill student email !</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Password (1-8)" v-model="password">
                <p v-if="password !='12345678'" class="text-red-500 text-xs italic">Please set password default (1-8)!</p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <input  class="appearance-none block w-full bg-gray-200 border  py-3 px-4 mt-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Phone*" v-model="edit_student.phone">
                <p v-if="phone ==''" class="text-red-500 text-xs italic">Please fill student phone !</p>
              </div>
            </div>
            <div class="mt-4">
              <button  @click="cancel" class="px-6 py-2 text-blue-800 border border-blue-600 rounded"> Cancel </button>
              <button @click="updateStudent()" class="px-6 py-2 ml-2 text-blue-100 bg-blue-600 rounded"> Update + </button>
            </div>
          </div>
        </div>
      </div>
</template>

<script>

export default {
  props: ['student_edit'],
  data(){
    return{
      edit_student : this.student_edit
    }
  },
  methods:{
    cancel(){
      this.$emit('cancel',false)
    },
    updateStudent(){
      this.$emit('edit_student') 
    }

  },
  mounted(){
    this.edit_student
  }
}
</script>