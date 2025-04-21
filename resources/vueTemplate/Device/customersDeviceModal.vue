<template>
    <div>
        <!-- Trigger/Open The Modal -->
        <label @click="show()">{{ customer.Customer }}</label>
        <!-- The Modal -->
        <div :id="customer.Ccode" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span @click="hide()" class="close">&times;</span>
            <label><b>NAME: </b></label><span>{{customer.Customer}}</span> <br>
            <label><b>NUMBER: </b></label><span> {{customer.Number}}</span><br>
            <hr>
            <DeviceModal :textInside2=customer></DeviceModal>
            <button @click="refreshList()">Refresh List</button>
            
            <table>
                <thead>
                    <tr>
                        <th>Device</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(device, x) in devices" :key="x" @click="selectedDevice(device)">
                        <td>{{ device.Name }}</td>
                        <td>{{ device.Details }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        </div>
        <Loading :showMe="loadingDaw"></Loading>
    </div>
</template>

<script>
import axios from 'axios';
import DeviceModal from '../Device/deviceModal.vue';
import Loading from '../loading.vue';

export default{
    props: [
      'textInside',
      'requestEmitSelected'
    ],

    components:{
        DeviceModal,
        Loading,
    },

    data(){
        return{
            devices:{},
            loadingDaw:false,
            
        }
    },

    computed:{
        customer:function(){
           return this.textInside
        },

        selected(){
            return this.requestEmitSelected
        },

        modal(){
            return document.getElementById(this.textInside.Ccode)
        }
    },


    methods:{

        selectedDevice(device){
            var topass={
                        Customer:{
                            Name:this.customer.Customer,
                            Number:this.customer.Number,
                            Ccode:this.customer.Ccode
                        },
                        Device:{
                            Name:device.Name,
                            Details:device.Details,
                            Dcode:device.DeviceCode,
                        },}
            if(this.selected){
                this.$emit("ClickSelected",topass)
                this.hide()
            }

        },

        refreshList(){
            this.devices={}
            this.loadingDaw=true
            axios
        .get('/api/ShowCustomerDevice',{params:{Ccode:this.textInside.Ccode}})
        .then((res)=>{
            // console.log(res.data) 
            this.loadingDaw=false
            this.devices=res.data
            
        })
        .catch((err)=>{
            console.log(err)
            this.loadingDaw=false
        })
        },


        show(){
            this.refreshList()
            this.modal.style.display="block";
        },

        hide(){
            this.modal.style.display="none";
        },
    },
}
</script>