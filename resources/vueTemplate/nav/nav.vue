<template>
    <div>
        <hr>

        <div id="nav">
            <router-link to="/">
                Home
            </router-link>|
            <router-link to="/about">
                About
            </router-link>|
            <router-link to="/login">
                Login
            </router-link>|
            <router-link to="/regster">
                Sign up
            </router-link>|
            <router-link 
            :to="{name:'Profile',params:{id:'2424021658-0',name:'Barry'}}" 
            >
                Profile
            </router-link>|
            
        </div>

        <hr>

        <span @click.prevent="goback">
            Back
        </span>
    </div>
</template>
<script>
export default{
    methods:{
        goback(){
            return this.$router.back()
        }
    }
}
</script>

<style>
#nav .router-link-active{
    color:red;
}
</style>