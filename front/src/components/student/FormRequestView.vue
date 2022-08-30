<template>
    <form style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;" @submit.prevent="addRequest" class=" md:w-8/12 lg:w-6/12 border  m-auto p-5 md:p-7 rounded-md py-3lx"> 
        <h1 class="font-bold text-center text-orange-400 m-auto mb-7 text-3xl">Request Leave Form</h1>
        <div class="form-controll my-4 text-left text-base">
            <label for="reason" class="cursor-pointer mb-2 font-bold">Select Your Leave Type:</label>
            <select v-model="leave_type" id="reason" class="focus:border-2 focus:border-blue-600 cursor-pointer bg-stone-200 border-b rounded-sm focus:ring-blue-500 focus:border-blue-500 w-full p-2.5  border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500">
                <option selected="" value="">----</option>
                <option value="family's event">Family's Event</option>
                <option value="sick leave">Sick Leave</option>
                <option value="brother or sister marry">Brother or Sister Marry</option>
                <option value="go out">Go Out</option>
            </select>
        </div>
        <small v-if="no_leave_type" class="text-red-500">Please choose your leave type !</small>
        <div class="text-base sm:flex justify-between items-end ">
            <div class="cursor-pointer my-4 sm:mr-3 sm:w-2/4  text-left form-controll ">
                <label class="font-bold" for="">Start Date</label> <br>
                <input v-model="start_date" class="w-full bg-stone-200 p-2 outline-0" placeholder="First Name" type="date">
            </div>
            
            <div class="cursor-pointer w-full my-4 sm:w-2/4 text-left form-controll">
                <label class="font-bold" for="">Part Of Day</label> <br>
                <select v-model="part_of_start_day" id="start date" class="cursor-pointer bg-stone-200 border-b focus:border-2  rounded-sm   w-full p-3  border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500">
                    <option value="Morning">Morning</option>
                    <option value="Afternoon">Afternoon</option>
                </select>
            </div>
        </div>
        <small v-if="no_start_date" class="text-red-500">Please click icon calendar to input your date and time</small>
            
        <div class="text-base sm:flex justify-between items-end">
            <div class="cursor-pointer my-4 sm:mr-3 sm:w-2/4  text-left form-controll">
                <label class="font-bold" for="end-date">End Date</label> <br>
                <input v-model="end_date"  class="bg-stone-200 w-full p-2 outline-0" placeholder="First Name" type="date">
            </div>
            <div class="cursor-pointer my-4 sm:w-2/4  text-left form-controll ">
                <label class="font-bold" for="">Part Of Day</label> <br>
                <select v-model="part_of_end_day"  id="end-date" class="cursor-pointer focus:border-2 focus:border-blue-600 bg-stone-200 border-b rounded-sm  w-full p-3  border-gray-600 placeholder-gray-400 focus:ring-blue-500 ">
                    <option selected value="Morning">Morning</option>
                    <option value="Afternoon">Afternoon</option>
                </select>
            </div>
        </div>
        <small v-if="no_end_date || not_correct_date"  class="text-red-500">{{valid_date}}</small>
        <h2 class="mt-3 font-bold">Duration: <span class="text-orange-500">{{countDuration}} day</span></h2>

        <small v-if="no_reason" class="text-red-500 mt-5">Please write your reason !</small>
        <div class="relative mt-3">
            <textarea v-model="reason" cols="30" rows="3" type="text" id="default_outlined" class="block px-2.5 pb-2.5 pt-4 w-full text-lg text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=".... "></textarea> 
            <label for="default_outlined" class="absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-100 top-0 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/4 peer-focus:top-2 peer-focus:scale-100 peer-focus:-translate-y-4 left-0">Descript Your Reason:</label>
        </div>
        <div class="flex justify-center mt-4">
            <button  type="submit" class="sm:w-1/4 w-full rounded-md text-white text-xl bg-blue-500 p-3">Send</button>
        </div>
    </form>
</template>

<script >

export default{
    data(){
        return{
            part_of_start_day: "Morning",
            part_of_end_day: "Morning",
            duration: 0,    
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
            student_id: localStorage.getItem("userId")
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
            this.duration=0
            this.part_of_start_day="Morning"
            this.part_of_end_day= "Morning"
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
            if(this.duration > 0 && this.start_date.trim() != "" && this.end_date.trim() != "" && this.reason.trim() != "" && this.leave_type.trim() != ""){
                let data = {student_id:this.student_id, start_date: this.start_date, end_date: this.end_date, reason: this.reason, leave_type: this.leave_type, duration: this.duration, status:"padding"}
                this.$emit('request', data)
                this.setDefault()
                this.not_correct_date = false;

            }else{
                this.checkValidation()
            }
        },
        calculateDuration(){
            let leave_duration = 0;
            let date2 = new Date(this.end_date) 
            let date1 = new Date(this.start_date)
            leave_duration = ((date2 - date1)/24/60/60/1000)
            if(isNaN(leave_duration)){
                this.leave_duration == 0
            }else if(this.part_of_start_day == this.part_of_end_day){
                this.duration = 0.5 + leave_duration;
            }else if(leave_duration == 0 && this.part_of_start_day=="Morning" && this.part_of_end_day == "Afternoon"){
                this.duration = 1
            }else if(leave_duration >=1 && this.part_of_start_day=="Afternoon" && this.part_of_end_day == "Morning"){
                this.duration = leave_duration;
            }else if(leave_duration >=1 && this.part_of_start_day=="Morning" && this.part_of_end_day == "Afternoon"){
                this.duration  = leave_duration + 1
            }else {
                this.duration = leave_duration -0.5;
            }
            if(this.duration < 0){
                this.valid_date = "End date must be greater than start date!"
                this.not_correct_date = true;
            }else{
                this.valid_date = "Please click icon calendar to input your date!"
                this.not_correct_date = false;
            }
        }
    },
    computed: {
        countDuration(){
            this.calculateDuration()
            return this.duration
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
    .request-form {
        box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px;

    }
</style>

