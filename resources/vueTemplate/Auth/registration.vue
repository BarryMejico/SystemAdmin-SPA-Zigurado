<template>
    <div>
        <div class="netbody">
    <div class="wrapper">
    <h2>Register</h2>
    <form action="#">

       <div class="input-box">
            <input type="text" placeholder="Name" v-model="Data.name" required><br>
            <label v-if="err.name">{{ err.name }}<br></label>
      </div>

      <div class="input-box">
        <input type="email" placeholder="Email" v-model="Data.email" required><br>
            <label v-if="err.email">{{ err.email }}<br></label>
      </div>

      <div class="input-box">
        <input type="password" placeholder="Password" v-model="Data.password" required><br>
            <label v-if="err.password">{{ err.password }}<br></label>
      </div>

      <div class="input-box">
        <input type="password" placeholder="Confirm Password" v-model="Data.password_confirmation" required><br>
      </div>

      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" @click.prevent="register()" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <router-link to="/login">
                    <span>Login</span>
                </router-link></h3>
      </div>
    </form>
  </div>
  </div>
    
    
    
    </div>

    
</template>
<script>
import axios from 'axios';

export default{
    data(){
        return{
        Data:{
            name:'',
            email:'',
            password:'',
            password_confirmation:''
        },
        err:'',
        message:'',
    }
        
    },

    methods:{
        register(){
            axios.post('/api/register',this.Data)
                 .then((response)=>{
                    this.message=response.data
                    console.log(this.message);
                    this.clearData()
                 })
                 .catch((err)=>{
                    this.err=err.response.data.errors
                    console.log(err.response.data.errors);
                 })
        },

        clearData(){
            this.Data={
                name:'',
                email:'',
                password:'',
                password_confirmation:''
            }
            this.err=''
        }
    },
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