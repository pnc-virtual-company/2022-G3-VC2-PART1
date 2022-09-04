<template>
<div class="mb-6   bg-gray-100  ">
        <div class=" flex justify-center m-auto items-center">
          <img class="h-18 w-20" src="../../assets/group.png" alt="">
          <h1 class="text-4xl text-black-400 font-semibold text-center  p-3 text-orange-400  ">List All Leave</h1>
        </div>
        <div class="flex md:w-4/5 items-start justify-between m-auto">
            <div class="w-5/12   ">
                <h2 class=" mt-6 text-xl"> Filter by types</h2>
                <select @change="selectOption" v-model="selectTypeLeave" class="p-3 mt-4 rounded-md mb-4 text-black placeholder-gray-400 bg-white border border-gray-400 focus:border-blue-500 border-b-3 w-full">
                    <option selected="" value="">Show all</option>
                    <option value="family's event">Family's Event</option>
                    <option value="sick leave">Sick Leave</option>
                    <option value="brother or sister marry">Brother or Sister Marry</option>
                    <option value="go out">Go Out</option>
                </select>
           </div>
            <div class="w-5/12">
                <h2 class="mt-6 text-xl">Filter by status</h2>
                <div class="">
                    <select @change="selectOption" v-model="selectStatus" class="p-3 mt-4 rounded-md text-black border placeholder-gray-400 bg-white border-gray-400 focus:border-blue-500 border-b-1 w-full" >
                         <option value="">Show all</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected </option>
                        <option value="padding">Padding </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    emits:'select-Option',
    data(){
        return{
            selectStatus:'',
            selectTypeLeave:''
        }
    },
    methods:{
        selectOption(){
            this.$emit('select-Option',this.selectTypeLeave,this.selectStatus);
        }
    }
}
</script>