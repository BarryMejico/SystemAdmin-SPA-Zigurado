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
import axios from 'axios';
export default {
  components:{
    navigation,
    myfooter
  },

  setup() {

   },

   async created(){
    this.get_logUser()
   },

   methods:{
    async get_logUser(){
        await axios.get('api/user')
                    .then((res)=>{
                      console.log(res.data)
                    })
    }
   }
}
</script>