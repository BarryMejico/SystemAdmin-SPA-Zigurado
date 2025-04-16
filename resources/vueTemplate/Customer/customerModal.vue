<template>
    <div>
        <!-- Trigger/Open The Modal -->
        <button @click="show()">Add Customer</button>

        <!-- The Modal -->
        <div id="myModalCustomer" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span @click="hide()" class="close">&times;</span>
            <div class="container">
        <h2>Contact Information</h2>
        <div id="contactForm">
            <div class="form-group">
                <label class="label2" for="name">Full Name</label>
                <input type="text" id="name" name="name" v-model="customerDetails.Name" required>
            </div>
            <div class="form-group">
                <label class="label2" for="phone">Contact Number</label>
                <input type="tel" id="phone" name="phone" v-model="customerDetails.Number" required>
            </div>
            <button @click="saveThisCus()">Save Contact</button>
        </div>
        <div id="successMessage" class="success-message">
            Contact information saved successfully!
        </div>
    </div>

        </div>

        </div>
            <Loading :showMe="loadingDaw"></Loading>
    </div>
</template>

<script>
import axios from 'axios';
import Loading from '../loading.vue';

export default{
    components:{ Loading},
    data(){
        return{
            loadingDaw:false,
            customerDetails:{
                Name:'',
                Number:'',
            },
            data:{
                modal : document.getElementById("myModalCustomer")
            }
        }
    },

    computed:{
        modal(){
            return document.getElementById("myModalCustomer")
        }
    },

    methods:{
        saveThisCus(){
            this.loadingDaw=true
            axios.post('/api/SaveCus',this.customerDetails)
            .then(()=>{
                this.loadingDaw = false
                this.hide()
                this.$emit("ClickSave",this.customerDetails)                
            })
            .catch((errors)=>{
                console.log(errors)
            })
            
        },

        show(){
            this.modal.style.display="block";
        },

        hide(){
            this.modal.style.display="none";
        },
    },
}
</script>

<style>
h2 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

.label2 {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s;
}

input:focus {
    border-color: #4a90e2;
    outline: none;
}

button {
    background-color: #4a90e2;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 12px 20px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #357abD;
}

.success-message {
    display: none;
    color: #4CAF50;
    text-align: center;
    margin-top: 20px;
    font-weight: bold;
}
</style>