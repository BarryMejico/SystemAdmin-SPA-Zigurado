<template>
    <div>
        <h1>Create Job Order</h1>
        <input type="date" id="today" name="today" v-model="dateToday"><br>
        <CustomerDetails @ClickSelected="selected"></CustomerDetails> <br>
        <label>Problem Description</label><br>
        <textarea v-model="problemDescription" id="w3review" name="w3review" class="textare_PD">
            
        </textarea><br>

        <div>
            <div>
                <h2>Payment</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount Credit</th>
                            <th>Amount Debit</th>
                            <th>Balances</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(payment, k) in payments" :key="k">
                            <td>
                                {{ payment.Description }}
                            </td>
                            <td>
                                <div v-if="payment.lockedCredit">Php {{payment.Credit}}</div>
                                <div v-else>
                                    <input @change="onChangeComputation()" type="number" min="0" v-show="payment.Debit==0" class="inputNumber" v-model="payment.Credit">
                                </div>

                            </td>
                            <td>
                                <div v-if="payment.lockedDebit">Php {{payment.Debit}}</div>
                                <div v-else>
                                    <input @change="onChangeComputation()" type="number" min="0" v-show="payment.Credit==0" class="inputNumber" v-model="payment.Debit">
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
                            <input v-model="addLine.Description" type="text" class="inputNumber">
                        </td>
                        <td>
                            <input v-model="addLine.Credit" type="number" min="0" v-show="debit==0"  class="inputNumber">
                        </td>
                        <td>
                            <input v-model="addLine.Debit" type="number" min="0" v-show="credit==0"  class="inputNumber">
                        </td>
                        <td>
                            <label>php 0.00</label>
                        </td>
                        </tr>

                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button @click="addPaymentLine()">Add Line</button></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>

        <div class="container">
        <div class="two-column">
            <div class="column">
                <h2>Action Taken</h2>
                <textarea v-model="actionTaken.Action" class="textare_PD"></textarea><br>
                <label>Status:</label>
                <input v-model="actionTaken.Status" type="text"><br>
                <label>Repaired By:</label>
                <input v-model="actionTaken.RepairedBy" type="text">
            </div>
            <div class="column">
                <h2>Inventory</h2>
            </div>
        </div>
    </div>
    <button @click="save()">Save</button>
    </div>
</template>

<script>
import CustomerDetails from '../Customer/customerDetails.vue';

export default{
    components:{CustomerDetails},
    data(){
        return{
            CustomerDetailsData:{},
            problemDescription:'',
            debit:0,
            credit:0,
            dateToday: new Date().toISOString().substr(0, 10),
            payments:[{
                Description:"Total Amount",
                Credit:0,
                Debit:0,
                Balance:0,
                X:false,
                lockedCredit:false,
                lockedDebit:true,
            },{
                Description:"Deposit",
                Credit:0,
                Debit:0,
                Balance:0,
                X:false,
                lockedCredit:true,
                lockedDebit:false,
            }],

            actionTaken:{
                Action:'',
                Status:'',
                RepairedBy:''
            },

            addLine:{
                Description:"",
                Credit:0,
                Debit:0,
                Balance:0,
                X:false,
                lockedCredit:true,
                lockedDebit:true,
            }
        }
    },

    methods:{
        selected(event){
            this.CustomerDetailsData=event
        },
        save(){
            var dataTopass={
                    TransactionDate:this.dateToday,
                    Ccode:this.CustomerDetailsData.Customer.Ccode,
                    DeviceCode:this.CustomerDetailsData.Device.Dcode,
                    ProblemDiscription:this.problemDescription,
                    payments:this.payments,
                    Action:this.actionTaken.Action,
                    Status:this.actionTaken.Status,
                    RepairedBy:this.actionTaken.RepairedBy

            }
            console.log(dataTopass)
            },

        onChangeComputation(){
            var ComputeBalance=this.payments[0].Credit
            this.payments[0].Balance=ComputeBalance
            for(var i=1;
                i<this.payments.length;
                i++){
                    // console.log(ComputeBalance)
                    this.payments[i].Balance=this.payments[i-1].Balance+this.payments[i].Credit-this.payments[i].Debit;
                }

        },
        addPaymentLine(){
            if (this.addLine.Description!=""){
                if(this.addLine.Debit>0 || this.addLine.Credit>0){
                    this.payments.push(this.addLine)
            this.addLine={
                Description:"",
                Credit:0,
                Debit:0,
                Balance:0,
                X:false,
                lockedCredit:true,
                lockedDebit:true,
            }

            this.onChangeComputation()
                }   
            
            }
        },
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