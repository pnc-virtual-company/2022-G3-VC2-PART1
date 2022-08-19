<template>
    <form @submit.prevent="addRequest" class="md:w-11/12 border border-gray-600 m-auto p-3 md:p-7 rounded-md py-3lx"> 
        <h1 class="font-bold text-center text-orange-400 m-auto mb-7 text-3xl">Request Leave Form</h1>
        <div class="form-controll my-4 text-left text-base">
            <label for="reason" class="cursor-pointer mb-2 font-bold">Select Your Leave Type:</label>
            <select v-model="leave_type" id="reason" class="cursor-pointer bg-stone-200 border-b rounded-sm focus:ring-blue-500 focus:border-blue-500 w-full p-2.5  border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500">
                <option selected="" value="">----</option>
                <option value="family event">Family's Event</option>
                <option value="sick">Sick</option>
                <option value="go out">Go Out</option>
            </select>
            <small v-if="no_leave_type" class="text-red-500">Please choose your leave type !</small>
        </div>
        <div class="text-base sm:flex justify-between">
            <div class="cursor-pointer my-4 sm:mr-3 sm:w-2/4  text-left form-controll ">
                <label class="font-bold" for="">Start Date</label> <br>
                <input v-model="start_date" class="w-full bg-stone-200 p-2 outline-0" placeholder="First Name" type="datetime-local">
                <small v-if="no_start_date || not_correct_date" class="text-red-500">{{valid_date}}</small>
            </div>
            
            <div class="cursor-pointer w-full my-4 sm:w-2/4 text-left form-controll">
                <label class="font-bold" for="end-date">End Date</label> <br>
                <input v-model="end_date"  class="bg-stone-200 w-full p-2 outline-0" placeholder="First Name" type="datetime-local">
                <small v-if="no_end_date || not_correct_date"  class="text-red-500">{{valid_date}}</small>
            </div>
        </div>
        <div class="text-base my-4 mr-3 w-full text-left form-controll">
            <label class="font-bold" for="">Descript Your Reason</label> <br>
            <small v-if="no_reason" class="text-red-500">Please write your reason !</small>
            <textarea v-model="reason" placeholder="Write your reason..." class="bg-stone-200 border border-gray-600 rounded p-4 text-black w-full p-2 outline-0" name="" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="flex justify-center">
            <button  type="submit" class="sm:w-1/4 w-full rounded-md text-white text-xl bg-blue-500 p-3">Send</button>
        </div>
    </form>
</template>

<script >

export default{
    data(){
        return{
            valid_date: "Please click icon calendar to input your date and time",
            request:[],
            no_reason: false,
            no_start_date: false,
            no_end_date: false,
            no_leave_type:false,
            not_correct_date: false,
            leave_type:"",
            start_date: '',
            end_date: '',
            reason: '',
        }
    },
    methods: {
        setDefault(){
            this.no_leave_type= false,
            this.no_start_date= false,
            this.no_end_date= false,
            this.no_reason= false,
            this.start_date=""
            this.end_date=""
            this.leave_type =""
            this.reason=""
            this.valid_date = "Please click icon calendar to input your date and time"

        },
        checkValidation(){
            if(this.reason.trim() == ""){
                this.no_reason = true;
            }else{
                this.no_reason = false;
            }

            if(this.start_date.trim() == ""){
                this.no_start_date = true;
            }else{
                this.no_start_date = false;
            }

            if(this.end_date.trim() == ""){
                this.no_end_date = true;
            }else{
                this.no_end_date = false;
            }

            if(this.leave_type.trim() == ""){
                this.no_leave_type = true;
            }else{
                this.no_leave_type = false;
            }
        },

        addRequest(){
            let date2 = new Date(this.end_date)
            let date1 = new Date(this.start_date)
            // console.log(Math.abs((date2 - date1)/1000/60/60)) // to count hour
            if(this.start_date.trim() != "" && this.end_date.trim() != "" && this.reason.trim() != "" && this.leave_type.trim() != ""){
                if( Math.sign(date2 - date1) != -1){
                    let data = {student_id:20, start_date: this.start_date, end_date: this.end_date, reason: this.reason, leave_type: this.leave_type}
                    this.$emit('request', data)
                    this.setDefault()
                    this.not_correct_date = false;
                }else{
                    this.valid_date = "End date must be bigger than start date!"
                    this.not_correct_date = true;
                    this.checkValidation()
                }
            }else{
                this.checkValidation()
            }
    }
    }
}

    
</script>




<style>

    input, select{
        border-bottom: 1px solid #000;
    }
    textarea {
        resize: none;
    }
</style>