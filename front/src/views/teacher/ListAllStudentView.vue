<template>
    <ListAllStudent @delete_student="deleteStudent" @select-batch="getByBatch" @search-name="getByName" :listAllStudents="students" @addStudent="addNewStudent" :listStudentLeave="listStudentLeave"></ListAllStudent>

</template>
<script>
import axiosClient from "../../axios-http.js";
import ListAllStudent from '@/components/teacher/ListAllStudent.vue';
import { dataStore } from '../../store/user-store.js';

export default {
    setup() {
        const userStore = dataStore()
        return { userStore }
    },
    components:{
        ListAllStudent,
    },
    data(){
        return{
            studentsByBatch:[],
            listAllStudents:[],

            listStudentLeave:[],
        }
    },
    methods:{
        getAllStudents(){
            axiosClient.get('student').then((res)=>{
                this.listAllStudents = res.data
                this.studentsByBatch = this.listAllStudents
            })
        },
        getAllStudentLeave(){
            axiosClient.get('get_padding').then((res)=>{
                this.listStudentLeave = res.data
            });
        },
        deleteStudent(id){
            axiosClient.delete('student/'+id).then((response) => {
                console.log(response.data)
                this.getAllStudents()
            })
        },
        addNewStudent(newStudent){
            axiosClient.post('student', newStudent).then(() =>{
                this.getAllStudents();
            });
        },
        getByBatch(batch){
                if(batch == 'Show All'){
                    this.studentsByBatch = this.listAllStudents
                }else{
                    this.studentsByBatch = this.listAllStudents.filter(student => student.batch == batch);
            }
            console.log(this.studentsByBatch)
        },
        getByName(name){
            let students = this.listAllStudents
            let nameLower = name.toLowerCase();
            if(name == ''){
                this.studentsByBatch = students;
            }else{
                this.studentsByBatch = students.filter(student => ((student.first_name.toLowerCase())+" "+ student.last_name.toLowerCase()).search(nameLower)>=0)
            }
        }
    },
    computed: {
        students(){
            return this.studentsByBatch;
        }
    },
    
    mounted(){
        this.getAllStudents();
        this.getAllStudentLeave()
        this.userStore.change(true);
    }
}

</script>