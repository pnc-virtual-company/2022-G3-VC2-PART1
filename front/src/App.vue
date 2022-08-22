<template>
  <TheNavigation></TheNavigation>
  <router-view></router-view>
</template>
<script>
import TheNavigation from '@/components/navigation/TheNavigation.vue';

export default{
  components:{
    TheNavigation
  }
}
</script>


