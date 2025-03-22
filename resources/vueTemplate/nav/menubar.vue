<template>
    <div v-if="userData.name" class="tools">
        <ul id="main-list">
            <li><b>Menu</b></li>
            <li v-for="(tool,k) in tools" :key="k" class="list-item">
                <span v-if="tool.menuParent=='root'">
                    <span v-if="tool.slug === '0'">
                    <span @click="colapsThis" class="caret">{{ tool.Description }}</span>
                    <ul class="nested">
                        <li v-for="(subtool,j) in menu.menu" :key="j" class="list-item">
                            <span v-if="subtool.menuParent ==  tool.id" >
                                <router-link :to="subtool.slug">
                                    <span>{{ subtool.Description }}</span> 
                                </router-link>       
                            </span>
                        </li>
                    </ul>
                </span>     
                <span v-else>
                        <router-link :to="tool.slug">
                            <span>{{ tool.Description }}</span> 
                        </router-link>        
                </span>
                </span>

                </li>
        </ul>

        

    </div>
    
</template>
<script>
import {useMenus} from '../../Store/menu'
import {useUser} from '../../Store/user'

export default{
    
    setup(){
        const menu = useMenus();
        const userData = useUser();
        return {menu,userData}
    },
    data(){
        return{
            // tools:[{
            //     text:'tool1',
            //     slug:'/myprofile',
            // },{
            //     text:'tool2',
            //     slug:'',
            // }],
        }
    },
    computed:{
        userData(){
            return this.userData.userData
        },

        tools(){
            return this.menu.menu
        }
    },

    methods:{
        colapsThis(){
            var carets = document.getElementsByClassName("caret");                
      
            // Add click event listener to each caret
  for (var i = 0; i < carets.length; i++) {
    carets[i].addEventListener("click", function() {
      // Toggle the "caret-down" class on the clicked element
      this.classList.toggle("caret-down");
      
      // Toggle the "active" class on the nested list
      var nestedList = this.parentElement.querySelector(".nested");
      if (nestedList) {
        nestedList.classList.toggle("active");
      }
    });
  }       
        },
    }

    
}
</script>

<style>
/* colapsable list */
  /* Hide nested lists by default */
  .nested {
    display: none;
    margin-left: 20px;
  }

  /* Style for list items */
  .list-item {
    cursor: pointer;
    user-select: none;
    /* padding: 8px; */
    list-style-type: none;
  }

  /* Style for the arrow indicator */
  .caret::before {
    content: '▶';
    display: inline-block;
    margin-right: 8px;
    transition: transform 0.2s;
  }

  /* Rotate arrow when active */
  .caret-down::before {
    transform: rotate(90deg);
  }

  /* Show nested list when active */
  .active {
    display: block;
  }

  /* end of colapsable list */

.tools ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  /* width: 200px; */
  background-color: #f1f1f1;
}

.tools li span{
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

/* Change the link color on hover */
/* .tools li span:hover {
  background-color: #555;
  color: white;
} */

</style>

