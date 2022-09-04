<template>
    <div class="mt-4 overflow-auto h-[30vh]">
            <div class="rounded-lg shadow">
              <table  class=" w-full m-auto ">
                <thead class="bg-orange-300 border-b-2 border-gray-200 ">
                  <tr class="text-[13px] text-white ">
                    <th class="p-1   text-start">Start Date</th>
                    <th class="p-1 text-start">End Date</th>
                    <th class="p-3 font-semibold tracking-wide text-start">Leave Type</th>
                    <th class="p-3 font-semibold tracking-wide text-start">Reason</th>
                    <th class="p-3 font-semibold tracking-wide text-start">Duration</th>
                    <th class="p-3 font-semibold tracking-wide ">Status</th>
                    <th class="font-semibold tracking-wide ml-20">Request Date</th>
                  </tr>
                </thead>
                <tbody >
                  <tr class="bg-gray-50 border-b-2 border-gray-190 hover:bg-sky-100  text-[13px] " v-for="studentLeave of listStudentRequest" :key="studentLeave">
                    <td class="p-2 capitalize text-gray-500 justify-center m-21 ">{{studentLeave.start_date}}</td>
                    <td class="p-2 capitalize text-gray-500 justify-center m-21"> {{studentLeave.end_date}}</td>
                    <td class="p-2 capitalize text-gray-500 justify-center m-21 ">{{studentLeave.leave_type}}</td>
                    <td class="p-2 capitalize text-gray-500 justify-center m-21 ">{{studentLeave.reason}}</td>
                    <td class="p-2 capitalize text-gray-500 justify-center m-21 "> {{studentLeave.duration}}</td>
                    <!-- <td class="p-2 capitalize text-gray-500 justify-center m-21 ">{{studentLeave.status}}</td> -->
                    <td v-if="studentLeave.status == 'padding'" class="p-4 capitalize text-sm text-yellow-500 text-center ">{{studentLeave.status}}</td>
                    <td v-else-if="studentLeave.status == 'approved'" class="p-4 capitalize text-green-500 text-center text-sm">{{studentLeave.status}}</td>
                    <td v-else-if="studentLeave.status == 'canceled'" class="p-4 capitalize text-blue-500 text-center text-sm">{{studentLeave.status}}</td>
                    <td v-else class="p-4  text-red-500 capitalize text-center text-sm">{{studentLeave.status}}</td>
                    <td class="p-2 capitalize text-gray-500 justify-center m-21 ">{{studentLeave.created_at}}</td>
                  </tr>  
                </tbody>
              </table>
            </div>
          </div>
</template>

<script>
  export default {
    props:{listStudentRequest:Array},
  }

</script>