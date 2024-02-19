import {defineStore} from "pinia"
import axios from "axios";

export const useUser =
defineStore("code",{
    // state
    state:()=>{
        return{
            authenticated:false,
            userData:{}
        }
    },
    // actions
    actions:{
        authenticate(){
            this.authenticated=true
        },

        logout(){
            axios
                .post('api/logout')
                .then(()=>{
                    this.userData={}
                })
        },

        async loginuser(data){
            axios.get('/sanctum/csrf-cookie').then(response => {
             axios
                   .post('/api/login',data)
                   .then((res)=>{
                    this.userData=res.data
                    return true
                   })
                   .catch((err)=>{
                    //    console.log(err)
                   })
           });
        },

        async logUser(){
            await axios.get('api/user')
                        .then((res)=>{
                           this.userData=res.data
                        })
                        .catch((err)=>{
                            // console.log(err.response.data)
                        })
        }
    },
    
    // getters

    getter:{
        async get_logUser(){
            await axios.get('api/user')
                        .then((res)=>{
                           this.userData=res.data
                        })
                        .catch((err)=>{
                            console.log(err.response.data)
                        })
        }
    }
    
})

