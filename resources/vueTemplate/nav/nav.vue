
<template>
    <div>

    <nav>
    <!-- Checkbox for toggling menu -->
    <input type="checkbox" id="check">
    <!-- Menu icon -->
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <!-- Site logo -->
    <label class="logo">ZIGURADO</label>
    <!-- Navigation links -->
    <ul>
        <li>
                <router-link to="/">
                    <span>Home</span>
                </router-link>
            </li>
            <li>
                <router-link to="/about">
                    <span>About</span> 
                </router-link>
            </li>
            
            <li v-if="!userData.name">
                <!-- class="right" -->
                <router-link to="/login">
                    <span>Login</span>
                </router-link>
            </li>
            <li v-else>
                <!-- class="right" -->
                    <span @click="logout">Logout</span>
            </li>
            
            <!-- <li v-else>
                <router-link 
                :to="{name:'Profile',params:{id:'2424021658-0',name:'Barry'}}" 
                >
                   <span>Profile</span> 
                </router-link>
            </li> -->

            <li v-if="!userData.name">
                <!-- class="right" -->
                <router-link to="/regster">
                        <span>Sign up</span> 
                </router-link>
            </li>
            <li v-else>
                <router-link 
                    :to="{name:'MyProfile'}" 
                    >
                       <span> {{userData.name  }}</span>
                </router-link>
            </li>
        </ul>
  </nav>

        <span @click.prevent="goback">
            Back
        </span>
    
    </div>
    
</template>
<script>
import { useUser } from '../../Store/user'

export default{
    setup(){
        const userData=useUser();
        return {userData}
    },
    data(){
        return{
            
        }
    },
    methods:{
        goback(){
            this.$router.back()
        },
        logout(){
                this.userData.logout()
                this.$router.push("/login")
        }

    },
    watch:{

        
    },
    
    computed:{
        userData(){
            return this.userData.userData
        }
    }
}
</script>


<style>
/* Google Fonts Link */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
* {
  padding: 0;
  margin: 0;
  text-decoration: none;
  list-style: none;
  box-sizing: border-box;
}
body {
    
  font-family: "Montserrat", sans-serif;
}
nav {
  background: #FFEC8B;
  /* #0082e6 */
  height: 80px;
  width: 100%;
}
label.logo {
  color: #DB1a1a;
  font-size: 25px;
  line-height: 80px;
  padding: 0 100px;
  font-weight: bold;
}
nav ul {
  float: right;
  margin-right: 20px;
}
nav ul li {
  display: inline-block;
  line-height: 80px;
  margin: 0 5px;
}
nav ul li a {
  color: black;
  font-size: 17px;
  padding: 7px 13px;
  border-radius: 3px;
  text-transform: uppercase;
}
a.active,
a:hover {
  background: #1b9bff;
  transition: .5s;
}
.checkbtn {
  font-size: 22px;
  color: white;
  float: right;
  line-height: 80px;
  margin-right: 30px;
  cursor: pointer;
  display: none;
}
#check {
  display: none;
}
@media (max-width: 1050px) {
  label.logo {
    padding-left: 30px;
  }
  nav ul li a {
    font-size: 16px;
  }
}
/* Responsive media query code for small screen */
@media (max-width: 890px) {
  .checkbtn {
    display: block;
  }
  label.logo {
    font-size: 22px;
  }
  ul {
    position: fixed;
    width: 100%;
    height: 100vh;
    background: #2c3e50;
    top: 80px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  nav ul li {
    display: block;
    margin: 50px 0;
    line-height: 30px;
  }
  nav ul li a {
    font-size: 20px;
  }
  a:hover,
  a.active {
    background: none;
    color: #0082e6;
  }
  #check:checked~ul {
    left: 0;
  }
}
section {
  background: url("bg.jpg") no-repeat;
  background-size: cover;
  height: calc(100vh - 80px);
}

/* old css */

/* #nav .router-link-active{
    color:red;
}

ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li span {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

ul.topnav li span:hover {background-color: #111;}

ul.topnav li .router-link-active span {background-color: #04AA6D;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px) {
  ul.topnav li.right, 
  ul.topnav li {float: none;}
}  */


</style>