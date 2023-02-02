<template>
    <div >
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                            <router-view to="/register" class="auth-logo">
                                    <img src="/assets/images/logo-dark.png" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="/assets/images/logo-light.png" height="30" class="logo-light mx-auto" alt="">
                            </router-view>
                            </div>
                        </div>

                        <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>


                        <div class="p-3">
                            <form class="form-horizontal mt-3">


                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input  class="form-control" type="text" placeholder="name">

                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input  class="form-control" type="email" placeholder="Email">

                                    </div>
                                </div>



                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input  class="form-control" type="password" placeholder="Password">

                                    </div>
                                </div>



                                <div class="form-group text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                </div>

                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3 text-center">
                                    <router-view to="/login" class="text-muted">Already have account?</router-view>
                                    </div>
                                </div>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
    </div>
</template>


<script>

import axios from 'axios';



export default {

    name:"Register",

      data(){
        return {

        }
      },



      methods:{



      }



}


</script>

<style>


</style>
