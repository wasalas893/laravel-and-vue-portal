<template>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link v-if=" isAuthenticate" class="navbar-brand" to="/dashboard">Dashboard</router-link>
        <router-link v-if=" isAuthenticate" class="navbar-brand" to="/dashboard/product/add">Product Add</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">

            </li>


          </ul>
          <router-link v-if=" isAuthenticate" @click="handleClick"  to="">Logout</router-link>
        </div>
      </nav>
</template>


<script>

export default {

    name:'header',

    data(){

        return{
            isAuthenticate:false
        }

    },


    methods:{

        handleClick(){
            localStorage.removeItem('token');
            this.$router.push('/login');
        }

    },
    mounted(){

     const token=localStorage.getItem('token');

     if(token){
         this.isAuthenticate=true;
     }

     this.isAuthenticate = !!localStorage.getItem("token");

   },

}

</script>
