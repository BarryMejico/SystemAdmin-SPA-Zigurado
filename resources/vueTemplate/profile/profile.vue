<template>
    <div>
        <h1>Profile</h1>
        <label><b>Name:</b> </label>
        <span>{{ profileID.name }}</span>
        
    </div>
</template>
<script>
import axios from 'axios';

export default{
    data(){
        return({
            profileID:'s',
        })
    },



    async created(){
        await axios
                .get('/api/thatProfile',{params:{id:this.$route.params.id}})
                .then((res)=>{
                    console.log(res.data)
                    this.profileID=res.data[0]
                                    })
    }
}
</script>

<style>
.profile-card {
    max-width: 300px;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    font-family: Arial, sans-serif;
    margin: 2rem;
    background: white;
}

.profile-header {
    background: #4f46e5;
    height: 100px;
}

.profile-img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 4px solid white;
    margin: -50px auto 0;
    display: block;
    background: #e5e7eb;
}

.profile-content {
    padding: 1.5rem;
    text-align: center;
}

.profile-name {
    font-size: 1.25rem;
    font-weight: bold;
    margin: 0.5rem 0;
    color: #1f2937;
}

.profile-title {
    color: #6b7280;
    font-size: 0.875rem;
    margin-bottom: 1rem;
}

.profile-stats {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    padding: 1rem 0;
    border-top: 1px solid #e5e7eb;
}

.stat {
    text-align: center;
}

.stat-value {
    font-weight: bold;
    color: #1f2937;
}

.stat-label {
    font-size: 0.75rem;
    color: #6b7280;
}
</style>