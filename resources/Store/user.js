import {defineStore} from "pinia"
import axios from "axios";

import {useMenus} from '../Store/menu'


export const useUser =
defineStore("code",{
    // state
    state:()=>{
        return{
            authenticated:true,
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
                    this.authenticated=false, 
                    this.userData={
                    }
                })
        },

        async loginuser(data){
            const useMenusa = useMenus(); 
            axios.get('/sanctum/csrf-cookie').then(response => {
             axios
                   .post('/api/login',data)
                   .then((res)=>{
                    this.authenticated=true,
                        this.userData=res.data
                        useMenusa.getMenu(res.data.id)
                        
                    return true
                   })
                   .catch((err)=>{
                    this.authenticated=false
                    //    console.log(err)
                   })
           });
        },

        async logUser(){
            const useMenusa = useMenus();
            await axios.get('api/user')
                        .then((res)=>{
                           this.authenticated = true
                           this.userData=res.data
                           useMenusa.getMenu(res.data.id)
                        })
                        .catch((err)=>{
                            // console.log(err.response.data)
                            this.authenticated = false
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

