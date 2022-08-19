import { defineStore } from 'pinia'

export const useCounterStore = defineStore('counter', {
  state (){
    return {
      reqests: [],
    }
  },
  getters: {
    double: state => state.count * 2,
  },
  actions: {
    addData(data){
      console.log(data);
      this.reqests.push(data);
    }
  },
})
