<template>
    <div v-if="userData.name" class="tools">
        <ul>
            <li><b>Menu</b></li>
            <li v-for="(tool,k) in tools" :key="k">
                <router-link :to="tool.slug">
                   <span>{{ tool.text }}</span> 
                </router-link>                
                </li>
        </ul>
    </div>
</template>
<script>
import { useUser } from '../../Store/user';
export default{
    setup(){
        const userDatax = useUser();
        return {userDatax}
    },
    data(){
        return{
            tools:[{
                text:'tool1',
                slug:'/myprofile',
            },{
                text:'tool2',
                slug:'',
            }]
        }
    },
    computed:{
        userData(){
            return this.userDatax.userData
        }
    }
}
</script>

<style>
.tools ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
}

.tools li span{
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

/* Change the link color on hover */
.tools li span:hover {
  background-color: #555;
  color: white;
}
</style>