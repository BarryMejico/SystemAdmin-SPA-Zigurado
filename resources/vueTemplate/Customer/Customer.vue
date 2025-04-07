<template>
    <div>
        <h1>Customer</h1>
        <div class="searchBody">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Search...">
                    <button class="search-button">
                        <span class="search-icon"></span>
                    </button>
                </div>
            </div>
            <CustomerModal></CustomerModal>
        <div>
        <table>
            <thead>
                <th>Customers</th>
                <th>Devices</th>
            </thead>
            <tbody>
                <tr>
                    <td @click="show(details={name:'name',number:'number'})">
                        <ul>
                            <li>
                                Name 1 sample
                            </li>
                            <li>
                                0919-9199-919
                            </li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li><a href="#">oppo</a></li>
                            <li><a href="#">Samsung</a></li>
                            <li><DeviceModal></DeviceModal></li>
                        </ul>
                    </td>

                </tr>
            </tbody>
        </table>
    </div> 
    
    <!-- The Modal -->
    <div id="myModalCustomerDetails" class="modal">

<!-- Modal content -->
<div class="modal-content">
    <span @click="hide()" class="close">&times;</span>
    <div class="container">
<h2>Contact Information</h2>
<div id="contactForm">
    <div class="form-group">
        <label class="label2" for="name" >Full Name</label>
        <input type="text" id="name" name="name" v-model="toeditDetails.name" required>
    </div>
    <div class="form-group">
        <label class="label2" for="phone">Contact Number</label>
        <input type="tel" id="phone" name="phone" v-model="toeditDetails.number" required>
    </div>
    <button type="submit">Edit Contact</button>
</div>
<div id="successMessage" class="success-message">
    Contact information saved successfully!
</div>
</div>

</div>

</div>

    </div>
</template>

<script>
import DeviceModal from '../Device/deviceModal.vue';
import CustomerModal from './customerModal.vue'
export default{
    components:{
        CustomerModal,
        DeviceModal
    },

    data(){
        return(
            {
                toeditDetails:{}
                
            }
        )
    },
    
    computed:{
        modal(){
            return document.getElementById("myModalCustomerDetails")
        },
    },

    methods:{
        show(details){
            this.toeditDetails=details
            this.modal.style.display="block";
        },

        hide(){
            this.modal.style.display="none";
        },
    },
}
</script>

<style>     
        

    </style>