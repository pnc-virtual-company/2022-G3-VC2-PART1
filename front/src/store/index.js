import { defineStore } from 'pinia'

export const dataStore = defineStore('user_login', {
  state: () => ({ 
    login: false ,
<<<<<<< HEAD
    user: "Khy"
=======
>>>>>>> 7ed07e5d101118c6eea0627466fea0ffe6bdb09f
  }),
  // getters: {
  //   double: state => state.count * 2,
  // },
  actions: {
    change(data) {
      this.login = data;
    },
  },
})
