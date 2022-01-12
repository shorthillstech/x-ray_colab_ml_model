<template>
    <div class="container-fluid">
        <div class="color">
            <div class='center'>
                <h1 class='main_head'>Add your link</h1>
            </div>
        </div>
        <div class="container">
            
             <div class="row m-5">
               <div class="col-4 name">
                   X-Ray link
                </div>
                <input class="col-4" v-model="xray" type="text">
                <button class="btn btn-primary col-4" @click="saveItem(0)">Save</button> 
            </div>
        </div>
        
        
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            akbar: '',
            cartoon: '',
            xray:'',
            pytrends:''
        }
    },
    created(){
        this.check();
    },
    methods:{
        saveItem(){  
        axios.post('/hello',{name:'xray',url:this.xray}).then(response => {this.check();
        alert("Hi your ngrok is edited");})
    },
    check(){
       
        axios.get('/hello/xray').then(response => this.xray=response.data[0]['url']);
     }
    }
};
</script>

<style scoped>
.color{
    background-color: rgb(255, 255, 93);
    height: 40vh;
    font-weight: 600;
    display: flex;
    justify-content: center;
    align-items: center;
}
.center{
    text-align: center;
}
.main_head{
    font-size: 55px;
}
.br{
 outline: none;
}
label{
    font-size: 20px;
}

</style>
