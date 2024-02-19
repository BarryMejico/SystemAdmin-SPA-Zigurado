<template>
  <div>
    <navigation></navigation>    
  </div>


<router-view :key="$route.path"></router-view>
<div>
  <myfooter></myfooter>
</div>

</template>
<script>
import navigation from './nav/nav.vue'
import myfooter from './myfooter/myfooter.vue'
import { useUser } from '../Store/user';

export default {
  components:{
    navigation,
    myfooter
  },

  setup() {
        const userData=useUser();
        return {userData}
   },

   async created(){

   },

   mounted(){
    const userData=useUser();
    userData.logUser()
   },

   methods:{
    async get_logUser(){

    }
   }
}
</script>