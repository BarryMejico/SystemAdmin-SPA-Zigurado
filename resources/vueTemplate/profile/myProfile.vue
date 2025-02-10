<template>
    <div>

        <div class="profile-card">
        <div class="profile-header"></div>
        <img src="/api/placeholder/100/100" alt="Profile" class="profile-img">
        <div class="profile-content">
            <h2 class="profile-name">{{ userData.userData.name }}</h2>
            <div class="profile-title">{{ userData.userData.email }}</div>
            <!-- <div class="profile-stats">
                <div class="stat">
                    <div class="stat-value">2.4k</div>
                    <div class="stat-label">Followers</div>
                </div>
                <div class="stat">
                    <div class="stat-value">156</div>
                    <div class="stat-label">Projects</div>
                </div>
                <div class="stat">
                    <div class="stat-value">842</div>
                    <div class="stat-label">Posts</div>
                </div>
            </div> -->
            <button type="button" @click="logout">LogOut</button>
        </div>
        
    </div>
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