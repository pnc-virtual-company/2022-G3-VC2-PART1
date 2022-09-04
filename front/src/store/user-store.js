import { defineStore } from 'pinia'

export const dataStore = defineStore('user_login', {
  state: () => ({ 
    login: false , 
    role: localStorage.getItem('role'),
    userId: localStorage.getItem('userId'),

    teacher_routes:[
      {title: "Check student leave", path: "check_student_leave"},
      {title: "List all students", path: "list_all_students"}
    ],
    
    routes:[
      {title: 'List all leave', path: 'list_student_leave'},
      {title: 'New request', path: 'new_request'},
      
    ]
  }),

  actions: {
    change(data) {
      this.login = data;
    },

    
  },

  mounted() {

  }
})
