<template>
    <div>
        <h1>Customer</h1>
        <div class="searchBody">
                <div class="search-container">
                    <input @change="searchMe()" v-model="searchValue" type="text" class="search-input" placeholder="Search...">
                    <button class="search-button">
                        <span class="search-icon"></span>
                    </button>
                </div>
            </div>
            <button @click="refreshCustomerList()">Refresh List</button>
            <CustomerModal @ClickSave="ClickSave()"></CustomerModal>
        <div>
        <table>
            <thead>
                <th>Name</th>
                <th>Number</th>
                <!-- <th>Devices</th> -->
            </thead>
            <tbody>
                <tr v-for="(customer, x) in searchResult" :key="x">
                    <td>
                        <ul>
                            <li>
                                <CustomersDeviceModal :textInside=customer></CustomersDeviceModal>
                                
                            </li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>
                                {{customer.Number}}
                            </li>
                        </ul>
                    </td>
                    <td>
                        <button  @click="show(customer)">Edit</button>
                    </td>
                    <!-- <td>
                        
                    </td> -->

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
        <input type="text" id="name" name="name" v-model="toeditDetails.Customer" required>
    </div>
    <div class="form-group">
        <label class="label2" for="phone">Contact Number</label>
        <input type="tel" id="phone" name="phone" v-model="toeditDetails.Number" required>
    </div>
    <button @click="editCustomer()" type="submit">Edit Contact</button>
</div>
<div id="successMessage" class="success-message">
    Contact information saved successfully!
</div>
 <!-- <ul>
                            <li><a href="#">oppo</a></li>
                            <li><a href="#">Samsung</a></li>
                            <li><DeviceModal></DeviceModal></li>
                        </ul> -->

</div>

</div>

</div>
<div>
    <Loading :showMe="loadingDaw"></Loading>
</div>

    </div>
</template>

<script>
import axios from 'axios';
import DeviceModal from '../Device/deviceModal.vue';
import CustomerModal from './customerModal.vue'
import Loading from '../loading.vue';
import CustomersDeviceModal from '../Device/customersDeviceModal.vue';
export default{
    components:{
        CustomerModal,
        DeviceModal,
        Loading,
        CustomersDeviceModal
    },

    data(){
        return(
            {
                toeditDetails:{},
                customers:{},
                loadingDaw:false,
                searchValue:'',
                searchResult:{},
            }
        )
    },
    
    computed:{
        modal(){
            return document.getElementById("myModalCustomerDetails")
        },
    },

    watch:{
        searchValue(newValue){
            this.searchMe()
        }
    },

    mounted(){
        this.getCustomers()
    },

    methods:{
        editCustomer(){
            
            this.loadingDaw=true
            var toEdit={
                Name:this.toeditDetails.Customer,
                Number:this.toeditDetails.Number,
                ids:this.toeditDetails.Ccode
            }

            axios.post('/api/ModifyCus',toEdit)
            .then(()=>{
                this.loadingDaw = false
                this.hide()              
            })
            .catch((errors)=>{
                console.log(errors)
            })
            
        },
        searchMe(){
            // this.customers.fil
            var searchValue2=this.searchValue
            var tryThis= this.customers.filter(function(obj) {
                return Object.keys(obj).some(function(key) {
                    return obj[key].includes(searchValue2);
                })
            });

            this.searchResult=tryThis
        },
        ClickSave(event){
            this.refreshCustomerList()
        },
        refreshCustomerList(){
            this.getCustomers()
        },
        getCustomers(){
            this.loadingDaw=true
            this.customers={}
            axios
            .get('/api/LoadCus')
            .then((res)=>{
                this.customers= res.data
                this.searchResult=this.customers
                this.loadingDaw=false
            })
        },
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