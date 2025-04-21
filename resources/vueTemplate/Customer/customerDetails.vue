<template>
    <div>
        <button @click="show()">Customer</button><br>
        <table>
            <thead>
                
            </thead>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td><b>{{ allDetails.Customer.Name }}</b></td>
                </tr>
                <tr>
                    <td>Contact Number:</td>
                    <td><b>{{ allDetails.Customer.Number }}</b></td>
                </tr>
                <tr>
                    <td>Device:</td>
                    <td><b>{{ allDetails.Device.Name }}</b></td>
                </tr>
                <tr>
                    <td>Details:</td>
                    <td><b>{{ allDetails.Device.Details }}</b></td>
                </tr>
            </tbody>
        </table>
              <!-- The Modal -->
                <div id="customerDetailsModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span @click="hide()" class="close">&times;</span>
            <div class="searchBody">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Search...">
                    <button class="search-button">
                        <span class="search-icon"></span>
                    </button>
                </div>
            </div>
            <CustomerModal></CustomerModal>
            <button @click="refreshList()">Refresh List</button>
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
                                <CustomersDeviceModal @ClickSelected="getselected" :textInside=customer :requestEmitSelected="true"></CustomersDeviceModal>
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

                </tr>
            </tbody>
        </table>
</div>

</div>
<Loading :showMe="loadingDaw"></Loading>
</div>
</template>


<script>

import CustomersDeviceModal from '../Device/customersDeviceModal.vue';
import Loading from '../loading.vue';
import CustomerModal from './customerModal.vue';

export default{
    components:{
        CustomerModal,
        Loading,
        CustomersDeviceModal,
    },
    
    data(){
        return{
            loadingDaw:false,
            searchResult:{},
            allDetails:{
            Customer:{
                            Name:'',
                            Number:'',
                            Ccode:''
                        },
            Device:{
                            Name:'',
                            Details:'',
                            Dcode:'',
                        }},
            data:{
                modal : document.getElementById("customerDetailsModal")
            }

        }
    },
    computed:{
        modal(){
            return document.getElementById("customerDetailsModal")
        }
    },
    methods:{

        refreshList(){
            this.getCustomers()
        },

        getselected(event){
            // console.log(event)
            this.$emit("ClickSelected",event)
            this.allDetails=event
            this.hide()
        },


        show(){
            this.modal.style.display="block";
            this.getCustomers()
        },

        hide(){
            this.modal.style.display="none";
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
    },
}
</script>