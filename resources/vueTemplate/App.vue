<template>
  <div>
    <nav class="navbar">
      <navigation></navigation> 
    </nav>

    <!-- Main Content -->
    <main class="main-content">
      <div v-show="userData.authenticated" class="secondary-column">
          <ToolBar></ToolBar>{{ userData }}
            <!-- Add more content as needed -->
        </div>  
      <div class="primary-column">
          <router-view :key="$route.path"></router-view>
        </div>
        
    </main>

    <!-- Footer -->
    <footer class="footer">
      <myfooter></myfooter>
    </footer>   
</div>

</template>
<script>
import navigation from './nav/nav.vue'
import myfooter from './myfooter/myfooter.vue'
import { useUser } from '../Store/user';
import ToolBar from './nav/menubar.vue';

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


<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    /* min-height: 100vh; */
    display: flex;
    flex-direction: column;
}

/* Navigation Bar (1st Row) */
.navbar {
    background-color: #2d3748;
    /* padding: 1rem; */
    position: sticky;
    /* top: 0; */
    /* z-index: 1000; */
    /* max-width: 1200px; */
}


/* Main Content (2nd Row) */
.main-content {
    flex: 1;
    display: flex;
    /* max-width: 1200px; */
    margin: 0 auto;
    padding: 2rem 1rem;
    gap: 2rem;
    width: 100%;
}

/* Primary Column (Wider) */
.primary-column {
    flex: 75%;  /*Takes up 75% of the space*/
    background-color: #f7fafc;
    /* padding: 1.5rem; */
    border-radius: 8px;
    height: auto;
}

/* Secondary Column (Narrower) */
.secondary-column {
    flex: 25%;/*  Takes up 25% of the space*/
    /* width: 350px; */
    background-color: #f7fafc;
    padding: 1.5rem;
    border-radius: 8px;
}

/* Footer (3rd Row) */
.footer {
    background-color: #2d3748;
    margin-top: auto;
}


/* Example Content Styling */
h1, h2, h3 {
    margin-bottom: 1rem;
}

p {
    margin-bottom: 1rem;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .nav-container {
        flex-direction: column;
        gap: 1rem;
    }

    .main-content {
        flex-direction: column;
    }

    .primary-column,
    .secondary-column {
        flex: none;
        width: 100%;
    }

    .nav-links {
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
    }
}
</style>