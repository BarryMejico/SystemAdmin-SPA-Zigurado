<template>
    <div>
        <form>
            <label>User Name:</label>
            <input type="text" placeholder="User Name" v-model="data.email"><br>

            <label>Password:</label>
            <input type="password" placeholder="Password" v-model="data.password"> <br>
            
            <button type="button" @click.prevent="login()">Login</button>
        </form>
        <router-link to="/regster">
            Register
        </router-link>
    </div>
</template>

<script>
import axios from 'axios';

export default{
data(){
    return{
        data:{
            email:'',
            password:'',
        }
    }
},
methods:{
    login(){
        const redirectPath = this.$route.query.redirect
        axios.get('/sanctum/csrf-cookie').then(response => {
                axios
                    .post('/api/login',this.data)
                    .then((res)=>{
                        console.log(res.data)
                        this.$router.push(redirectPath)
                    })
                    .catch((err)=>{
                        console.log(err.response.data)
                    })
            });
        }

        
}
}
</script>