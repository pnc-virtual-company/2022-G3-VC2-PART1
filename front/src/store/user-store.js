import { defineStore } from 'pinia'

export const dataStore = defineStore('user_login', {
  state: () => ({ 
    login: false , 
    role: 'studentLogin'
  }),

  actions: {
    change(data) {
      this.login = data;
    },
    
    changeUserRole(data) {
      this.role = data;
    }
  },
})
