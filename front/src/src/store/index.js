import { defineStore } from 'pinia'

export const dataStore = defineStore('user_login', {
  state: () => ({ 
    login: false ,
  }),

  actions: {
    change(data) {
      this.login = data;
    },
  },
})
