<template>
    <div>
        <!-- Trigger/Open The Modal -->
        <button @click="show()">Add Device</button>
        
        <!-- The Modal -->
        <div :id=" 'D'+ customer.Ccode" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span @click="hide()" class="close">&times;</span>
            <div class="container">
        <h2>Device Information</h2>
        <div id="contactForm">
            <div class="form-group">
                <label class="label2" for="name">Model</label>
                <input v-model="data.device.Name" type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label class="label2" for="phone">Details</label>
                <input v-model="data.device.Details" type="tel" id="phone" name="phone" required>
            </div>
            <button @click="saveDevice()">Save Contact</button>
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
import Loading from '../loading.vue'

export default{
    components:{
        Loading
    },

    props: [
      'textInside2'
    ],


    data(){
        return{
            loadingDaw:false,
            data:{
                device:{
                    Name:'',
                    Details:'',
                    Ccode:'',
                }
            }
        }
    },

    computed:{
        modal(){
            return document.getElementById('D'+ this.textInside2.Ccode)
        },

        customer:function(){
           return this.textInside2
        },
    },

    methods:{

        saveDevice(){
            this.data.device.Ccode=this.customer.Ccode
            console.log(this.data.device)
            this.loadingDaw=true

            axios.post('/api/SaveDevice',this.data.device)
            .then(()=>{
                this.loadingDaw = false
                this.data.device={
                    Name:'',
                    Details:'',
                    Ccode:'',
                }
                this.hide()              
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