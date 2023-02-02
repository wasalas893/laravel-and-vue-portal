<template>
    <div>
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <router-view to="/login" class="auth-logo">
                                    <img src="/assets/images/logo-dark.png" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="/assets/images/logo-light.png" height="30" class="logo-light mx-auto" alt="">
                                </router-view>
                            </div>
                        </div>

                        <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>

                        <div class="p-3">
                            <form class="form-horizontal mt-3" @submit.prevent="submit">
                                <span v-if="errormessage" class="error-message">{{ errormessage }}</span>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input v-model="email" class="form-control" type="email"  placeholder="Email">
                                        <span v-if="validationErrors.email" class="error-message">{{ validationErrors.email[0] }}</span>
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input v-model="password" class="form-control" type="password"  placeholder="Password">
                                        <span v-if="validationErrors.password" class="error-message">{{ validationErrors.password[0] }}</span>


                                    </div>
                                </div>



                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>

                                <div class="form-group mb-0 row mt-2">

                                    <div class="col-sm-5 mt-3">
                                        <router-view to="/register" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</router-view>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

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
