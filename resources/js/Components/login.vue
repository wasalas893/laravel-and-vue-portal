<style>

.login {
    display: flex;
    justify-content: center;
    flex-wrap: nowrap;
    flex-direction: row-reverse;
    margin-top: 100px;
}
form {
    width: 35%;
}
</style>


<template>
    <div class="login">

        <form @submit.prevent="submit">
            <span v-if="errormessage" class="error-message">{{ errormessage }}</span>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" v-model="email" class="form-control" placeholder="Enter email">
              <span v-if="validationErrors.email" class="error-message">{{ validationErrors.email[0] }}</span>

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" v-model="password" class="form-control"  placeholder="Password">
              <span v-if="validationErrors.password" class="error-message">{{ validationErrors.password[0] }}</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>


</template>



<script>
import axios from 'axios';



export default {

    data(){

          return{
            email:'',
            password:'',
            validationErrors:[],
            errormessage:'',
            isAuthenticate:false,
          }

    },

    methods:{
        async submit(){

            const data={
                email:this.email,
                password:this.password
            }

            await axios.post('http://localhost:8000/api/login',data)

            .then((res)=>{

                localStorage.setItem( 'token', res.data.token);
                this.isAuthenticate=true;
                this.$router.push('/dashboard');

            }).catch((error)=>{

                if (error.response.status === 401) {

                  this.errormessage = error.response.data.message;
                  this.validationErrors='';

                  }
                if (error.response.status === 422) {

                this.validationErrors = error.response.data.errors;
                this.errormessage='';

                }

            })
        }

    },

    mounted(){

        const token=localStorage.getItem('token');

        if(token){
            this.isAuthenticate=true;
        }

    },

}


</script>


<style>
.error-message{
    color: brown;
}

</style>
