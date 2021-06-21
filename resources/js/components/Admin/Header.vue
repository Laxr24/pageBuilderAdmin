<template>
    <div>
        <div class="container">
            <h2>{{ user.name }}</h2>

            <button @click.prevent="logout">Logout</button>
        </div>
    </div>
</template>

<script>

import axios from 'axios'
export default {
    data(){
        return{
            user: {
                name: 'Shaan'
            }, 
            
        }
    },
    methods: {
        logout: function(){

            axios.post( this.$store.state.url.logout , ).then( res=>{
                console.log(res)
                alert("You've logged out !")
                setTimeout(()=>{
                    window.location = '/'
                }, 1500)
            })
        }
    }
}
</script>


<style lang="scss" scoped>
.container{
    display: flex;
    align-items: center;
    
    h2{
        padding: .8em;
        // display: inline-block;
    }
    button{
        justify-content: flex-end;
        // margin: 1.8em 1.5em 0 0;
        // float: right;
        padding: .5em .8em;
        background-image: linear-gradient(to top, #a18cd14a 0%, #fbc2eb4f 100%);
        outline: none;
        border: none;
        box-shadow: 0px 3px 5px #e5dde6a8;
        border-radius: 10px;
        color: rgb(82, 80, 80);
        font-size: 1em;
        font-weight: bold;
        &:hover{
            cursor: pointer;
        }
    }
}
</style>