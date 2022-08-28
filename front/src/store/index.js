import { defineStore } from 'pinia'

export const dataStore = defineStore('user_login', {
  state: () => ({ login: false }),
  // getters: {
  //   double: state => state.count * 2,
  // },
  actions: {
    change(data) {
      this.login = data;
    },
  },
})
