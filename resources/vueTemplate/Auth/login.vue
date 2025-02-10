<template>

    <div class="netbody">
    <div class="wrapper">
    <h2>Login</h2>
    <form action="#">
      <div class="input-box">
        <input type="text" placeholder="Enter your email" v-model="data.email" required>
      </div>

      <div class="input-box">
        <input type="password" placeholder="Enter your password" v-model="data.password" required>
      </div>

      
      <div class="input-box button">
        <input type="Submit" @click.prevent="login()" value="Login">
        <div class="text">
        <h3>Don't have an account?  <router-link to="/regster">
            Register
        </router-link></h3>
      </div>
 
      </div>
    </form>
  </div>
  </div>
</template>

<script>
import axios from 'axios';
import { useUser } from '../../Store/user';
export default{
setup(){
        const userDatax=useUser();
        return {userDatax}
},
data(){
    return{
        data:{
            email:'',
            password:'',
        }
    }
},
methods:{
    async login(){
        const redirectPath = this.$route.query.redirect
        if(await this.userDatax.loginuser(this.data)){
            if(undefined!=redirectPath){
                this.$router.push(redirectPath)
            }
            else{this.$router.push("/myprofile")}
        }
        },
},
computed:{
        userData(){
            return this.userDatax.userData
        }
    },
watch:{
    userData(newvalue){
        if(newvalue.id){
            const redirectPath = this.$route.query.redirect
            if(undefined!=redirectPath){
                this.$router.push(redirectPath)
            }
            else{this.$router.push("/myprofile")}

        }

    }
}
}
</script>

<style>
/* @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
} */
.netbody{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  /* background: #4070f4; */
}
.wrapper{
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #4070f4;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #C7BEBE;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
  border-color: #4070f4;
}
form .policy{
  display: flex;
  align-items: center;
}
form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background: #4070f4;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #0e4bf1;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #4070f4;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}
</style>