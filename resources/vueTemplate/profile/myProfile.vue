<template>
    <div>
        <h1>My Profile</h1>
        <button @click="logout">LogOut</button>
    </div>
</template>
<script>
import axios from 'axios';
import { useUser } from '../../Store/user';
export default{
    setup(){
        const userData = useUser();
        return {userData}
    },
    
        methods:{
        logout(){
                this.userData.logout()
                this.$router.push("/login")
        }
    },
}
</script>