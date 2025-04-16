<template>
    <div>
        <h1>Home</h1>
        <hr>
        <myTmodal></myTmodal>
        <button @click="loadingScreen()" >loading</button>
        <div><Loading></Loading></div>
        
    </div>
</template>

<script>
import myTmodal from './Customer/modal.vue'
import Loading from './loading.vue';
export default {
    components:{ myTmodal,Loading},
    data(){
        return{
            loadingDaw:false
        }
    },
    methods:{
        loadingScreen(){
            this.loadingDaw=true
            setTimeout(() => this.loadingDaw = false, 1000);
        },
    },
}
</script>