<template>
    <div>
        <!-- Trigger/Open The Modal -->
        <button @click="show()">Customer</button>

        <!-- The Modal -->
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span @click="hide()" class="close">&times;</span>
            <p>Some text in the Modal..</p>
            <Customer></Customer>
        </div>

        </div>
    </div>
</template>

<script>
import Customer from './Customer.vue'
export default{
    components:{
        Customer
    },
    data(){
        return{

        }
    },
    computed:{
        modal(){
            return document.getElementById("myModal")
        }
    },
    methods:{
        show(){
            this.modal.style.display="block";
        },

        hide(){
            this.modal.style.display="none";
        },
    },
}
</script>