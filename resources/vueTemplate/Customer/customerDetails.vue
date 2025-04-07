<template>
    <div>
        <button @click="show()">Customer</button><br>
        <label>Name:</label><br>
        <label>Contact Number:</label><br>
        <label>Device:</label>

              <!-- The Modal -->
                <div id="customerDetailsModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span @click="hide()" class="close">&times;</span>
            <p>Some text in the Modal..</p>
            <div class="searchBody">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Search...">
                    <button class="search-button">
                        <span class="search-icon"></span>
                    </button>
                </div>
            </div>
            <CustomerModal></CustomerModal>
            <table>
                <thead>
                    <th>Name</th>
                    <th>Contact Number</th>
                </thead>
                <tbody>

                </tbody>
            </table>
</div>

</div>
</div>
</template>


<script>
import CustomerModal from './customerModal.vue';

export default{
    components:{
        CustomerModal
    },
    
    data(){
        return{
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
        show(){
            this.modal.style.display="block";
        },

        hide(){
            this.modal.style.display="none";
        },
    },
}
</script>