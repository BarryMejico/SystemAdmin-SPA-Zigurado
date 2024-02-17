<template>
    <div>
        <h1>My Profile</h1>
        <button @click="logout">LogOut</button>
    </div>
</template>
<script>
import axios from 'axios';

export default{
    
        methods:{
        logout(){
            axios
                .post('api/logout')
                
        }
    },
}
</script>