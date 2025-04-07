<template>
    <div>
        <h1>Create Job Order</h1>
        <input type="date" id="today" name="today" v-model="dateToday"><br>
        <CustomerDetails></CustomerDetails> <br>
        <label>Problem Description</label><br>
        <textarea id="w3review" name="w3review" class="textare_PD">
            At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.
        </textarea><br>

        <div>
            <div>
                <h2>Payment</h2>
                <table>
                    <thead>
                        <th>Description</th>
                        <th>Amount Credit</th>
                        <th>Amount Debit</th>
                        <th>Balance</th>
                    </thead>
                    <tbody>
                        <tr v-for="(payment, k) in payments" :key="k">
                            <td>
                                {{ payment.Description }}
                            </td>
                            <td>
                                <div v-if="payment.Credit>0">Php {{payment.Credit}}</div>
                                <div v-else>
                                    <input type="number" min="0" v-show="payment.Debit==0" class="inputNumber" v-model="payment.Credit">
                                </div>

                            </td>
                            <td>
                                <div v-if="payment.Debit>0">Php {{payment.Debit}}</div>
                                <div v-else>
                                    <input type="number" min="0" v-show="payment.Credit==0" class="inputNumber" v-model="payment.Debit">
                                </div>
                            </td>
                            <td>
                                {{ payment.Balance }}
                                <div v-show="payment.X">
                                    <span class="close">&times;</span>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>

                        <td>
                            <input type="text" class="inputNumber">
                        </td>
                        <td>
                            <input type="number" max="0" v-show="debit==0" v-model="credit" class="inputNumber">
                        </td>
                        <td>
                            <input type="number" min="0" v-show="credit==0" v-model="debit" class="inputNumber">
                        </td>
                        <td>
                            <label>php 0.00</label>
                        </td>
                        </tr>

                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button>Add Line</button></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>

        <div class="container">
        <div class="two-column">
            <div class="column">
                <h2>Action Taken</h2>
                <textarea class="textare_PD"></textarea><br>
                <label>Status:</label>
                <input type="text"><br>
                <label>Repaired By:</label>
                <input type="text">
            </div>
            <div class="column">
                <h2>Inventory</h2>
            </div>
        </div>
    </div>
    <button>Save</button>
    </div>
</template>

<script>
import CustomerDetails from '../Customer/customerDetails.vue';

export default{
    components:{CustomerDetails},
    data(){
        return{
            debit:0,
            credit:0,
            dateToday: new Date().toISOString().substr(0, 10),
            payments:[{
                Description:"Total Amount",
                Credit:1,
                Debit:0,
                Balance:0,
                X:false
            },{
                Description:"Deposit",
                Credit:0,
                Debit:0,
                Balance:0,
                X:false
            }],
        }
    },
}
</script>

<style>    
        .textare_PD{
            max-width: 100%;
            min-width: 100%;
            width: 100%;
            height: 90px;
        }    
        .inputNumber{
            width: 100%;
            height: 40px;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .two-column {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .column {
            flex: 1;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
            min-width: 250px;
        }
        
        /* Responsive behavior */
        @media (max-width: 768px) {
            .two-column {
                flex-direction: column;
            }
        }
    </style>