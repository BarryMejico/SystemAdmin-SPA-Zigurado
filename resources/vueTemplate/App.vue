<template>
  <div>
    <container>
      <navigation></navigation>    
  
    <ToolBar></ToolBar>
  
    <router-view :key="$route.path"></router-view>

    <myfooter></myfooter>
    </container>
    
</div>

</template>
<script>
import navigation from './nav/nav.vue'
import myfooter from './myfooter/myfooter.vue'
import { useUser } from '../Store/user';
import ToolBar from './nav/toolBar.vue';

export default {
  components:{
    navigation,
    myfooter,
    ToolBar
    
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