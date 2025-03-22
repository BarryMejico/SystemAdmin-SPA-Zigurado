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
        
        .searchBody {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 10vh;
            background-color: #f5f5f5;
        }

        .search-container {
            position: relative;
            width: 100%;
            max-width: 500px;
        }
        
        .search-input {
            width: 100%;
            padding: 12px 50px 12px 20px;
            border: 2px solid #ddd;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }
        
        .search-input:focus {
            border-color: #4285f4;
        }
        
        .search-button {
            position: absolute;
            right: 5px;
            top: 5px;
            background: #4285f4;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
        }
        
        .search-button:hover {
            background: #3367d6;
        }
        
        /* Search icon */
        .search-icon {
            width: 18px;
            height: 18px;
            position: relative;
        }
        
        .search-icon::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 12px;
            height: 12px;
            border: 2px solid white;
            border-radius: 50%;
        }
        
        .search-icon::after {
            content: "";
            position: absolute;
            top: 10px;
            left: 13px;
            width: 2px;
            height: 7px;
            background: white;
            transform: rotate(-45deg);
        }
    </style>